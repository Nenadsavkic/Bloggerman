@extends('layouts.app')
@section('title')
    Home {{ $user->name }}
@endsection

@section('content')
<div class="container">
    <h2>Welcome {{ $user->name }}</h2>
</div>
@endsection
