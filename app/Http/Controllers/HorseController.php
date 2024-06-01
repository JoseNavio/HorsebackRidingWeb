<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HorseController extends Controller
{
    public function deleteHorse(Horse $horse)
    {
        $horse->delete();
        return redirect('horses-page')->with('success', "Good, now is with God!");
    }

    public function showHorseInfo(Horse $horse)
    {
        $horse = Horse::find($horse->id);
        return view("horse-info", ['horse' => $horse]);
    }

    public function showHorseForm()
    {
        return view("horse-form");
    }

    public function showHorses()
    {
        return view("horses-page", ['horses' => Horse::all()]);
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
                    Rule::in(['Male', 'Female', 'male', 'female', 'M', 'F', 'm', 'f', null])
                ],
                "age" => [
                    "required",
                    "numeric",
                    "min:1",
                    "max:40",
                ],
                "is_sick" => [
                    Rule::in(['0', '1', 'True', 'true', 'False', 'false', 'Y', 'y', 'Yes', 'yes', 'N', 'n', 'No', 'no', null]),
                ],
                "observations" => [
                    "max:150"
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
        //Observations
        $incomingFields['observations'] = strip_tags($incomingFields['observations']);

        $horse = Horse::create($incomingFields);

        // return redirect("/horse-form")->with("success", "Perfect!. A new horse has been registered!");
        return redirect("/horse-info/{$horse->id}")->with("success", "Perfect!, A new horse has been registered!");
    }
    
    //API

    //Get all
    public function showAllHorsesAPI()
    {
        return Horse::all();
    }
    public function deleteHorseAPI(Horse $horse)
    {
        
        $horse->delete();
        return 'Horse deleted.';
    }
}
