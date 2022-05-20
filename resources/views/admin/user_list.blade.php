@extends('admin.template.main')

  

@section('meta_token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('container')
<div class="header bg-primary pb-6" style="height: 40%; margin-bottom: -14%;"></div>
<div class="container mt-5">
    <div class="row align-items-center py-4">
        
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">User List</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary" onclick="create()"> + Add User</a>
                </div>
              </div>
            </div>
            <div id="read" class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  </tbody>
              </table>
            </div>
          </div>
        </div>
       </div>

<!--  -->
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        read()
    });
    // Read Database
    function read() {
        $.get("{{ url('/admin/read') }}", {}, function(data, status) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#read").html(data);
        });
    }

    function create() {
        $.get("{{ url('/admin/create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Add User')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }

    function store() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var role = $("#role:checked").val();
        debugger;
        $.ajax({
            type: "post",
            url: "{{ url('/admin/store') }}",
            data: {
                "name": name,
                "email": email,
                "password": password,
                "role": role
            },
            success: function(data) {
                $(".btn-close").click();
                read()
            },
            /* error: function(xhr, status, error) {
                alert("Error!" + xhr.status + " " + error);
            }, */
        });
    }

    function show(id) {
        $.get("{{ url('/admin/show') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit User')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }

    function update(id) {
        var email = $("#email").val();
        var name = $("#name").val();
        var role = $("#role:checked").val();
        debugger;
        $.ajax({
            type: "post",
            url: "{{ url('/admin/update') }}/" + id,
            data: {
                "name": name,
                "email": email,
                //"password": password,
                "role": role
            },
            success: function(data) {
                $(".btn-close").click();
                read()
            },
            error: function(xhr, status, error) {
                alert("Error!" + xhr.status + error);
            },
        });
    }

    function destroy(id) {
        $.ajax({
            type: "get",
            url: "{{ url('/admin/destroy') }}/" + id,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
</script>