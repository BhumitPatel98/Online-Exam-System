<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
    .print_container
    {
        width: 70%;
        margin: auto;
    }

    .exam_title
    {
        text-align: center;
    }

    .info_block
    {
        width: 50%;
        float: left;
        height:50px;
        line-height: 50px;
        text-align: center;
    }

    .user_info_block
    {
        margin-top:74px;
    }

    .print-btn
    {
        text-align: center;
    }
</style>
</head>
<body>
    <div class="print_container">

        <div class="exam_title">
            <h3>{{ $students->oex_exam_masters->title }}</h3>
            <h4>{{ $students->oex_exam_masters->exam_date }}</h4>
        </div>

        <div class="user_info_block">

            <div class="info_block">
                <label>Name: {{ $students->name }}</label>
            </div>
            <div class="info_block">
                <label>Email: {{ $students->email }}</label>
            </div>
            <div class="info_block">
                <label>Mobile No: {{ $students->mobile_no }}</label>
            </div>
            <div class="info_block">
                <label>Date of Birth: {{date('d M,Y',strtotime($students->dob))}}</label>
            </div>

            <div class="print-btn">
                <button onclick="window.print()">Print</button>
            </div>

            <div class="print-btn">
                <a href= {{url('/portal/dashboard')}} >Home</a>
            </div>
        </div>

    </div>
</body>
</html>