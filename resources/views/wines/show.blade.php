@extends('layouts.layout')

@section('title', 'Ver wine')

@section('content')
    <h1 class="text-center">Show wine</h1>
    <div class="row d-flex justify-content-center">

        <div class="col-3 py-2 ">
            <div class="card" style="width: 18rem;">
                <img src="{{ $wine->image }}" class="card-img-top" alt="{{ $wine->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wine->name }}</h5>
                        <p class="card-text">{{ $wine->description }}</p>
                        <p class="card-text">
                            @foreach ($wine->bars as $bar)
                                <span class="badge text-bg-primary">
                                    <a href="{{ route('bars.show', $bar) }}" class="nav-link">{{ $bar->name }}</a></span>
                            @endforeach
                        </p>
                        <p class="card-text">{{ $wine->winery }}</p>
                        <p class="card-text">{{ $wine->price }} $</p>
                        @isset($rates)
                            <a href="javascript:verConversiones()" class='btn btn-primary' alt='Show rates'><i
                                    class="bi bi-caret-down-fill"></i></a>
                            <div id='divConversiones' style='display:none'>
                                @foreach ($rates as $key => $rate)
                                    <br>{{ $key . '' . $rate }}
                                @endforeach
                            </div>

                        @endisset


                        <p class="card-text">{{ $wine->vol }}% </p>



                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            @auth

                <form method='POST' action="{{ route('wine.destroy', $wine->id) }}"
                    onsubmit="return confirmar ('Are you sure you would like to delete this wine?','Notification');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>

                <a href="{{ route('wine.edit', $wine->id) }}" class="btn btn-primary">Edit</a>
            @endauth
            <a href="{{ route('wine.index') }}" class="btn btn-primary">Return</a>

        </div>
        <script>
            function verConversiones() {
                let obj = document.getElementById('divConversiones');
                if (obj) {
                    if (obj.style.display == 'none') {
                        obj.style.display = 'block';
                    } else {
                        obj.style.display = 'none';
                    }
                }
            }
        </script>
    @endsection
