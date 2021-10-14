<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Blog</title>
    <link href={{ asset("css/blog-post.css") }} rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-brand ms-3" href="#" href={{ route('blog.index') }}>My Blog Post</div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-3 ms-md-auto me-md-3" aria-labelledby="navbarDropdown">
                <a class="nav-item nav-link" href={{ route('blog.index') }}> Home </a>
                @if (Auth::check())
                    <a class="nav-item nav-link" href={{ route('admin.index') }}> Admin </a>
                @else
                    <a class="nav-item nav-link" href={{ route('login') }}> Login </a>
                    <a class="nav-item nav-link" href={{ route('register') }}> Register </a>
                @endif
            </ul>
        </div>
    </nav>
    
    <div class="row mt-4 mx-3 mx-lg-5 pe-lg-5">
        {{-- Blog Section --}}
        <section class="col-12 col-lg-9 pe-5">
                
            <div class="display-5 mb-4">{{ $post->title }}</div>
            <hr/>
            Posted on {{ $post->created_at->toDayDateTimeString() }}
            <hr/>
            <img class="card-img-top" src="{{$post->post_image}}" alt="">
            <hr/>
            <p style="font-weight: 500">{{ $post->body }}</p>

        </section>

        {{-- Side Section --}}
        <section class="d-none d-lg-block col-3">
            <div class="card mb-5 mt-3">
                <h4 class="card-header p-3">Search</h4>
                <div class="card-body m-2">
                    <form class="form-inline my-2 my-lg-0 d-flex">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search for ...">
                        <button class="btn btn-success my-2 my-sm-0 ms-2" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="card my-5">
                <h4 class="card-header p-3">Categories</h4>
                <div class="card-body my-2 row">
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                    <a class="col-6 no-underline py-1">
                        Web Design
                    </a>
                </div>
            </div>

            <div class="card my-5">
                <h4 class="card-header p-3">Side Widget</h4>
                <div class="card-body my-2">
                    You can put anything you want inside these side widgets. They are easy to use, and feature with Bootstrap 5
                </div>
            </div>
        </section>

    </section>
</body>
</html>