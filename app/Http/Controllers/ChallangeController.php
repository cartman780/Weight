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
        // dd($request->user_id);
        $challange = Auth::user()->challanges();
        dd($challange);
        $challange = Challange::find($request->user_id)->where('week', $week);
        dd($challange);
    }

    public function destroy($id)
    {
        //
    }
}
