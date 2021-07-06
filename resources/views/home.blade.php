@extends('layouts.app')
@section('title')
    Home {{ $user->name }}
@endsection

@section('content')
<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <h2 class="text-center">All your Posts </h2>

            <div class="row">
             @foreach ($posts as $post)
                <div class="col-md-8 offset-md-2 mt-3">
                    <div class="card text-center">
                        <div class="card-header">
                          <p class="float-left">Created at: {{ $post->created_at->format('d.m.Y') }}</p>
                          <p class="float-right">Updated at: {{ $post->updated_at->format('d.m.Y') }}</p>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title mt-4"><a class="text-muted" href="{{ route('singleUserPost', ['id'=>$post->id]) }}">{{ $post->title }}</a></h5>

                          {{-- <a href="#" class="btn btn-primary">Visit post</a> --}}
                        </div><br>
                        <div class="card-footer text-muted">
                          <button class="btn btn-primary float-left">Views: {{ $post->views }}</button>
                          <button class="btn btn-secondary float-right">Comments: {{ $post->comments }}</button>
                        </div>
                      </div>
                </div>
             @endforeach
            </div>


        </div>
    </div>


</div>
@endsection



