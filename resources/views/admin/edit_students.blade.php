@extends('layouts.app')
@section('title','Manage Students')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Students</li>
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
                  <h3 class="card-title"></h3>
  
                  <div class="card-tools">

                  </div>
                </div>
                <div class="card-body">
                 
                    <form action="{{ route('update-students') }}" class="database_operation" method="POST">  
                        @csrf
                        <input type="hidden" name="id" value="{{ $students->id }}">
                          <div class="row">
                              <div class="col-sm-12">
              
                                  <div class="form-group">
                                      <label for="">Enter Name</label>
                                      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{$students->name}}" required>
                                  </div>
                              
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Enter Email</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control" value="{{$students->email}}" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Enter Mobile No</label>
                                    <input type="text" name="mobile_no" placeholder="Enter Mobile No" class="form-control" value="{{$students->mobile_no}}" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Select DOB</label>
                                    <input type="date" name="dob" class="form-control" value="{{$students->dob}}" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">
              
                                  <div class="form-group">
                                      <label for="">Select Exam</label>
                                      <select class="form-control" name='exam' required>
                                          <option value="">--Select--</option>
                                            @foreach($datas as $data)

                                                @if($students->oex_exam_masters_id == $data->id)

                                                    <option value="{{$data->id}}" selected>{{$data->title}}</option>

                                                @else

                                                    <option value="{{$data->id}}" >{{$data->title}}</option>

                                                @endif
                                            @endforeach
                                      </select>
                                  </div>
                              
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Enter Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">
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
  <!-- /.content-wrapper -->

  @endsection()
  