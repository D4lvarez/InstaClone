@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div class="d-flex aling-items-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" style="max-width: 40px" class="w-100 rounded-circle">
                </div>
                <div>
                    <p class="font-weight-bold">
                        <a href="/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                        @cannot('update',  $post->user->profile)
                        <follow-button user-id="{{ $post->user->id }}" 
                            follows={{ $follows }}>
                        </follow-button>
                    @endcannot
                    </p>
                    
                </div>
            </div>
            <p class="pt-5">
                <span class="font-weight-bold">
                    <a href="/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>
                  {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
