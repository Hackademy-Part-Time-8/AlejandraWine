@extends('layouts.layout')

@section('title', 'Ver Bar')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <div class="container-show">
        <!-- Carusel Bar Images -->
        <div class="carousel-show">
            <div id="carouselImgs" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselImgs" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="{{ $bar->name }}"></button>
                    @foreach ($bar->images as $key => $image)
                        <button type="button" data-bs-target="#carouselImgs" data-bs-slide-to="{{ $key + 1 }}"
                            aria-label="{{ $bar->name }}"></button>
                    @endforeach
                    <button type="button" data-bs-target="#carouselImgs" data-bs-slide-to="2"
                        aria-label="{{ $bar->name }}"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img src="{{ $bar->image }}" class="d-block w-100" " alt="{{ $bar->name }}">
                    </div>
                    @foreach ($bar->images as $image)
                        <div class="carousel-item ">
                            <img src="{{ $image->image }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImgs"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImgs"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
        </div>

            <div class="description-map ">

                <div>
                    <h1 class="text-center">{{ $bar->name }}</h1>
                    <p class="text-center">{{ $bar->description }}
                    <p>
                        @isset($bar->user)
                            <small style="font-size: 0.5rem">Uploaded by: {{ $bar->user->name }}</small>
                        @endisset
                    <p>
                        @foreach ($bar->wines as $wine)
                            <span class="badge text-bg-primary">
                                <a href="{{ route('wine.show', $wine) }}" class="nav-link">{{ $wine->name }}</a></span>
                        @endforeach
                    </p>
                    <br>

                </div>
                <div id="map" class='map-show'>
                </div>
                <div class="button-container">
                    @auth
                        @if (isset($bar->user) && Auth::user()->id == $bar->user->id)
                            <form method='POST' action="{{ route('bars.delete', $bar->id) }}"
                                onsubmit="return confirmar ('Are you sure you would like to delete this bar?','Notification');">
                                @csrf
                                <button type="submit" class="botones">Delete</button>
                            </form>

                            <a href="{{ route('bars.edit', $bar->id) }}" class="botones">Edit</a>
                        @endif
                    @endauth
                    <a href="{{ route('bars.index') }}" class="botones">Return</a>
                </div>
            </div>
            <script>
                var map = L.map('map').setView([{{ $bar->latitude }}, {{ $bar->longitude }}], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.marker([{{ $bar->latitude }}, {{ $bar->longitude }}]).addTo(map)
                    .bindPopup('Aqui estamos')
                    .openPopup();
            </script>

        @endsection
