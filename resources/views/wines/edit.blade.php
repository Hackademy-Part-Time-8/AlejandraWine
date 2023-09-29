@extends('layouts.layout')

@section('title','New wine')

@section('content')
<h1>New Wine</h1>

        <x-msg-error :errors="$errors"/>
        <x-message code="{{Session ::get ('code')}}" message="{{Session::get('message')}}"/>
        <div class=row>
        <form method = "POST" action = "{{route('wine.update',$wine)}}"enctype="multipart/form-data">
            <!-- csrf es una validacion de seguriad. Viene dentro de laravel ya creada-->
            @method('PUT')
            @csrf
  <div class="mb-3">
  <label for="name" class="form-label">Name</label>
    <input class="form-control" id="name" name="name" value= "{{$wine->name}}" aria-describedby="nameHelp">
    <div id="namelHelp" class="form-text">What is your wine called?</div>
  </div>



  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description">{{$wine->description}}</textarea>
    <div id="descriptionHelp" class="form-text">Describe your wine in a few words.Try to be as original as possible so you can stand out!</div>
  </div>
  <div class="mb-3 d-flex row">
    <label for="bars" class="form-label">Where to find it</label>
    @foreach ($bars as $bar)
    <div class="form-check col">
        <input class="form-check-input" type="checkbox" value="{{$bar->id}}" id="bar_{{$bar->id}}" name="bars[]"
        {{(($wine->bars->find($bar->id))?'checked':'')}} >
        <label class="form-check-label" for="bar_{{$bar->id}}">
            {{$bar->name}}
        </label>
    </div>
    @endforeach
</div>
  <div class="mb-3">
    <label for="winery" class="form-label">Winery</label>
      <input class="form-control" id="winery" name="winery" value= "{{$wine->winery}}" aria-describedby="wineryHelp">
      <div id="winery Help" class="form-text">What is your winery?</div>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
          <input class="form-control" id="price" name="price" value= "{{$wine->price}}" aria-describedby="priceHelp">
          <div id="pricelHelp" class="form-text">What is the price?</div>
        </div>
        <div class="mb-3">
            <label for="vol" class="form-label">Vol</label>
              <input class="form-control" id="vol" name="vol" value= "{{$wine->vol}}" aria-describedby="volHelp">
              <div id="vollHelp" class="form-text">What is the vol?</div>
            </div>


  <button type="submit" class="botones">Submit</button>
</form>
@endsection
