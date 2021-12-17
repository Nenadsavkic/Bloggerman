
@extends('layouts.app')
@section('title')
    {{ $post->description }}
@endsection
@section('content')
    {{-- Main Container --}}
    <div class="container content">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-5">
                  <div class="card p-5 ">
                      <div>
                            <p class="float-left">Author: {{ $post->user->name }}
                            <span class="ml-3">
                            <img class="img-fluid"
                                @if (isset($user->user_image))
                                    src="/images/user_image/{{ $user->user_image }}"
                                @else
                                    src="/images/user_image/noimage.jpg"
                                @endif
                                style="width:70px; border-radius:50%; height:70px">
                            </span></p>
                            <p class="float-right mt-3">Updated: {{ $post->updated_at->format('d.m.Y') }}</p>
                      </div>

                      <div class="row mt-5">
                          <div class="col-md-4 mt-2">
                                @if (isset($post->image1))
                                <img class="img-fluid card-img" src="/images/post_images/{{ $post->image1 }}">
                                @else
                                    <img class="img-fluid card-img" src="/images/post_images/noimage.jpg">
                                @endif

                            </div>

                            <div class="col-md-4 mt-2">
                                @if (isset($post->image2))
                                <img class="img-fluid card-img" src="/images/post_images/{{ $post->image2 }}">
                                @else
                                    <img class="img-fluid card-img" src="/images/post_images/noimage.jpg">
                                @endif

                            </div>

                            <div class="col-md-4 mt-2">
                                @if (isset($post->image3))
                                <img class="img-fluid card-img" src="/images/post_images/{{ $post->image3 }}">
                                @else
                                    <img class="img-fluid card-img" src="/images/post_images/noimage.jpg">
                                @endif

                            </div>
                        </div>


                      <p class="mt-5 p-3">{!! $post->body !!}</p>
                  </div><br>


            </div>
        </div>
          {{-- Comments start --}}
         <div class="row">
             <div class="col-md-10 offset-md-1">

                <h2>Comments</h2>

             </div>
            <div class="col-md-10 offset-md-1">




                @foreach( $comments as $comment)
                @if ($comment->post_id == $post->id)

                    <div class="card mt-2">
                        <div class="card">
                            <div class="row">

                                <div class="col-md-6">
                                    <p class="mt-2 ml-2"><b>{{ $comment->user->name }}</b>
                                        <span class="ml-5 pl-5 float-right">Created: {{ $comment->created_at->format('d.m.Y') }}</span>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    @if (auth()->check() && Auth::user()->id == $comment->sender_id ||auth()->check() && Auth::user()->id == $post->user_id)
                                    <form action="{{ route('commentDelete', ['id'=>$comment->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn float-right" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="comment-delete-btn bi bi-x-square-fill mt-1" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1
                                                .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                              </svg>
                                        </button>
                                    </form>
                                    @endif

                                </div>

                            </div>


                        </div>
                        <div>
                            <p class="p-2"><b>{{ $comment->body }}</b></p>

                        </div>

                    </div>
                @endif

                @endforeach

            </div>
         </div>

         {{-- Comments End --}}

        <br>
        {{-- Comment Form Start--}}
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @if (Auth::user())
                <form action="{{ route('createComment', ['id' =>$post->id]) }}" method="post">
                    @csrf
                    <input type="text" name="body" class="form-control" placeholder="Write your comment here"><br>
                    <button class="btn btn-primary" type="submit">Add Comment</button>

                </form>
                @endif
                <br><br>
            </div>
        </div>
        {{-- Comment Form End --}}
    </div>
    {{-- Main Container End --}}
@endsection

