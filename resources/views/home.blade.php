@extends('app')

@section('container')
<h1>Home</h1>
<div class="d-flex">
    @foreach($items as $item)
    <div class="card me-2 ms-2" style="width: 18rem;">
      <img src="{{{asset('images/'.$item->images)}}}" class="card-img-top" alt="...">
      <div class="card-body">
        <!-- <h5 class="card-title">{{$item->images}}</h5> -->
        <h5 class="card-title">{{$item->name}}</h5>
        <h5 class="card-title">{{$item->price}}</h5>
        <p class="card-text">{{$item->description}}</p>
        <a href="items/{{$item->id}}" class="btn btn-primary">Details</a>
      </div>
    </div>
    @endforeach

</div>
@endsection