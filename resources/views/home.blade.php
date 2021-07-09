@extends('layouts.app')
@section('title')
    {{ $user->name }} homepage
@endsection
@section('content')

<div class="container-fluid content">

    <div class="row">
        <div class="col-md-10 offset-md-1">
              <h2 class="mt-5 text-center">All your posts</h2>
        </div>

        <div class="col-md-3 mt-5">
            @include('layouts.sidebar')
        </div>
            @foreach ($posts as $post)
            <div class="col-md-3 offset-md-1  mt-5 pt-5">
                <div class="card text-center ">
                    <div class="card-header bg-dark text-light">
                       <p class="float-left mt-2">Author: {{ $post->user->name }} </p>
                       <p class="float-right mt-2">Views: {{ $post->views }} </p>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a class="text-muted" href="{{ route('singleUserPost', ['id'=>$post->id]) }}">{{ $post->description }}</a></h5>
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
                    <div class="card-footer text-muted bg-dark text-white">
                      <p class="float-left text-white mt-2">Created: {{ $post->created_at->format('d.m.Y') }}</p>
                      <p class="float-right text-white mt-2">Updated: {{ $post->updated_at->format('d.m.Y') }}</p>
                    </div>
                </div>
            </div>
           @endforeach


    </div>

</div>

@endsection
