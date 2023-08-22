@extends('layouts.layout')

@section('title','Ver wine')

@section('content')
        <h1 class="text-center">Show wine</h1>
        <div class="row d-flex justify-content-center">

        <div class="col-3 py-2 ">
        <div class="card" style="width: 18rem;">
            <img src="{{$wine->image}}" class="card-img-top" alt="{{$wine->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$wine->name}}</h5>
                <p class="card-text">{{$wine->description}}</p>
                
                <a href="{{route('wine.show',$wine->id)}}" class="btn btn-primary">Go to wine</a>
            </div>
        </div>
        </div>

        </div>
        <div class="d-flex justify-content-center">
            @auth

        <form method='POST' action="{{route ('wine.destroy',$wine->id) }}" onsubmit = "return confirmar ('Are you sure you would like to delete this wine?','Notification');">
            @method('DELETE')
            @csrf
        <button type = "submit" class="btn btn-primary">Delete</button>
        </form>

        <a href="{{route('wine.edit',$wine->id)}}" class="btn btn-primary">Edit</a>
        @endauth
        <a href="{{route('wine.index')}}" class="btn btn-primary">Return</a>

        </div>
@endsection
