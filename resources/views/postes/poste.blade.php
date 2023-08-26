<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Document</title>
</head>
<body>

@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('AddPost')}}" method="post" class="mb-4">
        @csrf
        <textarea class="  form-control fixed-size-textarea  @error('body') is-invalid  @enderror" name="body" id="body" cols="30"
    rows="10"></textarea>
        @error('body')
            <div class="text-red-500 mt-2 text-sm text-danger">
    {{ $message }}
            </div>
            @enderror

        <button class="btn btn-primary">Add Poste</button>


    </form>
@if($data->count())
@foreach($data as $poste)
    <div class="mb-4">
    <a href="userPost/{{$poste->user->id}}" style="font-weight: bold;text-decoration:none;font-size: 20px;">{{$poste->user->name}}</a> 
    <span        style="font-weight: bold;text-decoration:none;font-size: 18px;color:gray">{{$poste->created_at->diffForHumans()}}</span>
    <br>
    
   
 
        <p class="mb-2" style="font-weight: bold;text-decoration:none;font-size: 20px; ">
            {{$poste->body}}</p>


        @if($poste->user->email==Auth::user()->email)

      
        <form action="poste/deletePost/{{$poste->id}}" method="post" class="mr-1">
            @csrf
            @method('delete')
            <button class="btn btn-danger">delete Poste</button>
        </form>
       
        @endif
  
    



        </div>
        <div class=" d-flex">
        @if(!$poste->check(Auth::id()))

<form action="poste/Likes" method="post" class="mr-1">
        @csrf
        <input type="hidden" name="idPoste" value="{{$poste->id}}">

        <button class="text-blue-500 fa fa-thumbs-up" style="font-size:20px;color:blue">Like({{$poste->likes->count()}})</button>
    </form>
@else
  
    <form action="poste/UnLikes/{{$poste->id}}" method="post" class="mr-1">
        @csrf
        @method('delete')

        <button class="text-blue-500 fa fa-thumbs-down" style="font-size:20px;color:blue" class="text-primary">UnLike()</button> likes({{$poste->likes->count()}})

    </form>
@endif
    

</div>
<!-- <p>{{$poste->likes->count()}} {{Str::plural('like',$poste->likes->count())}}</p> -->


        @endforeach
        <br>

        {{$data->links()}}
        @endif
        @endsection
        </div>
        </body>

        </html>