<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <center>
                <h1>myInformation</h1>
                

                <div class="mb-4">
                 <a href="#" style="font-weight: bold;text-decoration:none;font-size: 20px;">Me</a> 
    <br>
    
   
 
        
        <p class="mb-2" style="font-weight: bold;text-decoration:none;font-size: 20px; ">
            Email : {{Auth::user()->email}}</p>
            <p class="mb-2" style="font-weight: bold;text-decoration:none;font-size: 20px; ">
            Name : {{Auth::user()->name}}</p>
            
        <p class="mb-2" style="font-weight: bold;text-decoration:none;font-size: 20px; ">
            you start in : {{Auth::user()->created_at}}  &nbsp; ||   &nbsp;{{Auth::user()->created_at->diffForHumans()}}</p>
            
        
               </div>






                </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
</body>
</html>
