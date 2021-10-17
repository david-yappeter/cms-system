<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User List</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                          <td>
                            <a href="{{ route('admin.user.profile', $user->id) }}">
                              {{ $user->id }}
                            </a>
                          </td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
  </div>
</div>