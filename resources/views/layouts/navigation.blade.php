@php
    use App\Models\Category;
    $categories = Category::all();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-2 pb-2">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          @foreach ($categories as $category)
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('welcome')}}?cat={{ $category->name }}">{{ $category->name }}<span class="sr-only">(current)</span></a>
          </li>
          @endforeach
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{ route('searchPosts') }}">
        <input class="form-control mr-sm-2" type="search" name="search_text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
