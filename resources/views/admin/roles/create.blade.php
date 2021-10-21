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

  <script>
    var request;
      $("#_role-create-form").submit(function(e) {
        e.preventDefault();
        if (request) {
            request.abort();
      }

      // setup some local variables
      var $form = $(this);
      var $inputs = $form.find("name, slug");
      var serializedData = $form.serialize();
      $inputs.prop("disabled", true);

      const roleTableBody = $("#_role-table-body");

      console.log("{{ route('admin.roles.store') }}");
      request = $.ajax({
        url: "{{ route('admin.roles.store') }}",
        type: "POST",
        data: serializedData,
      });
      
      request.done(function (response){
        // const RoleTableDataCreate = function (input) {
        //   const tdID = $("<td> <a> </a> </td>").html(input->id);
        //   const tr = $("<tr></tr>").html(tdID);
        //   return tr;
        // }

          // Log a message to the console
          console.log(response);
          console.log("Hooray, it worked!");

          // roleTableBody.appendChild("<h1> hello </h1>");
        
      });
      
      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });
      
      request.always(function () {
          // Reenable the inputs
          $inputs.prop("disabled", false);
      });
      // $.ajax({
      //   type: "POST",
      //   url: "{{ route('admin.roles.store') }}",
      //   success: function(result) {
      //     console.log(result);
      //   },
      // });
    })
  </script>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <form 
      id="_role-create-form"
      {{-- action="{{ route('admin.roles.store') }}" method="POST" enctype="application/x-www-form-urlencoded" --}}
      >
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