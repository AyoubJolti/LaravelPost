<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <center>
                <h1>postes of {{$data[0]->name}}</h1>
                <h5> posted &nbsp; {{count($data)}} :&nbsp;postes</h5>


                @foreach($data as $poste)

                <div class="mb-4">
                 <a href="#" style="font-weight: bold;text-decoration:none;font-size: 20px;">{{$poste->name}}</a> 
    <span        style="font-weight: bold;text-decoration:none;font-size: 18px;color:gray">{{$poste->created_at}}</span>
    <br>
    
   
 
        <p class="mb-2" style="font-weight: bold;text-decoration:none;font-size: 20px; ">
            {{$poste->body}}</p>
               </div>






                @endforeach
                </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
</body>
</html>
