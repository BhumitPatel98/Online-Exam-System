@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>
  
                  <div class="card-tools">
                    <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                  </div>
                </div>
                <div class="card-body">
                 
                    <table class="table table-striped table-bordered table-hover datatable">

                        <thead >
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody >
                          <?php $count=1 ?>
                          @foreach ($categories as $categori)
                          <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $categori->name }}</td>
                            <td>
                                @if ($categori->status == 1)
                                    
                                   <input type="checkbox" class="category_status" data-id="{{ $categori->id }}" name="status" checked> 

                                @else
                                 
                                    <input type="checkbox" class="category_status" data-id="{{ $categori->id }}" name="status"> 

                                @endif
                            </td>
                            <td>
                              <a href="{{ route('edit-category',$categori->id) }}" class="btn btn-info btn-sm">Edit</a>
                              <a href="{{ route('delete-category',$categori->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>    
                          @endforeach

                        </tbody>


                    </table>

                </div>
        
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>

  </div>
  <!-- /.content-wrapper -->
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <form action="{{ route('add-new-category') }}" class="database_operation" method="POST">
          @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Enter Category Name</label>
                        <input type="text" name="name" placeholder="Enter Category Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                       <button class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>

        </form>

        
      </div>

    </div>
    
  </div>
  </div>

  @endsection()
  