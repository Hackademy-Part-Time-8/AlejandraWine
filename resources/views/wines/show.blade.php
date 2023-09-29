@extends('layouts.layout')

@section('title', 'Ver wine')

@section('content')
    <div class="wine-show-container">
        <div class="wine-picture-container">
            <div id="imagenAleatoria"></div>
        </div>
        <div class="wine-description">
            <div class="wine-info-card">
                <div class="no-currency">
                    <h1>{{ $wine->name }}</h1>
                    <p>{{ $wine->description }}</p>
                    <p>
                        @foreach ($wine->bars as $bar)
                            <span class="badge text-bg-primary">
                                <a style="text-decoration: none" class='text-white 'href="{{ route('bars.show', $bar) }}">{{ $bar->name }}</a></span>
                        @endforeach
                    </p>

                    <p><span class="badge text-bg-primary">Winery</span> {{ $wine->winery }}</p>
                    <p><span class="badge text-bg-primary">Vol%</span> {{ $wine->vol }}% </p>
                </div>
                <div class="wine-buttons">
                    @auth

                        <form method='POST' action="{{ route('wine.destroy', $wine->id) }}"
                            onsubmit="return confirmar ('Are you sure you would like to delete this wine?','Notification');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="botones">Delete</button>
                        </form>

                        <a href="{{ route('wine.edit', $wine->id) }}" class="botones">Edit</a>
                    @endauth
                    <a href="{{ route('wine.index') }}" class="botones">Return</a>

                </div>
            </div>
            <div class="currency">
                <p><span class="badge text-bg-primary">Price</span> {{ $wine->price }} $</p>
                @isset($rates)
                    <a href="javascript:verConversiones()" alt='Show rates'><img src="/img/currency.svg" alt=""></a>
                    <div class="conversion"id='divConversiones' style='display:none;'>
                        @foreach ($rates as $key => $rate)
                            <br>{{ $key . '->' . $rate }}
                        @endforeach
                    </div>

                @endisset
            </div>
        </div>


    </div>


    <script>
        var imagenes = @json($imagenes);
console.log(imagenes)
        function mostrarImagenAleatoria() {
            var indiceAleatorio = Math.floor(Math.random() * imagenes.length);
            var imagenAleatoria = imagenes[indiceAleatorio];

            // Mostrar la imagen en el elemento con id "imagenAleatoria"
            document.getElementById('imagenAleatoria').innerHTML = '<img src="' + imagenAleatoria + '" alt="Imagen Aleatoria">';
        }

        mostrarImagenAleatoria(); // Mostrar una imagen aleatoria al cargar la página
    </script>
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
