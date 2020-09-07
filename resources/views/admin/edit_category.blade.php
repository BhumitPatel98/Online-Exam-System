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
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
              
                <div class="card-body">
                    <form action="{{ route('update-category') }}" class="database_operation" method="POST">
                        @csrf
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label for="">Enter Category Name</label>
                                        <input type="hidden" name="id" value="{{ $categories->id }}">
                                      <input type="text" name="name" value="{{ $categories->name }}" placeholder="Enter Category Name" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                     <button class="btn btn-primary" type="submit">Update</button>
                                  </div>
                              </div>
                          </div>
              
                      </form>
                  

                </div>
        
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>

  </div>
  
  @endsection()
  