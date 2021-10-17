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
  <x-admin.roles.table :roles="$roles"/>
</div>
@endsection