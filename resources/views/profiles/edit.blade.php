@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <label for="bio" class="col-md-4 col-form-label">Bio</label>
                <input id="bio" type="text"
                class="form-control @error('bio') is-invalid @enderror"
                name="bio"
                value="{{ old('bio') ?? $user->profile->bio }}" autocomplete="bio" autofocus>

                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                       <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="pt-4">
                    <button class="btn btn-success">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
