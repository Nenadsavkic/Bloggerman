@extends('layouts.app')
@section('title')
    {{ $user->name }} homepage
@endsection
@section('content')
<div class="container-fluid bg-secondary">
    <div class="row">
        <div class="col-md-2 offset-md-5 text-center">
            <h2 class="mt-5 text-white user_name">{{ $user->name }}</h2>
            <p class="text-white">Memaber since: {{ $user->created_at->format('M. d. Y') }}</p>
        </div>
        <div class="col-md-3 offset-md-5">
            <img
            @if (isset(Auth::user()->user_image))
               src="{{ asset('/images/user_image/'.Auth::user()->user_image) }}"
            @else

              src="{{ asset('/images/user_image/noimage.jpg') }}"

            @endif

            class="img-fluid p-3 user-image mt-1 rounded-circle" style="width:300px">
        </div>

    </div>
    <div class="row">

        <div class="col-md-4 offset-md-5 mb-3 px-5">
            <a href="{{url('/home') }}" class="btn btn-primary rounded-pill ml-3">Back to my profile</a>
        </div>
        <div class="col-md-2 offset-md-1">
            <form action="{{ route('deleteUser', ['id'=>Auth::user()->id]) }}" method="post">
                @csrf
                @method('delete')
            <button type="submit" class="btn btn-danger rounded-pill"
            onclick="return confirm('Are you sure you want to delete your profile');">Delete profile</button>
            </form>
        </div>

    </div>

</div>


<div class="container content">
    <div class="row">
        <div class="col-md-10 offset-md-1 ml-3 mt-5">
            <h2 class="ml-3">Name: {{ $user->name }}</h2>
            <h2 class="ml-3">Last Name: {{ $user->last_name }}</h2>
            <h3 class="ml-3">Email: {{ $user->email }}</h3>

            <div class="form-add-userImg mt-5">
                <form action="{{ route('saveImg')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input  type="file" id="user_image" name="user_image" class="ml-3 input-img"><br>
                        <button class="btn btn-primary ml-3 mt-1 px-4 btn-addImg" type="submit">Add profile image</button>
                </form>
            </div>

            <div class="form-delete-UserImg mt-3">
               <form action="{{ route('deleteImg')}}" method="post">
                   @csrf
                   @method('delete')
                   <button class="btn btn-danger ml-3 px-4 btn-deleteImg" type="submit"
                   onclick="return confirm('Are you sure you want to delete your profile image');">Delete profile image</button>
               </form>
            </div>



        </div>
    </div>
</div>

@endsection
