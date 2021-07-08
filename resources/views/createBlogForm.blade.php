@extends('layouts.app')
@section('title')
    Create new post
@endsection
@section('content')


<div class="container">
    <h2 class="text-center mt-5">Lets create something amaizing</h2><br>

    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <textarea class="form-control" name="body" id="editor"  cols="30" rows="10" placeholder="Write your post"></textarea>
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
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>

@endsection

@section('editor-scripts')

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
