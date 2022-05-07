@extends('admin.admin')

@section('content')
<div class="container">
    @if(session()->has('delSucces'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('delSucces')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('editSucces'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('editSucces')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="text-center">Products</h1>
    <div class="d-flex justify-content-end">
        <a href="{{url('admin')}}/addProduct" class="btn btn-success me-5 ">Add Products</a>
    </div>
    <div class="d-flex flex-row flex-wrap bd-highlight mb-3 mt-2">
        @foreach($stuff as $item)
        <div class="card p-2 bd-highlight me-2 mb-3" style="width: 18rem;">
            <img src="{{{asset('images/'.$item->images)}}}" width="10rem" height="250rem" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">Rp.{{$item->price}}</p>
                <a href="/admin/editProduct/{{$item->id}}" class="btn btn-primary">Edit Produk</a>
                <a href="/admin/deleteProduct/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection