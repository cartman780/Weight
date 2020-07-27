<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\challenge;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::all();

        // get all challanges descending
        $challanges = challenge::orderBy('week', 'DESC')->get();


        // make an array for every [week] that has an array with ['user' => 'weight'] in user_id order
        $weightArray = array();

        // how long is the list depending on amount of weeks
        $startweek = 1;
        $endweek = challenge::max('week');

        // go through every week
        for ($i = $startweek; $i <= $endweek; $i++) {


            // get weight foreach user and if no value set 0
            foreach ($users as $user) {

                // get challenge values per week
                $challenge = $user->challanges()->where('week', '=', $i)->get();

                // if there is a challenge
                if (count($challenge) > 0) {
                    // set a weight value for that user *!!FIX make weigt alue unique!!*
                    $weightArray[$i][$user->id] = $challenge[0]->weight;
                }
                else {
                    // set 0 if no weight isset
                    $weightArray[$i][$user->id] = 0;
                }
            }
        }


        return view('dashboard', compact('user', 'users', 'weightArray'));
    }

    public function highLow(){
        // get user id
        $user_id = auth()->user()->id;

        // make new array for weight difference per week
        $weightDif = array();

        // get list of weights of user
        $challenges = challenge::where('user_id', $user_id)->get();

        // make a buffer for previous values in the array
        $buffer = array();

        // check if week weight is higher or lower than last week
        foreach ($challenges as $challenge) {
            $week = $challenge->week;

            $weight = $challenge->weight;

            // set default value if buffer is not set
            if (!isset($buffer[$week])) {
                $buffer[$week] = $weight;
            }

            // weight difference
            $weightDif[$week]['weight'] = $weight;
            $weightDif[$week]['weightDif'] = $buffer[$week] - $weight;

            $week++;

            // add value to buffer so the next value can check if it's higher or lower.
            $buffer[$week] = $weight;

        }
        // dd($weightDif);

        return $weightDif;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        // check if weigt is heigher or lower and give is a color
        $weightDif = $this->highLow();
        return view('profile', compact('user', 'weightDif'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
