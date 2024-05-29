<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function updateBooking(Request $request, Booking $booking)
    {
        //Log debug the incoming fields
        // dd($request->all());

        Validator::extend('weekend', function ($attribute, $value, $parameters, $validator) {
            return in_array(date('l', strtotime($value)), ['Saturday', 'Sunday']);
        });

        //Validate if the horse is available
        $horse = Horse::findOrFail($request->horse_id);
        if ($horse->bookings->contains('date', $request->date)) {
            return redirect()->back()->withErrors(['date' => 'The horse is already booked for this date.'])->withInput();
        }

        //Validate if the booking is full
        $bookingsCount = Booking::where('date', $request->date)
                                ->where('hour', $request->hour)
                                ->count();
        if ($bookingsCount >= 5) {
            return redirect()->back()->withErrors(['hour' => 'El turno ya está completo.'])->withInput();
        }

        $incomingFields = $request->validate(
            [
                "date" => [
                    "required",
                    "date",
                    "after_or_equal:today",
                    "before_or_equal:" . now()->addDays(30)->format('Y-m-d'),
                    "weekend",
                ],
                "hour" => [
                    "required",
                    "numeric",
                    Rule::in(['10', '11', '12', '13'])
                ],
                "comment" => [
                    "max:100"
                ]
            ]
        );

        $booking = Booking::findOrFail($booking->id);
        $booking->update($incomingFields);
    

        // $booking->update($incomingFields);

        return redirect('/')->with('success', "One booking has been updated.");
    }

    public function showEditForm(Booking $booking)
    {
        $horses = Horse::all();
        return view("booking-form-edit", ['booking' => $booking, 'horses' => $horses]);
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->delete();
        return redirect('/')->with('success', "One booking has been cancelled.");
    }

    public function showBookingForm()
    {
        $horses = Horse::all();
        return view("booking-form", ['horses' => $horses]);
    }

    public function showBookings()
    {
        // $bookings = auth()->user()->bookings()->get(); o...
        $bookings = auth()->user()->bookings;
        return view("homepage-feed", ['bookings' => $bookings]);
    }


    public function registerBooking(Request $request)
    {
        //Show user id
        // dd($request->user()->username);

        Validator::extend('weekend', function ($attribute, $value, $parameters, $validator) {
            return in_array(date('l', strtotime($value)), ['Saturday', 'Sunday']);
        });

        //Validate if the horse is available
        $horse = Horse::findOrFail($request->horse_id);
        if ($horse->bookings->contains('date', $request->date)) {
            return redirect()->back()->withErrors(['date' => 'The horse is already booked for this date.'])->withInput();
        }

        //Validate if the booking is full
        $bookingsCount = Booking::where('date', $request->date)
                                ->where('hour', $request->hour)
                                ->count();
        if ($bookingsCount >= 5) {
            return redirect()->back()->withErrors(['hour' => 'El turno ya está completo.'])->withInput();
        }

        $incomingFields = $request->validate(
            [
                "horse_id" => [
                    "required",
                    "numeric"
                ],
                "date" => [
                    "required",
                    "date",
                    "after_or_equal:today",
                    "before_or_equal:" . now()->addDays(30)->format('Y-m-d'),
                    "weekend",
                ],
                "hour" => [
                    "required",
                    "numeric",
                    Rule::in(['10', '11', '12', '13'])
                ],
                "comment" => [
                    "max:100"
                ]
            ]
        );

        //Add the user_id to the incoming fields
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['comment'] = strip_tags($incomingFields['comment']);

        Booking::create($incomingFields);

        return redirect("/booking-form")->with("success", "Your booking has been registered. Thank you!");
    }
}
