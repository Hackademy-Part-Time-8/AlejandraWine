
@extends('layouts.layout')
@section('title','Contacto')
@section('content')

<h1>Contacto</h1>


        <x-message code="{{Session ::get ('code')}}" message="{{Session::get('message')}}"/>
        <div class=row>
        <form method = "POST" action = "">
            <!-- csrf es una validacion de seguriad. Viene dentro de laravel ya creada-->
            @csrf
  <div class="mb-3">
  <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control" id="name" name="name" aria-describedby="nameHelp">
    <div id="namelHelp" class="form-text">What would you like us to call you?</div>
  </div>
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


  <div class="mb-3">
    <label for="Message" class="form-label">Your message</label>
    <textarea name="message" type="message" class="form-control" id="message"></textarea>
    <div id="messageHelp" class="form-text">What would you like to tell us?</div>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="check" name = "check">
    <label class="form-check-label" for="exampleCheck1">"I agree to the terms and conditions."</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
