<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        $horses = Horse::all();
        return view("booking-form", ['horses' => $horses]);
    }

    public function registerBooking(Request $request)
    {
        //Show user id
        // dd($request->user()->username);

        Validator::extend('weekend', function ($attribute, $value, $parameters, $validator) {
            return in_array(date('l', strtotime($value)), ['Saturday', 'Sunday']);
        });

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
