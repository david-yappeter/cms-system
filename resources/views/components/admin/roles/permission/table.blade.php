
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Permission List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permit</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            <a href="">
                                {{ $permission->id }}
                            </a>
                        </td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->slug }}</td>
                        <td class="d-flex justify-content-center">
                            @if ($role->hasPermission($permission))
                                <form action="{{ route('admin.roles.permissions.detach', [$role, $permission]) }}" method="POST">
                                    @csrf
                                    @method("PATCH")
                                    <button class="btn btn-danger">Remove</button>
                                </form>
                            @else
                                <form action="{{ route('admin.roles.permissions.attach', [$role, $permission]) }}" method="POST">
                                    @csrf
                                    @method("PATCH")
                                    <button class="btn btn-success">Add</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
</div>
