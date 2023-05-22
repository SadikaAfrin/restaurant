@extends('layouts.app')

@section('admin_content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Item</li>
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
            <a href="{{ route('item.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Item</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>details</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($items as $key => $item)
                   <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->details }}</td>
                    <td>
                      <a href="{{ route('item.edit', $item->id) }}" class="btn btn-info">Edit</a>
                      <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy' , $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <button class="btn btn-danger" type="button" onclick="
                      if(confirm('Are You sure to delete this?')){
                      event.preventDefault(),
                      document.getElementById('delete-form-{{ $item->id }}').submit();
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