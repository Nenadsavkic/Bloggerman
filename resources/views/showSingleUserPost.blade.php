@extends('layouts.app')
@section('title')
    Show single post
@endsection
@section('content')
    {{-- Container Start --}}
    <div class="container-fluid content">
        <div class="row">
             <div class="col-md-8 offset-md-2 mt-5">
                    <div class="card">
                        <div class="container">

                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    @if (isset($post->image1))
                                    <img class="img-fluid card-img " src="/images/post_images/{{ $post->image1 }}">
                                    @else
                                    <img class="img-fluid card-img p-2" src="/images/post_images/noimage.jpg">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if (isset($post->image2))
                                    <img class="img-fluid card-img " src="/images/post_images/{{ $post->image2 }}">
                                    @else
                                    <img class="img-fluid card-img " src="/images/post_images/noimage.jpg">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if (isset($post->image3))
                                    <img class="img-fluid card-img " src="/images/post_images/{{ $post->image3 }}">
                                    @else
                                    <img class="img-fluid card-img p-2" src="/images/post_images/noimage.jpg">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10 offset-md-1 mb-5">
                                <p>{!!$post->body!!}</p>
                            </div>

                        </div>
                    </div><br>
                        {{-- Edit Post Start --}}
                        <a href="{{ route('post.edit', ['post'=>$post->id]) }}" class="btn btn-secondary float-left">Edit Post</a>
                        {{-- Edit Post End --}}

                        {{-- Delete Post Form Start --}}
                        <form action="{{ route('post.destroy', ['post'=>$post->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary float-right">Delete post</button>
                        </form>
                        {{-- Delete Post Form End --}}
                        <br><br>
             </div>
        </div>
    </div>
    {{-- Container End --}}
@endsection
