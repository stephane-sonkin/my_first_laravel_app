<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="text-center pt-3">
            <h1 class="text-dark">
                Add new post
            </h1>
            <hr class="border border-1">
        </div>

    </div>
    {{-- form --}}
    <div>

        <div class="pb-3 container">
            @if ($errors->any())
                <div class="bg-danger text-center fw-bolder text-light rounded-top px-1 py-2">
                    All fields need to be filled correctly
                </div>
            @endif
        </div>
        <form 
        action="{{ route('blog.store') }}" 
        enctype="multipart/form-data" 
        method="POST" 
        class="container">
        @csrf

        <div class="pt-5 col-sm">
            <label for="is_published" class="form-check-label fs-5 mb-2">
                Is published
            </label>
            <input 
                class="form-check-input mt-2" 
                type="checkbox" 
                name="is_published">
        </div>

        <div class="mb-3 mt-3">
          <input 
            type="text" 
            class="form-control border border-top-0 border-start-0 border-end-0" 
            placeholder="Title..." 
            name="title">
        </div>

        <div class="mb-3">
          <input 
            type="text" 
            class="form-control border border-top-0 border-start-0 border-end-0" 
            placeholder="Excerpt..." 
            name="excerpt">

        </div>

        <div class="mb-3">
          <input 
            type="text" 
            class="form-control border border-top-0 border-start-0 border-end-0" 
            placeholder="Minutes to read..." 
            name="min_to_read">

        </div>

        <div>
            <textarea 
                class="form-control border border-top-0 border-start-0 border-end-0" 
                rows="5" 
                placeholder="Body..." 
                name="body">
            </textarea>
        </div>

        <input type="file" 
            class=" form-control w-25 btn mt-5 shadow"
            name="image">
        <button class="btn btn-primary d-block mt-5 mb-5" type="submit">
            Submit
        </button>
    </form>
    </div>
</body>
</html>