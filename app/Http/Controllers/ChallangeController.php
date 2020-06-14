<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challange;
use App\User;

class ChallangeController extends Controller
{
    public function index()
    {
        // 
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // if week already in table return error
        $ceckChallange = Challange::where([
            'week' => $request->week, 
        ])->first();
        
        if(empty($ceckChallange)){
            $challange = Challange::create(request()->validate([
                'week'=>'required',
                'weight'=>'required',
                'user_id'=>'required',
            ]));

            return redirect('/dashboard')->with('succesMsg', 'Challenge is met succes toegevoegd.');
        }else{
            return redirect('/create')->with('failMsg', 'Challenge bestaat al.');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($week)
    {
        return view('edit', compact('week'));
    }

    public function update(Request $request)
    {
        $challange = Challange::where([
            'week' => $request->week, 
            'user_id' => $request->user_id
        ])->first();
        // dd($challange);
        if(!empty($challange)){
            // update selected user
            $challange->update(request()->validate([
                'weight'=>'required',
            ]));
        }
        else{
            // insert if weight doesn't exist          
            Challange::create(request()->validate([              
                'weight'=>'required',
                'week'=>'required',
                'user_id'=>'required',
            ]));
        }

        return redirect('/dashboard');
    }

    public function destroy($weeknumber)
    {
        Challange::where('week', $weeknumber)->delete();

        return redirect('/dashboard');
    }
}
