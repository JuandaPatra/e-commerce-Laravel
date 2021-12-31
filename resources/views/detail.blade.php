@extends('app')

@section('container')
<div class="card">
    <div class="card-body">
        <h1>{{$items->name}}</h1>
        <div class="flex">
            <div>
                <img src="{{{asset('images/'.$items->images)}}}" class="card-img-top" alt="..." style="height: 200px;width:200px">
            </div>
            <div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp.{{$items->price}}</td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            <td>{{$items->stock}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Buy</td>
                            <td>
                                <form  method="POST" action="{{$items->id}}">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="form-group me-2">
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Qty" name="order_total">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection