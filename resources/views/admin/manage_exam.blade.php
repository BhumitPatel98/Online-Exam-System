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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                        <?php $count=1 ?>
                         @foreach ($exams as $exam)
                             <tr>
                              <td>{{ $count++ }}</td>
                              <td>{{ $exam->title }}</td>
                              <td>{{ $exam->oex_categories->name }}</td>
                              <td>{{ $exam->exam_date }}</td>
                              @if($exam->status)

                                  <td> <input type="checkbox" class="exam_status" data-id="{{ $exam->id }}" name="status" checked> </td>

                              @else

                                  <td> <input type="checkbox" class="exam_status" data-id="{{ $exam->id }}" name="status"> </td>

                              @endif

                              <td>
                                <a href="{{ route('edit-exam',$exam->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ route('delete-exam',$exam->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
        <h4 class="modal-title">Add New Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {{--  --}}
        <form action="{{ route('add-new-exam') }}" class="database_operation" method="POST">  
          @csrf
            <div class="row">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label for="">Enter Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                    </div>
                
                </div>

                <div class="col-sm-12">

                    <div class="form-group">
                        <label for="">Select Exam Date</label>
                        <input type="date" name="exam_date" class="form-control" required>
                    </div>
                
                </div>

                <div class="col-sm-12">

                    <div class="form-group">
                        <label for="">Select Exam Category</label>
                        <select class="form-control" name='exam_category' required>
                            <option value="">--Select--</option>
                            @foreach ($categories as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
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
  