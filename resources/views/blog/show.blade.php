<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
</head>

<body>
    <div class="w-4/5 mx-5 col-sm-10">
        <div class="pt-5">
            <a href="{{ URL::previous() }}"
               class="text-success text-decoration-none pb-3 py-5">
                < Back to previous page
            </a>
        </div>

        <h2 class="fw-bolder text-center py-2 mt-5">
            {{ $post->title }}
        </h2>
        <hr class="border border-1">

        <p class="pt-4 fw-bolder italic">
            Categogies:
            @foreach ($post->categories as $category)
                {{ $category->title }},
            @endforeach
        </p>

        <div>
            <div class="text-statrt fw-bolder pb-5 pt-0 pl-0">
                <span class="text-start">
                    Made by:
                    <a
                        href=""
                        class="fw-bold text-success text-decoration-none pb-3 py-5">
                        Code With Stephane
                    </a>
                    On 17-07-2022
                </span>
            </div>
        </div>

        <div class="pt-3 pb-5">
            <p class="fw-bolder">
                {{ $post->excerpt }}
            </p>

            <p class="text-base text-black pt-10">
                {{ $post->body }}
            </p>
        </div>
    </div>


    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
    </body>
</html> 