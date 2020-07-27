@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-5 offset-4">
                <a href="/{{$post->user->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-5 offset-4">
                <div class="d-flex aling-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" style="max-width: 40px" class="w-100 rounded-circle">
                    </div>
                    <div>
                        <p class="font-weight-bold">
                            <a href="/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            
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
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
