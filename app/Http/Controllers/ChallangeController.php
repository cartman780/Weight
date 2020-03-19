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
        // dd($request);
        $challange = Challange::create(request()->validate([
            'week'=>'required',
            'weight'=>'required',
            'user_id'=>'required',
        ]));

        return redirect('/dashboard')->with('succesMsg', 'Klant is met succes toegevoegd.');;
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

    public function destroy($id)
    {
        //
    }
}
