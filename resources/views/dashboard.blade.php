@extends('layouts.layout')

@section('content')

    <h1>Dashboard, {{ Auth::user()->name }}</h1>

    <!-- succes alert -->
    @if (session('succesMsg'))
    <div class="alert alert-success" role="alert">
        {{ session('succesMsg') }}
    </div>
    @endif

    <div class="box">
        <a href="/create" class="btn btn-sm btn-link float-right mb-3">Challenge toevoegen</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Week</th>
                @foreach($users as $user)
                    <th scope="col">{{ $user->name }}</th>
                @endforeach
                <th scope="col">Acties</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($weightArray as $weeknumber => $users)
                <tr>
                    <td>{{ $weeknumber }}</td>
                    @foreach ($users as $user_id => $weight)
                        <td>{{ $weight }}</td>
                    @endforeach
                    <td>
                        {{-- <a href="/challenge" class="btn btn-sm btn-primary" data-toggle="tooltip"
                        data-placement="top" title=""
                        data-original-title="Open klantdossier"><i class="uil-arrow-right"></i></a> --}}
                    <a href="/{{ $weeknumber }}/edit" class="btn btn-sm btn-success" data-toggle="tooltip"
                        data-placement="top" title=""
                        data-original-title="Pas klantdossier aan"><i class="uil-pen"></i></a>
                        <a href="/{{ $weeknumber }}/destroy" class="btn btn-sm btn-danger" data-toggle="tooltip"
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
