<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .singUp_container {
            width: 50%;
            height: 350px;
            border: 1px solid;
            border-radius: 40px;
            padding: 10px;
            margin-top: 100px;
            margin-left: 250px;
        }
    </style>
    <title>Student Singup</title>
</head>
<body>
    <div class="container">
        <div class="singUp_container">
            <div class="singUp_title">
                <h3 class="text-center">Student Login</h3>
                <hr>
            </div>
            <form action="{{ route('student-login-sub') }}" class="database_operation" method="POST">  
                @csrf
                <div class="singUp_form">

                        <div class="col-sm-12">
        
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="text" name="email" placeholder="Enter Email" class="form-control" required>
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
                            <button class="btn btn-info" type="submit">Login</button>
                            </div>
                        </div>


                 </div>
            </form>
        </div>

    </div>
</body>
<script src="{{ url('assets/js/custom.js') }}"></script>
</html>