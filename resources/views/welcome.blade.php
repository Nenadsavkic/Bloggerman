
        @extends('layouts.app')
        @section('title')
            Bloggerman
        @endsection
        @section('content')
            <div class="container content">
                <div class="row mt-5">
                    <div class="col-md-6 offset-md-2 pl-5">

                        @include('layouts.flashMessage')

                        <h1 class="text-center text-secondary mt-5">Welcome to Bloggerman</h1>
                        <h2 class="text-center text-secondary"> web platform for bloggers with superpowers.</h2>
                        <br>
                        <h2 class="text-center text-secondary">Join us, and build something amaizing!</h2>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('/images/bloggerman_img/bloggerman3.jpg') }}">
                    </div>


                </div>
                <div class="row mt-5">

                       @foreach ($allPosts as $post)
                        <div class="col-md-4 mt-2 mb-5">
                            <div class="card text-center">
                                <div class="card-header bg-dark text-light">
                                   <p class="float-left mt-2">Author: {{ $post->user->name }} </p>
                                   <p class="float-right mt-2">Views: {{ $post->views }} </p>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"><a class="text-muted" href="{{ route('singlePostView', ['id'=>$post->id]) }}">{{ $post->description }}</a></h5>
                                  @if (isset($post->image1))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image1 }}" class="card-img">
                              @elseif(isset($post->image2))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image2 }}" class="card-img">
                              @elseif(isset($post->image3))
                                  <img class="img-fluid" src="/images/post_images/{{ $post->image3 }}" class="card-img">
                              @else
                                  <img class="img-fluid" src="/images/post_images/noimage.jpg">
                              @endif

                                </div>
                                <div class="card-footer text-muted bg-dark text-white">
                                  <p class="float-left text-white mt-2">Created: {{ $post->created_at->format('d.m.Y') }}</p>
                                  <p class="float-right text-white mt-2">Updated: {{ $post->updated_at->format('d.m.Y') }}</p>
                                </div>
                              </div>
                        </div>
                       @endforeach

                </div>




            </div>
        @endsection


