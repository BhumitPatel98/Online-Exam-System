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
            <h1 class="m-0 text-dark">Edit Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Exam</li>
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
                 
                   <form action="{{route('update-exam')}}" class="database_operation" method="POST">  
                    @csrf
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="">Enter Title</label>
                                     <input type="hidden" name="id" value="{{ $exams->id }}">
                                    <input type="text" value="{{$exams->title}}" name="title" placeholder="Enter Title" class="form-control" required>
                                </div>
                            
                            </div>

                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="">Select Exam Date</label>
                                    <input type="date" value="{{$exams->exam_date}}" name="exam_date" class="form-control" required>
                                </div>
                            
                            </div>

                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="">Select Exam Category</label>
                                    <select class="form-control" name='exam_category' required>
                                        <option value="">--Select--</option>
                                        @foreach ($categories as $categori)

                                            @if($exams->oex_categories_id == $categori->id)

                                                 <option value="{{ $categori->id }}" selected>{{ $categori->name }}</option>

                                            @else

                                                 <option value="{{ $categori->id }}">{{ $categori->name }}</option>

                                            @endif
                                           
                                        @endforeach
                                    </select>
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
  