@extends('layouts.student')
@section('title','Exam')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam</li>
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
                 
                    <table class="table table-striped table-bordered table-hover datatable">

                        <thead >
                            <th>#</th>
                            <th>Name</th>
                            <th>Exam Title</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Action</th>
                            
                        </thead>

                        <tbody >
                          <?php $count=1 ?> 
                          <td>
                              <td>{{ $students->name }}</td>
                              <td>{{ $students->oex_exam_masters->title }}</td>
                              <td>{{ $students->oex_exam_masters->exam_date }}</td>
                              <td> 
                                  @if (strtotime($students->oex_exam_masters->exam_date) > strtotime(date('Y-m-d')))
                                     Complete
                                  @elseif(strtotime($students->oex_exam_masters->exam_date) == strtotime(date('Y-m-d')))
                                     Running
                                  @else
                                     Pending
                                  @endif
                              </td>
                              <td>N/A</td>
                              <td><a href=""" class="btn btn-info btn-sm">Join Exam</a></td>
                          </td>
                          
                           
                          
                          
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
     
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        

        
      </div>

    </div>
    
  </div>
  </div>

  @endsection()
  