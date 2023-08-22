<div class=row>
    @foreach ($bares as $key => $bar)
    <div class="col-3 py-2 d-flex align-items-stretch">
    <div class="card" style="width: 18rem;">
    @if(isset($bar ->image) && ($bar->image != ''))
        <img src="{{$bar->image}}" class="card-img-top" alt="{{$bar->name}}">
    @else
        <img src="{{asset('img/wineinline.jpg')}}" class="card-img-top" alt="{{$bar->name}}">
    @endif
        <div class="card-body">
            <h5 class="card-title">{{$bar->name}}</h5>
            <p class="card-text">{{$bar->description}}</p>

            <a href="{{route('bars.show',$bar->id)}}" class="btn btn-primary">Go to bar</a>
        </div>
    </div>
    </div>
    @endforeach
    </div>
