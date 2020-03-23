@extends('layouts.layout')

@section('content')
    <h1>Profiel van {{ Auth::user()->name }}</h1>
    <div class="box">
        {{-- <a href="/create" class="btn btn-sm btn-link float-right mb-3">Challange toevoegen</a> --}}
        <table class="table table-striped">
            <thead>
            <tr>   
                <th scope="col">Week</th>
                <th scope="col">Gewicht</th>
                <th scope="col" style="width: 100px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($weightDif as $weeknumber => $week)            
            <tr>
                <td>{{$weeknumber}}</td>
                        <td>{{ $week['weight'] }}
                            @if ($week['weightDif'] < 0)
                                <span style="color:red;">&#9660 {{$week['weightDif']}}🍔</span>
                            @elseif ($week['weightDif'] > 0)
                                <span style="color:green;">&#9660 {{$week['weightDif']}}🎉</span>
                            @else
                                <span style="color:yellow;">&#9660 {{$week['weightDif']}}😐</span>
                            @endif
                        </td>
                <td>
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