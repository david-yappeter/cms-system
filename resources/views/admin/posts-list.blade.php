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
                          <th>Author</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $post)
                          @php
                            $modal_id = "exampleModal-".$loop->index
                          @endphp
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td><a href="{{ route('admin.post.edit', ['post'=>$post->id]) }}">{{ $post->title }}</a></td>
                        <td>
                          @if ($post->post_image) 
                          <i class="btn far fa-image" data-bs-toggle="modal" data-bs-target="#{{ $modal_id }}"></i>
                            <x-modal :modal-id="$modal_id" modal-title="Image" >
                                <img loading="lazy" style="width: 100%" src="{{ $post->post_image }}" />
                            </x-modal>
                          @endif
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td class="d-flex justify-content-evenly">
                          {{-- @if (auth()->user()->id === $post->user_id) --}}
                          @can('view', $post)
                            <form method="get" action="{{ route('admin.post.edit', ['post'=>$post->id]) }}">
                              <button class="btn btn-success">
                                <i class="fa fa-pen" aria-hidden="true"></i>
                              </button>
                            </form>

                            <form method="post" action="{{ route("admin.post.delete", ["post"=>$post->id])  }}" enctype="multipart/form-data">
                              @csrf
                              @method("DELETE")
                              
                              <button class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </button>
                            </form>
                          @endcan
                          {{-- @endif --}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
          </div>
  </div>
</div>
@endsection