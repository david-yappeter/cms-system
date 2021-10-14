@extends("admin.admin-layout")

@section('content')
<div class="container-fluid">
    <div class="display-5">Edit Post</div>
        @if (session('message-update'))
            <div class="alert alert-success">
                {{ session('message-update') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.post.patch', ['post'=>$post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $post->title }}" name="title" id="title" class="form-control" placeholder="Title . .">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                @if ($post->post_image)
                    <div>
                        <img class="my-2" style="height: 150px" src="{{$post->post_image}}" alt="post image">
                    </div>
                    @endif
                <input type="file" name="post_image" id="file" class="form-control" placeholder="Title . .">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea cols="30" row="10" type="text" name="body" id="body" class="form-control" placeholder="Title . .">{{ $post->body }}</textarea>
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
</div>
@endsection