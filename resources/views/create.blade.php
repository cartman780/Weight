@extends('layouts.layout')

@section('content')

    <h1>Challange toevoegen</h1>
    
    <!-- succes alert -->
    @if (session('failMsg'))
    <div class="alert alert-danger" role="alert">
        {{ session('failMsg') }}
    </div>
    @endif

    <div class="box">
        <form action="/dashboard" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Week</label>
                        <input type="number" name="week" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gewicht {{ Auth::user()->name }}</label>
                        <input type="number" step=0.1 name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <input type="hidden" step=0.1 name="user_id" value="{{ Auth::user()->id }}">
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