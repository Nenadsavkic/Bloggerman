
@extends('layouts.app')
@section('title')
    Bloggerman
@endsection
@section('content')

@include('partials.carousel')

<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-md-8 offset-md-2">
          @include('partials.navigation')
        </div>
    </div>
</div>

    <div class="container content main-container">

        <div class="col-md-6 offset-md-3">
            @include('partials.flashMessage')
        </div>
        <div class="row mt-5">
                @foreach ($allPosts as $post)
                <div class="col-md-4 mt-2 mb-5">
                    <div class="card text-center">
                        <div class="card-header bg-dark text-light">
                            <p class="float-left mt-2">Author: {{ $post->user->name }}</p>
                            <p class="float-right mt-2">Views: {{ $post->views }} </p>
                        </div>
                        <div class="card-body">
                            <a class="text-muted" href="{{ route('singlePostView', ['id'=>$post->id]) }}">
                            <h5 class="card-title">{{ $post->description }}</h5>
                            @if (isset($post->image1))
                            <img class="img-fluid card-img" src="/images/post_images/{{ $post->image1 }}" class="card-img">
                        @elseif(isset($post->image2))
                            <img class="img-fluid card-img" src="/images/post_images/{{ $post->image2 }}" class="card-img">
                        @elseif(isset($post->image3))
                            <img class="img-fluid card-img" src="/images/post_images/{{ $post->image3 }}" class="card-img">
                        @else
                            <img class="img-fluid card-img" src="/images/post_images/noimage.jpg">
                        @endif
                        </a>

                        </div>
                        <div class="card-footer text-muted bg-dark text-white">
                            <p class="float-left text-white mt-2">Created: {{ $post->created_at->format('d.m.Y') }}</p>
                            <p class="float-right text-white mt-2">Updated: {{ $post->updated_at->format('d.m.Y') }}</p>
                        </div>
                        </div>
                </div>
                @endforeach

                @if ($allPosts->count() == 0)

                <div class="alert alert-primary">
                    <p class="text-center mt-2">Sorry, your search has no result. Please, pick something else.</p>
                </div>

            @endif

        </div>




    </div>
@endsection


