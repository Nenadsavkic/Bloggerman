@extends('layouts.app')
@section('title')
    Show single post
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
             <div class="col-md-7 offset-md-1 mt-5">
                     <div class="card">
                         <h2 class="text-center mt-4">{{ $post->title }}</h2>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                @if (isset($post->image1))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image1 }}">
                                @else
                                  <img class="img-fluid" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if (isset($post->image2))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image2 }}">
                                @else
                                  <img class="img-fluid" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if (isset($post->image3))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image3 }}">
                                @else
                                  <img class="img-fluid" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                        </div>

                        <p class="p-5">{{ $post->body }}</p>


                    </div><br>
                        <a href="{{ route('editPost', ['id'=>$post->id]) }}" class="btn btn-secondary float-left">Edit Post</a>

                        <form action="{{ route('deletePost', ['id'=>$post->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary float-right">Delete post</button>
                        </form>
             </div>
        </div>
    </div>
@endsection
