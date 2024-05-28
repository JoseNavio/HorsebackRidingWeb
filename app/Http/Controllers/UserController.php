<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showCorrectHomePage()
    {
        if (auth()->check()) {
            $bookings = auth()->user()->bookings;
            return view("homepage-feed", ['bookings' => $bookings]);
        } else {
            return view("homepage");
        }
    }

    //Logout
    public function logout()
    {
        auth()->logout();
        return redirect("/")->with("info", "See you the next time, bye...");
    }

    //Login
    public function login(Request $request)
    {
        $incomingFields = $request->validate(
            [
                "loginusername" => "required",
                "loginpassword" => "required"
            ]
        );
        //auth()->attempt() method in Laravel automatically hashes the password
        if (
            auth()->attempt([
                "username" => $incomingFields["loginusername"],
                "password" => $incomingFields["loginpassword"]
            ])
        ) {
            //Store cookie on the user's browser...
            $request->session()->regenerate();
            return redirect("/")->with("success", "You are logged in!");
        } else {
            return redirect("/")->with("failure", "Something went wrong. Please try again.");
        }

    }

    //Register
    public function register(Request $request)
    {
        $incomingFields = $request->validate(
            [
                "username" => [
                    "required",
                    "min:3",
                    "max:20",
                    //(Table name, column name)
                    Rule::unique('users', 'username')
                ],
                "email" => ["required", "email", Rule::unique("users", "email")],
                //Html file inpunt name need to be pizza and pizza_confirmation
                "password" => ["required", "min:6", "confirmed"]
            ]
        );

        $incomingFields["password"] = bcrypt($incomingFields["password"]);

        $user = User::create($incomingFields);
        //Log the user in after registration
        auth()->login($user);

        return redirect("/")->with("success", "Congratulations! You are registered.");
    }
}
