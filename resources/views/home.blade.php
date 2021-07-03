@extends('layouts.app')
@section('title')
    Home {{ $user->name }}
@endsection

@section('content')
<div class="container-fluid mt-5">
    {{-- <h2>Welcome {{ $user->name }}</h2> --}}

    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <h2 class="text-center">All your Blogs </h2>
        </div>
    </div>


</div>
@endsection
