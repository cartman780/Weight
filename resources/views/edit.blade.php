@extends('layouts.layout')

@section('content')

<h1>Challenge week {{ $week }} aanpassen</h1>

    <div class="box">
        <form action="/update" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gewicht {{ Auth::user()->name }}</label>
                        <input type="number" step=0.1 name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <input type="hidden" name="week" class="form-control" value="{{ $week }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>
            </div>

            <!-- submit -->
            <div class="form-group">
                <div class="control">
                    <button class="btn btn-success mt-2" type="submit">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
  
@endsection