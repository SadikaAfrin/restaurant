@extends('layouts.app')

@section('admin_content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Specialmanu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Specialmanu</li>
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
            <a href="{{ route('specialmanu.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Specialmanu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Specialmanu Name</th>
                    <th>Specialmanu Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($specialmanuse as $key => $specialmanu)
                   <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $specialmanu->name }}</td>
                    <td>{{ $specialmanu->slug }}</td>
                    
                    <td>
                      <a href="{{ route('specialmanu.edit', $specialmanu->id) }}" class="btn btn-info">Edit</a>
                      <form id="delete-form-{{ $specialmanu->id }}" action="{{ route('specialmanu.destroy' , $specialmanu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <button class="btn btn-danger" type="button" onclick="
                      if(confirm('Are You sure to delete this?')){
                      event.preventDefault(),
                      document.getElementById('delete-form-{{ $specialmanu->id }}').submit();
                      }else{
                        event.preventDefault();
                      }">
                       Delete </button>
                    </td>
                   </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

