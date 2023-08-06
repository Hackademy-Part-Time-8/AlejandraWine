@extends('layout.layout')

@section('title','Listado de bares')

@section('content')

        <h1>Our Bar Selection</h1>
        <x-message code="{{Session ::get ('code')}}" message="{{Session::get('message')}}"/>
        <div class=row>
        @foreach ($bares as $bar) 
        <div class="col-3 py-2 d-flex align-items-stretch">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$bar[1]}}</h5>
                <p class="card-text">{{$bar[2]}}</p>

                <a href="{{route('bars.show',$bar[0])}}" class="btn btn-primary">Go to bar</a>
            </div>
        </div>
        </div>
        @endforeach
        </div>

        @endsection