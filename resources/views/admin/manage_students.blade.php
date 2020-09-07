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
            <h1 class="m-0 text-dark">Manage Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Students</li>
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
                    <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                  </div>
                </div>
                <div class="card-body">
                 
                    <table class="table table-striped table-bordered table-hover datatable">

                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Exam</th>
                            <th>Exam Date</th>
                            <th>Result</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                          <?php $count=1 ?> 
                          @foreach ($exams as $exam)
                             <tr>
                                <td>{{$count++}}</td>
                                <td>{{$exam->name}}</td>
                                <td>{{$exam->dob}}</td>
                                <td>{{$exam->oex_exam_masters->title}}</td>
                                <td>{{$exam->oex_exam_masters->exam_date}}</td>
                                <td>N/A</td>
                                <td>
                                  @if($exam->status)
                                      <input type="checkbox" class="student_status" data-id="{{$exam->id}}" name="status" checked> 
                                  @else
                                      <input type="checkbox" class="student_status" data-id="{{$exam->id}}" name="status"> 
                                  @endif
                                </td>
                                <td>
                                  <a href="{{ route('edit-students',$exam->id) }}" class="btn btn-info btn-sm">Edit</a>
                                  <a href="{{ route('delete-students',$exam->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
        <h4 class="modal-title">Add New Students</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {{--  --}}
        <form action="{{ route('add-new-students') }}" class="database_operation" method="POST">  
          @csrf
            <div class="row">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label for="">Enter Name</label>
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
                        <label for="">Select Exam</label>
                        <select class="form-control" name='exam' required>
                            <option value="">--Select--</option>
                              @foreach($datas as $data)
                              <option value="{{$data->id}}">{{$data->title}}</option>
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
  