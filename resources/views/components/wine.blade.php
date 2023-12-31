<div class="col-3 py-2 d-flex align-items-stretch">
    <div class="card" style="width: 18rem;">

    @if(isset($wine ->image) && ($wine->image != ''))
        <img src="{{$wine->image}}" class="card-img-top" alt="{{$wine->name}}">
    @else
        <img src="{{asset('img/wineinline.jpg')}}" class="card-img-top" alt="{{$wine->name}}">
    @endif
        <div class="card-body">
            <h5 class="card-title">{{$wine->name}}</h5>
            <p class="card-text text-truncate" style="height:3rem;">{{$wine->description}}</p>

            <a href="{{route('wine.show',$wine->id)}}" class="btn btn-primary">Go to wine</a>
        </div>
    </div>
    </div>
