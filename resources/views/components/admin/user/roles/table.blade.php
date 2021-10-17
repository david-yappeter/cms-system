<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Roles</h1>
  
    @if (session('role-detach')) 
      <div class="alert alert-danger">
        {{ session('role-detach') }}
      </div>
      @elseif (session('role-attach'))
      <div class="alert alert-success">
        {{ session('role-attach') }}
      </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Current User Roles List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Slug</th>
                            <th>Assigned</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Slug</th>
                            <th>Assigned</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($roles as $role)
                      <tr>
                          <td>{{ $role->id }}</td>
                          <td>{{ $role->name }}</td>
                          <td>{{ $role->slug }}</td>
                          <td>
                            @if ($user->hasRole($role->slug))
                            <form action="{{ route('admin.users.role.detach', ['user'=>$user, 'role'=>$role]) }}" method="POST">
                              @csrf
                              @method("PUT")
                              <button class="btn btn-danger">
                                Remove
                              </button>
                            </form>
                            @else
                            <form action="{{ route('admin.users.role.attach', ['user'=>$user, 'role'=>$role]) }}" method="POST">
                              @csrf
                              @method("PUT")
                              <button class="btn btn-primary">
                                Add
                              </button>
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
  </div>