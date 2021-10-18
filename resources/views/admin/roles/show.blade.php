@extends("admin.admin-layout")

@section('content')
<div class="container-fluid ml-0">
    <div class="row">
        <div class="col-sm-3">
            <h1 class="display-5"> {{ $role->name }}</h1>
            @if (session('message-updated'))
                <div class="alert alert-success">
                    {{ session('message-updated') }}
                </div>
            @elseif (session('message-updated-no-changes'))
                <div class="alert alert-danger">
                    {{ session('message-updated-no-changes') }}
                </div>
            @endif
            
            <div class="form-group">
                <label for="">ID</label>
                <input disabled type="text" name="id" id="" class="form-control" placeholder="ID . . ."  value={{ $role->id }}>
            </div>

            <form action="{{ route('admin.roles.patch', $role->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                @method("PATCH")
                <label for="">Name</label>
                <div class="form-group d-flex">
                    <input type="text" name="name" id="" class="form-control" placeholder="Name . . ." value={{ $role->name }}>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
            <div class="form-group">
                <label for="">Email</label>
                <input disabled type="text" name="slug" id="" class="form-control" placeholder="Slug . . ."  value={{ $role->slug }}>
            </div>
        </div>

        <div class="col-sm-8 offset-sm-1">
            <x-admin.roles.permission.table :role="$role" :permissions="$permissions" />
        </div>
    </div>
</div>

<x-admin.roles.user.table :users="$users" />
@endsection