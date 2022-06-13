@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-3 text-center">
        <div><img src="{{$user->profile->profileImage() }}" height="350" width="350" class="p-5 rounded-circle w-100"></div>
    </div>
    <div class="col-9 pt-5">
        <div class="px-3 d-flex align-items-baseline justify-content-between">
            <h1>{{$user -> username}}</h1>
            @can('update', $user->profile)
                <a href="/posts/create" style="text-decoration: none;">New Post</a>
            @endcan
        </div>
        @can('update', $user->profile)
            <div class="px-3">
                <a href="/profile/{{ $user-> id}}/edit" style="text-decoration: none;">Edit Profile</a>
            </div>
        @endcan
        <div class="d-flex">
            <div class="px-3"><strong>{{$user->posts->count()}} </strong> posts</div>
            <div class="px-3"><strong>100 </strong> followers</div>
            <div class="px-3"><strong>100 </strong> following</div>
        </div>
        <div class="px-3 pt-3">{{$user->profile->bio}}</div>
        <div class="px-3 pt-3">{{$user->profile->bio}}</div>
        <div class="px-3 pt-3">{{$user->profile->bio}}</div>
    </div>
    </div>
    <div class="row">
        @foreach($user-> posts as $post)
            <div class="col-4 pb-4">
                <a href="/posts/{{ $post->id }}"><img src="/storage/{{ $post-> image}}" alt="" class="w-100"></a>
            </div>
            <!-- <div class="col-4"><img src="/svg/cat2.webp" alt="" class="w-100"></div>
            <div class="col-4"><img src="/svg/cat2.webp" alt="" class="w-100"></div> -->
        @endforeach
    </div>
</div>
@endsection
