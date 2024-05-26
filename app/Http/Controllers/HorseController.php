<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HorseController extends Controller
{
    public function showHorseForm()
    {
        return view("horse-form");
    }

    public function registerHorse(Request $request)
    {
        $incomingFields = $request->validate(
            [
                "horse_name" => [
                    "required",
                    "min:3",
                    "max:20",
                    //(Table name, column name)
                    Rule::unique('horses', 'horse_name')
                ],
                "breed" => [
                    "required",
                    "min:3",
                    "max:20",
                ],
                "gender" => [
                    Rule::in(['', 'Male', 'Female', 'male', 'female', 'M', 'F', 'm', 'f'])
                ],
                "age" => [
                    "required",
                    "numeric",
                    "min:1",
                    "max:40",
                ],
                "is_sick" => [
                    Rule::in(['', '0', '1', 'true', 'false', 'yes', 'no', null]),
                ],
                "observations" => [
                    "max:100"
                ]
            ]
        );
        //Is sick
        if (in_array(strtolower($incomingFields['is_sick']), ['Y', 'y', 'Yes', 'yes', 'True', 'true', '1'])) {
            $incomingFields['is_sick'] = 1;
        } else {
            $incomingFields['is_sick'] = 0;
        }
        //Gender 
        if (in_array(strtolower($incomingFields['gender']), ['M', 'm', 'Male', 'male'])) {
            $incomingFields['gender'] = 'Male';
        } elseif (in_array(strtolower($incomingFields['gender']), ['F', 'f', 'Female', 'female'])) {
            $incomingFields['gender'] = 'Female';
        } else {
            $incomingFields['gender'] = 'Unknown';
        }

        Horse::create($incomingFields);

        return redirect("/horse-form")->with("success", "Perfect!. A new horse has been registered!");
    }
}
