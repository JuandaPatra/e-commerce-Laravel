@extends('app')

@section('container')
<div class="card">
  <div class="card-body">
    <div class="text-center">
        <h1>Cart</h1>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Item</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach($find as $item)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$item->stuff->name}}</td>
      <td>{{$item->total}}</td>
      <td>{{$item->total_price}}</td>
      <td>
          <div class="flex">
              <!-- <a href="" class="btn btn-primary btn-sm">Edit</a> -->
              <form action="delete/{{$item->id}}" method="POST">
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
          </div>
      </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3">Total</td>
        <td>Rp. {{$order->total_price}}</td>
        <td>
        <form action="konfirmasi" method="POST">
                  @csrf
                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
              </form>
        </td>
    </tr>
  </tbody>
</table>
  </div>
</div>
@endsection