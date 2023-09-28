@extends('layouts.layout')

@section('title', 'Listado de bares')

@section('content')


    @if (isset($user) && Auth::user() !== null && $user->id == Auth::user()->id)
        <h1>My contributions</h1>
    @else
        <h1>Our Bar Selection</h1>
        @isset($user)
            <h3>By {{ $user->name }} :</h3>
        @endisset
    @endif



    <x-message code="{{ Session::get('code') }}" message="{{ Session::get('message') }}" />

    <div class="container-index">
        <div class="container-cards-index">
            @foreach ($bares as $key => $bar)
            <div class="cards-index">
                <div class="img-card-index">
                    @if (isset($bar->image) && $bar->image != '')
                    <img src="{{ $bar->image }}" class="card-img-top" alt="{{ $bar->name }}">
                @else
                    <img src="{{ asset('img/wineinline.jpg') }}" class="card-img-top" alt="{{ $bar->name }}">
                @endif
                </div>
                <div class="info-card-index">
                    <h5>{{ $bar->name }}</h5>
                        <p>{{ $bar->description }}</p>
                        <a href="{{ route('bars.show', $bar->id) }}">Go to bar</a>
                        @isset($bar->user)
                            <br>
                            <small style="font-size: 0.5rem">Uploaded by:
                                <a href="{{ route('bars.proposals', $bar->user) }}">{{ $bar->user->name }}</a></small>
                            <br>
                        @endisset

                </div>
            </div>
            @endforeach
        </div>

        <div class="container-map-index">
            <div id="map" class="mapa-index"></div>
        </div>
    </div>
















    <div class="d-flex justify-content-center p-4">


        @auth <!--Esto lo mostrara solo a los usuarios registrados-->
            <a href="{{ route('bars.create') }}"class="btn btn-primary">Register your bar here!</a>
        @else
            <p>Only registered users can upload bars and see the whole collection
                <a href="{{ route('register') }}"> Register here now!</a>
            </p>


        @endauth
    </div>
    @if (method_exists($bares, 'getPageName'))
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ '?' . $bares->getPageName() . '=1' }}" rel="prev"
                        aria-label="Inicio">‹</a>
                </li>


                @for ($i = 1; $i <= $bares->lastPage(); $i++)
                    @if ($i == $bares->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ '?' . $bares->getPageName() . '=' . $i }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ '?' . $bares->getPageName () . '=' . $bares->lastPage()}}"rel="next"
                        aria-label="Ultimo">›</a>
                </li>
            </ul>
        </div>
    @endisset

    <script>
        var map = L.map('map').setView([40.4073813, -3.9], 6);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('Aqui estamos')
            .openPopup();
    </script>


@endsection
