<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challange;

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
            'weight_rene'=>'required',
            'weight_marcel'=>'required',
            'weight_patricia'=>'required',
            'weight_jeffrey'=>'required',
        ]));

        return redirect('/dashboard')->with('succesMsg', 'Klant is met succes toegevoegd.');;
    }

    public function show($id)
    {
        //
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
