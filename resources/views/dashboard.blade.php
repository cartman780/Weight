@extends('layouts.layout')

@section('content')

    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    <div class="box">
        <a href="/create" class="btn btn-sm btn-link float-right mb-3">Challange toevoegen</a>
        <table class="table table-striped">
            <thead>
            <tr>   
                <th scope="col">Week</th>
                <th scope="col">René</th>
                <th scope="col">Marcel</th>
                <th scope="col">Patricia</th>
                <th scope="col">Jeffrey</th>
                <th scope="col">Actie</th>
            </tr>
            </thead>
            <tbody>
            @forelse($challanges as $challange)
            <tr>
                <td>{{ $challange->id }}</td>
                <td>{{ $challange->weight_rene }}</td>
                <td>{{ $challange->weight_marcel }}</td>
                <td>{{ $challange->weight_patricia }}</td>
                <td>{{ $challange->weight_jeffrey }}</td>
                <td><a href="/challange" class="btn btn-sm btn-primary" data-toggle="tooltip"
                    data-placement="top" title=""
                    data-original-title="Open klantdossier"><i class="uil-arrow-right"></i></a>
                    <a href="/challange/edit" class="btn btn-sm btn-success" data-toggle="tooltip"
                    data-placement="top" title=""
                    data-original-title="Pas klantdossier aan"><i class="uil-pen"></i></a>
                    <a href="/challange/destroy" class="btn btn-sm btn-danger" data-toggle="tooltip"
                    data-placement="top" title=""
                    data-original-title="Verwijder klant" onclick="return confirm('Weet je zeker dat je deze klant wilt verwijderen?');"><i class="uil-trash-alt"></i></a>
                </td>
            </tr>
            @empty
            <tr>
                <td>Geen challanges gevonden</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
  
@endsection