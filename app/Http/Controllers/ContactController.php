<?php

namespace App\Http\Controllers;
use App\Mail\ContactNotification;
use Illuminate\Http\Request; ///peticion del navegador a un servidor
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    function create (){
        return view('contact');
    }
    function store(Request $request){
        $name = $request -> input ('name');
        $email = $request -> input ('email');
        $message = $request -> input ('message');

        //envia a esta direccion de correo:
        Mail ::to(env('MAIL_FROM_ADDRESS'))->send(new ContactNotification($name,$email,$message));
        return back()->with ('code','0')->with('message','Your message was sent succesfully');//si pusiera return a la home y el usuario sigue recardando enviaria el emial muchas veces sobrecargando por ende la web
    }
}
