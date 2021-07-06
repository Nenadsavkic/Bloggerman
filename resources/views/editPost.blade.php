@extends('layouts.app')
@section('title')
    Edit post
@endsection
@section('content')


<div class="container">
    <h2 class="text-center mt-5">Edit post</h2><br>

    <form action="{{ route('saveEditedPost', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="title" value="{{ $post->title }}"><br>
        <textarea class="form-control" name="body" id="body" value={{ $post->body }} cols="30" rows="10"></textarea>
        <br>
        <input type="file" name="image1" class="form-control"><br>
        <input type="file" name="image2" class="form-control"><br>
        <input type="file" name="image3" class="form-control"><br>
        <select name="category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <button class="btn btn-success" type="submit">Save edited post</button>
    </form>
</div>




@endsection
