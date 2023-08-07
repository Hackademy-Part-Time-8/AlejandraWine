@extends('layout.layout')

@section('title','Ver Bar')

@section('content')
        <h1 class="text-center">Show bar</h1>
        <div class="row d-flex justify-content-center">
       
        <div class="col-3 py-2 ">
        <div class="card" style="width: 18rem;">
            <img src="{{$bar->image}}" class="card-img-top" alt="{{$bar->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$bar->name}}</h5>
                <p class="card-text">{{$bar->description}}</p>
                <a href="{{route('bars.show',$bar->id)}}" class="btn btn-primary">Go to Bar</a>
            </div>
        </div>
        </div>

        </div>
        <div class="d-flex justify-content-center">
        <form method='POST' action="{{route ('bars.delete',$bar->id) }}" onsubmit = "return confirmar ('Are you sure you would like to delete this bar?','Notification');">
            @csrf
        <button type = "submit" class="btn btn-danger">Delete</button>
        </form>
       
        <a href="{{route('bars.edit',$bar->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('bars.index')}}" class="btn btn-primary">Return</a>

        </div>
@endsection