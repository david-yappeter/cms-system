@extends("admin.admin-layout")

@section("styles")
  <link
  href="vendor/datatables/dataTables.bootstrap4.min.css"
  rel="stylesheet"
  />
@endsection

@section("scripts")
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  {{-- <script src="{{ asset('js/datatables-demo.js') }}"></script> --}}
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
      For more information about DataTables, please visit the <a target="_blank"
          href="https://datatables.net">official DataTables documentation</a>.</p>

  @if (session('message-delete')) 
    <div class="alert alert-danger">
      {{ session('message-delete') }}
    </div>
    @elseif (session('message-create'))
    <div class="alert alert-success">
      {{ session('message-create') }}
    </div>
  @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Email Verified At</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verified At</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                          <td>
                              {{ $user->id }}
                          </td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->email_verified_at }}</td>
                          <td>{{ $user->created_at->diffForHumans() }}</td>
                          <td>{{ $user->updated_at->diffForHumans() }}</td>
                          <td class="d-flex justify-content-around">
                            
                              <form action={{ route('admin.user.profile', $user->id) }}>
                                <button 
                                  class="btn btn-success" 
                                  href="{{ route('admin.user.profile', $user->id) }}"
                                  
                                  @cannot('view', $user)
                                    disabled
                                  @endcan
                                >
                                  <i class="fa fa-pen" aria-hidden="true"></i>
                                </button>
                              </form>

                              <form method="post" action="{{ route("admin.users.destroy", ["user"=>$user->id])  }}" enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                
                                <button 
                                  class="btn btn-danger"
                                  @cannot('delete', $user)
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
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
          </div>
  </div>
</div>
@endsection