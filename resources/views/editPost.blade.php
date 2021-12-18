@extends('layouts.app')
@section('title')
    Edit post
@endsection
@section('content')

{{-- Main Container Start --}}
<div class="container">
    <h2 class="text-center mt-5">Edit post</h2><br>

    <form action="{{ route('post.update', ['post'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input class="form-control" type="text" name="description" value="{{ $post->description }}"><br>
        <textarea class="form-control" name="body" id="editor"  cols="30" rows="10">
          {!!$post->body!!}
        </textarea>
        <br>
        <label class="ml-2" for="image1">Add image 1 (Optional)</label>
        <input type="file" name="image1" class="form-control post-image1"><br>

        <label class="ml-2" for="image2">Add image 2 (Optional)</label>
        <input type="file" name="image2" class="form-control"><br>

        <label class="ml-2" for="image3">Add image 3  (Optional)</label>
        <input type="file" name="image3" class="form-control"><br>
        <select name="category" class="form-control">
            <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <button class="btn btn-success" type="submit">Save edited post</button>
    </form>
</div>
{{-- Main Container End --}}
@endsection


{{-- Text Editor Start --}}
@section('editor-scripts')

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
{{-- Text Editor End --}}
