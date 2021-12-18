
@extends('layouts.app')
@section('title')
    Bloggerman
@endsection
@section('content')

 {{-- Carousel --}}
@include('partials.carousel')

 {{-- Navigation Start--}}
<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-md-8 offset-md-2">
          @include('partials.navigation')
        </div>
    </div>
</div>
{{-- Navigation End --}}

    {{-- Main Container Start --}}
    <div class="container content main-container">

        <div class="col-md-6 offset-md-3">
            @include('partials.flashMessage')
        </div>
        <div class="row mt-5">
                @foreach ($allPosts as $post)
                <div class="col-md-6 mt-2 mb-5">
                    <div class="card text-center">
                        <div class="card-header bg-dark text-light">
                            <p class="float-left mt-2">Author: {{ $post->user->name }}</p>
                            <p class="float-right mt-2">Views: {{ $post->views }} </p>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    @if (isset($post->image1))
                                    <img class="img-fluid card-img" src="/images/post_images/{{ $post->image1 }}" class="card-img">
                                 @elseif(isset($post->image2))
                                    <img class="img-fluid card-img" src="/images/post_images/{{ $post->image2 }}" class="card-img">
                                 @elseif(isset($post->image3))
                                    <img class="img-fluid card-img" src="/images/post_images/{{ $post->image3 }}" class="card-img">
                                 @else
                                    <img class="img-fluid card-img" src="/images/post_images/noimage.jpg">
                                 @endif
                                </div>
                                <div class="col-md-6">
                                   {{-- <h5 class="card-title mt-2 ">{{ $post->description }}</h5> --}}
                                   <p class="card-text">{!! substr( $post->body,0, 170) !!}...</p>
                                   <a href="{{ route('post.show', ['post'=>$post->id]) }}" class="btn btn-primary">See more</a>

                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted bg-dark text-white">
                            <p class="float-left text-white mt-2">Created: {{ $post->created_at->format('d.m.Y') }}</p>
                            <p class="float-right text-white mt-2">Updated: {{ $post->updated_at->format('d.m.Y') }}</p>
                        </div>
                        </div>
                </div>
                @endforeach

                {{-- Flash Message Start --}}
                @if ($allPosts->count() == 0 && request('query') == true)

                    <div class="alert alert-primary">
                        <p class="text-center mt-2">Sorry, your search has no result. Please, pick something else.</p>
                    </div>

                @endif
                {{-- Flash message End --}}

        </div>




    </div>
    {{-- Main Container End --}}
@endsection


