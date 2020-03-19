<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Challange;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        // get all challanges descending
        $challanges = Challange::orderBy('week', 'DESC')->get();
        
        
        // make an array for every [week] that has an array with ['user' => 'weight'] in user_id order
        $weightArray = array();

        // how long is the list depending on amount of weeks
        $startweek = 1;
        $endweek = Challange::max('week');

        // go through every week
        for ($i = $startweek; $i <= $endweek; $i++) {
            

            // get weight foreach user and if no value set 0
            foreach ($users as $user) {

                // get challange values per week
                $challenge = $user->challanges()->where('week', '=', $i)->get();

                // if there is a challange
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
        // dd($weightArray);
        return view('dashboard', compact('users', 'weightArray'));
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
        return view('profile', compact('user'));
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
