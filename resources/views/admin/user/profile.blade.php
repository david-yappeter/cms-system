@extends("admin.admin-layout")

@section('content')
<div class="container-fluid ml-0" style="max-width: 500px">
    <h1 class="display-5"> User Profile </h1>
    @if (session('user-updated'))
        <div class="alert alert-success">
            {{ session('user-updated') }}
        </div>
    @elseif (session('user-updated-no-changes'))
        <div class="alert alert-danger">
            {{ session('user-updated-no-changes') }}
        </div>
    @endif
    <form action="" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        @method("PATCH")
        <label for="">Name</label>
        <div class="form-group d-flex">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name . . ." value={{ $user->name }}>
            <button type="submit" class="btn btn-primary">Change</button>
        </div>
    </form>
    <div class="form-group">
        <label for="">Email</label>
        <input disabled type="text" name="name" id="name" class="form-control" placeholder="Email . . ."  value={{ $user->email }}>
    </div>
</div>
@endsection