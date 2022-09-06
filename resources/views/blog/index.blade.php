<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              @if (Auth::user())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              @endif
              @if (!Auth::user())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="text-center pt-3">
            <h1 class="text-dark fw-bolder my-5">
                All Articles
            </h1>
            <hr class="border mb-5 border-1">
        </div>

        @if (Auth::user())
        <div class="pt-5 col-sm">
            <a class="shadow-lg btn btn-primary bg-success border-0 rounded-pill mb-5"
               href="{{ route('blog.create') }}">
                New Article
            </a>
        </div>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="pb-5 container rounded">
            <div class="bg-danger text-light fw-bolder px-2 py-1">
                Warning
            </div>
            <div class="border border-t-2 border-red-400 bg-red-100 px-2 py-1 text-red-700">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif

    @foreach($posts as $post)
        <div class="container pb-5">
            <div class="bg-white px-5 py-5 rounded-3 shadow-lg ">
                <div class="pb-5">
                    <h2 class=" pt-3 pb-0">
                        <a class="text-dark fw-bolder text-decoration-none" 
                            href="{{ route('blog.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <img src="{{ $post->image_path }} " alt="">
                    <p class="text-dark text-lg py-4">
                        {{ $post->excerpt }}
                    </p>

                    <span class="text-dark">
                    Made by:
                        <a href=""
                           class="text-success text-decoration-none font-italic">
                            {{ $post->user->name }}
                        </a>
                    {{ $post->updated_at->format('d/m/Y') }}
                    </span>
                </div>
                @if (Auth::id() === $post->user->id)
                <a href="{{ route('blog.edit', $post->id) }}" class=" text-decoration-none d-block text-teal-500">
                    Edit
                </a>
                <form 
                    action="{{ route('blog.destroy', $post->id) }}" 
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="form-control mt-2 text-light bg-danger w-25" type="submit">
                        Delete
                    </button>
                </form>
                @endif
            </div>
        </div>
    @endforeach

        <div class="mb-5">
            {{ $posts->links() }}
        </div>

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>