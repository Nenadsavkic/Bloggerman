@extends('layouts.app')
@section('title')
    {{ $user->name }} homepage
@endsection
@section('content')
<div class="container-fluid bg-secondary">
    <div class="row">
        <div class="col-md-2 offset-md-5 text-center">
            <h2 class="mt-5 text-white">{{ $user->name }}</h2>
            <p class="text-white">Memaber since: {{ $user->created_at->format('M. d. Y') }}</p>
        </div>
        <div class="col-md-2 offset-md-5">
            <img
            @if (isset(Auth::user()->user_image))
               src="{{ asset('/images/user_image/'.Auth::user()->user_image) }}"
            @else

              src="{{ asset('/images/user_image/noimage.jpg') }}"

            @endif

            class="img-fluid p-3 user-image mt-1 rounded-circle" style="width:300px">
        </div>
        <div class="col-md-4 offset-md-5 mb-3 pl-5">
              <a href="{{url('/home') }}" class="btn btn-primary ml-2">Back to my profile</a>
        </div>
    </div>

</div>


<div class="container content justify-content-center">




</div>

@endsection
