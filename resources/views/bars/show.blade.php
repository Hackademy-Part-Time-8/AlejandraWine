@extends('layouts.layout')

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
                @isset($bar->user)
                <small class="card-text" style ="font-size: 0.5rem">Uploaded by:{{$bar->user->name}}</small>
                @endisset
                <br>
                
            </div>
        </div>
        </div>

        </div>
        <div class="d-flex justify-content-center">
            @auth
            @if (isset($bar->user)&& Auth::user()->id ==$bar->user->id)
        <form method='POST' action="{{route ('bars.delete',$bar->id) }}" onsubmit = "return confirmar ('Are you sure you would like to delete this bar?','Notification');">
            @csrf
        <button type = "submit" class="btn btn-primary">Delete</button>
        </form>

        <a href="{{route('bars.edit',$bar->id)}}" class="btn btn-primary">Edit</a>
        @endif
        @endauth
        <a href="{{route('bars.index')}}" class="btn btn-primary">Return</a>

        </div>
@endsection
