@extends('layouts.student')
@section('title','Student Dashboard')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
            {{-- @foreach ($exams as $key => $exam)
                <?php 
                
                    if(strtotime(date('Y-m-d')) > strtotime($exam->exam_date))
                    {
                        $cls="bg-danger";
                    }
                    else 
                    {
                        if($key%2==0)
                            $cls="bg-info";
                        else
                            $cls="bg-success";
                    }
                ?>

                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box {{ $cls }}">
                        <div class="inner">
                        <h3>{{ $exam->title }}</h3>
        
                        <p>{{ $exam->oex_categories->name }}</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        @if (strtotime(date('Y-m-d')) > strtotime($exam->exam_date))
                                <a href="#" class="small-box-footer">Exam Date is Over</i></a>
                        @else
                                <a href="{{ route('portal-exam-form',$exam->id) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>     
                        @endif
                    </div>
                </div>
            @endforeach --}}
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  @endsection()
  