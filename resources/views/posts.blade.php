@extends('layouts.layout')

@section('content')
    <h1>Posts van {{ Auth::user()->name }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="box col-md-6 col-ms-12 mb-2">
        <h3>Whats up?</h3>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <textarea name="body" class="form-control w-100">Whatsup?</textarea>
            </div>
            <!-- image -->
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <!-- submit -->
            <div class="form-group">
            <div class="control">
                <button class="btn btn-success mt-2" type="submit">Opslaan</button>
            </div>

        </form>
    </div>
</div>
    <!-- posts -->
    @foreach($posts as $post)
    <div class="box col-md-12 col-ms-12 mb-3">
        <p><strong>{{$post->user->name}}</strong> gepost om <strong>{{$post->created_at}}</strong></p>
        <p>{{$post->body}}</p>
        @if(!empty($post->image))
        <img src="{{$post->image}}" class="w-100">
        @endif
    </div>
    @endforeach
@endsection