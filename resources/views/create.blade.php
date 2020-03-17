@extends('layouts.layout')

@section('content')

    <h1>Challange toevoegen</h1>
    <div class="box">
        <form action="/dashboard" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">René</label>
                        <input type="number" step=0.01 name="weight_rene" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Marcel</label>
                        <input type="number" step=0.01 name="weight_marcel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Patricia</label>
                        <input type="number" step=0.01 name="weight_patricia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jeffrey</label>
                        <input type="number" step=0.01 name="weight_jeffrey" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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