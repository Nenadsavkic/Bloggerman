
        @extends('layouts.app')
        @section('title')
            Bloggerman
        @endsection
        @section('content')
              <div class="container-fluid">
                  <div class="row mt-5">
                      <div class="col-md-6 offset-md-2 pl-5">

                        @include('layouts.flashMessage')

                        <h1 class="text-center text-primary mt-5">Welcome to Bloggerman</h1>
                        <h2 class="text-center text-primary"> web platform for bloggers with superpowers.</h2>
                        <br>
                        <h2 class="text-center text-primary">Join us, and build something amaizing!</h2>
                      </div>
                      <div class="col-md-4">
                        <img src="{{ asset('/images/bloggerman_img/bloggerman3.jpg') }}">
                      </div>


                  </div>




              </div>
        @endsection


