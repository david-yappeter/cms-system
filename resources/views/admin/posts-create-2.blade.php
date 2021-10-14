<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Admin Navbar</title>
</head>
<body>
    <x-admin-navbar />
    <div class="container">
        <div class="display-3">Create</div>
        
        <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title . .">
            </div>
            <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" id="file" class="form-control" placeholder="Title . .">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <input type="text" name="body" id="body" class="form-control" placeholder="Title . .">
            </div>
            <button type="submit" class="my-2 btn btn-primary">Submit</button>
        </form>

        @if ($errors->any()) 
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <li><strong>{{ $error }}</strong></li>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>