@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="projectdata" class="table table-bordered table-hover">
                  <thead>
                    @foreach ($project as $projects)

                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  @endforeach
                  </thead>
                  <tbody>

                  <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->price}}</td>
                    <td>{{$project->date}}</td>
                    <td>{{$project->descripttion}}</td>
                    <td><a href="{{ route('editproject', $project->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td><a href="{{ route('delete', $project->id) }}" class="btn btn-sm btn-primary">Delete</a></td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
</table>
@section('script')
<script>
    $(document).ready(function() {
        $('#projectdata').DataTable();
        });
        $.ajax({
            type:'DELETE',
            url:{{ route('delete/{id}') }},
            data:{
                '_token':'{{ csrf_token() }}'
            },
            success:function(data){
                console.log(data);
                windows.location.route();

            },
            error:function(xhr,status,error){
                console.log(xhr.responseText());
            }
        });
    </script>

