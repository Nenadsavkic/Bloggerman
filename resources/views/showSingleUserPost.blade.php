@extends('layouts.app')
@section('title')
    Show single post
@endsection
@section('content')
    <div class="container-fluid content">
        <div class="row">
             <div class="col-md-8 offset-md-2 mt-5">
                     <div class="card">

                        <div class="row mt-5">
                            <div class="col-md-4">
                                @if (isset($post->image1))
                                  <img class="img-fluid card-img p-2" src="/images/post_images/{{ $post->image1 }}">
                                @else
                                  <img class="img-fluid card-img p-2" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if (isset($post->image2))
                                  <img class="img-fluid card-img p-2" src="/images/post_images/{{ $post->image2 }}">
                                @else
                                  <img class="img-fluid card-img p-2" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if (isset($post->image3))
                                  <img class="img-fluid card-img p-2" src="/images/post_images/{{ $post->image3 }}">
                                @else
                                  <img class="img-fluid card-img p-2" src="/images/post_images/noimage.jpg">
                                @endif
                            </div>
                        </div>
                         <div class="col-md-10 offset-md-1 mb-5">
                             <p>{!!$post->body!!}</p>
                         </div>


                    </div><br>
                        <a href="{{ route('editPost', ['id'=>$post->id]) }}" class="btn btn-secondary float-left">Edit Post</a>

                        <form action="{{ route('deletePost', ['id'=>$post->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary float-right">Delete post</button>
                        </form>
                        <br><br>
             </div>
        </div>
    </div>
@endsection
