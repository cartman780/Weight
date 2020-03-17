<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Challange;

class UserController extends Controller
{
    public function index()
    {
        $challanges = Challange::all();
        return view('dashboard', compact('challanges'));
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
