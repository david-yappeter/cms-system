<div class="container-fluid">
  
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
          <h6 class="m-0 font-weight-bold text-primary">Roles List</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="_role-table" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                      </tr>
                  </tfoot>
                  <tbody id="_role-table-body">
                    @foreach ($roles as $role)
                      <tr>
                          <td>
                            <a href="{{ route('admin.roles.show', $role->id) }}">
                              {{ $role->id }}
                            </a>
                          </td>
                          <td>{{ $role->name }}</td>
                          <td>{{ $role->slug }}</td>
                          <td>{{ $role->created_at->diffForHumans() }}</td>
                          <td>{{ $role->updated_at->diffForHumans() }}</td>
                          <td class="d-flex justify-content-around">     
                              <form action={{ route('admin.roles.show', $role->id) }}>
                                <button 
                                  class="btn btn-success" 
                                  
                                  @cannot('view', $role)
                                    disabled
                                  @endcan
                                >
                                  <i class="fa fa-eye"></i>
                                </button>
                              </form>

                              <form method="post" action="{{ route("admin.roles.destroy", ["role"=>$role->id])  }}" enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                
                                <button 
                                  class="btn btn-danger"
                                  @cannot('delete', $role)
                                    disabled
                                  @endcan
                                >
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                              </form>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
          </div>
  </div>
</div>