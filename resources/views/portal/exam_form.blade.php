@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Exam</li>
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
                 
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 >{{$exams[0]['title']}}</h3>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-right" >{{date('d M,Y',strtotime($exams[0]['exam_date']))}}</h3>
                        </div>
                    </div>
                    <form action="{{ route('portal-exam-form-submit') }}" class="database_operation" method="POST">  
                        @csrf
                          <div class="row">
                              <div class="col-sm-12">
              
                                  <div class="form-group">
                                      <label for="">Enter Name</label>
                                      <input type="hidden" name="id" value="{{$exams[0]['id']}}">
                                      <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
                                  </div>
                              
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Enter Email</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">
              
                                <div class="form-group">
                                    <label for="">Enter Mobile No</label>
                                    <input type="text" name="mobile_no" placeholder="Enter Mobile No" class="form-control" required>
                                </div>
                            
                              </div>
              
                              <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="">Select DOB</label>
                                    <input type="date" name="dob" class="form-control" required>
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
                                     <button class="btn btn-primary" type="submit">Add</button>
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
  