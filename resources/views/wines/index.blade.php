@extends('layouts.layout')

@section('content')

<h1>Our wine Selection</h1>
<x-message code="{{Session ::get ('code')}}" message="{{Session::get('message')}}"/>
<div id="divScroll"class=row>
@foreach ($wines as $wine)
<x-wine :wine ='$wine'/>
@endforeach
</div>
<div class = "d-flex justify-content-center p-4">

@auth <!--Esto lo mostrara solo a los usuarios registrados-->
<a href="{{route('wine.create')}}"class="btn btn-primary">Register your wine here!</a>
@else
<p>Only registered users can upload wines
<a href="{{route('register')}}"> Register here now!</a>
</p>

@endauth
</div>
<a href="javascript:window.moreData()">Next Page</a>
<script>
    window.page = 1;
    window.finScroll = false;
    window.ajaxPdte = false;
    window.moreData = ( () => {
          if ((window.finScroll == false) && (window.ajaxPdte == false)){
              window.ajaxPdte = true;
              window.page++;
              urlScroll = '{{ route('wine.index')}}?page=' + window.page;

              $.ajax (
                {
                  url: urlScroll,
                  type: 'get'
                }
              ).done (function (data) {

                    if (data.scrollHTML == '') {
                      window.finScroll = true;
                    }
                    else {
                        $('#divScroll').append (data.scrollHTML);
                    }

                    window.ajaxPdte = false;
              })
              .fail (function (jqXHR, ajaxOption, thrownError) {
                  $('#divScroll').append ('<p class="text-danger">Ha ocurrido un error al cargar más vinos</p>');
                  window.ajaxPdte = false;
              });
          }

    });

    window.addEventListener ('scroll', function () {
        console.log ('pasa por listener');
        if ( ($(window).scrollTop + $(window).height ) >=
              ($('#divScroll').scrollTop +  $('#divScroll').height))  {
                console.log ('dentro del if');
                window.moreData()
        }
        console.log ('' + $(window).scrollTop + '-' + $(window).height + '-' + $('#divScroll').scrollTop + '-' + $('#divScroll').height)
    });
    </script>
@endsection


