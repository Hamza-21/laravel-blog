@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post -> image }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <h1>{{ $post->user->username }}</h1>
            <h3>{{ $post->caption }}</h3>
        </div>
    </div>
</div>
@endsection
