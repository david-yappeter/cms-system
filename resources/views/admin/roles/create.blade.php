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
  <div class="row">
    <div class="col-sm-3">
      <form action="{{ route('admin.roles.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="">Slug</label>
          <input type="text" name="slug" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <button type="submit" class="mt-5 btn btn-primary btn-block">Create</button>
      </form>
    </div>
    <div class="col-sm-9">
      <x-admin.roles.table :roles="$roles"/>
    </div>
  </div>
</div>
@endsection