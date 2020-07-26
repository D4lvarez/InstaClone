@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="profile-pic rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between aling-item-basement pb-4">

                <div class="d-flex">
                    <h1 class="h3">{{ $user->username }}</h1>                

                    @cannot('update',  $user->profile)
                        <follow-button user-id="{{ $user->id }}" 
                            follows={{ $follows }}>
                        </follow-button>
                    @endcannot
                </div>

                @can('update',  $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
                
            </div>
            @can('update', $user->profile)
                <a href="/{{ $user->id}}/edit" class="pb-4">Edit Profile</a>
            @endcan
            <div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                    <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
                </div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
            {{ $user->profile->description }}
            </div>
            <div>
                <a href="https://{{ $user->profile->url }}">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>

    <div class="row pt-5">

    @foreach($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        
    @endforeach

    </div>
</div>
@endsection
