
@extends('layout.layout')

@section('title','Nuevo bar')

@section('content')
<h1>New bar</h1>

        <x-msg-error :errors="$errors"/>
        <x-message code="{{Session ::get ('code')}}" message="{{Session::get('message')}}"/>
        <div class=row>
        <form method = "POST" action = "{{route('bars.store')}}"enctype="multipart/form-data">
            <!-- csrf es una validacion de seguriad. Viene dentro de laravel ya creada-->
            @csrf 
  <div class="mb-3">
  <label for="name" class="form-label">Bar Name</label>
    <input class="form-control" id="name" name="name" value= "{{old('name')}}" aria-describedby="nameHelp">
    <div id="namelHelp" class="form-text">What is your bar called?</div>
  </div>
    


  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description" value= "{{old('description')}}"></textarea> 
    <div id="descriptionHelp" class="form-text">Describe your bar in a few words.Try to be as original as possible so you can stand out!</div>
  </div>
  <div class="mb-3">
  <label for="image" class="form-label"></label>
  <input class="image" type="file" id="image">
  <div id="imageHelp" class="form-text">Upload your picture here</div>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection