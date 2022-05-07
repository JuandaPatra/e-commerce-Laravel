@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="text-center">Edit Product</h1>
        <div class="flex">
            <div>
                <img src="{{{asset('images/'.$stuff->images)}}}" class="card-img-top" alt="..." style="height: 200px;width:200px">
            </div>
            <div>
                <form method="POST" action="/admin/editProduct/{{$stuff->id}}" enctype="multipart/form-data">
                    @csrf
                
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{$stuff->name}}">

                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>
                                <input type="number" class="form-control" name="price" value="{{$stuff->price}}">

                            </td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            <td>
                            <input type="number" class="form-control" name="stock" value="{{$stuff->stock}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>
                            <input type="text" class="form-control" name="description" value="{{$stuff->description}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Gambar Produk</td>
                            <td>:</td>
                            <td>
                            <input class="form-control" type="file" id="formFile" name="images">
                            </td>
                        </tr>
                        <tr>
                            <!-- <td colspan="2">Buy</td> -->
                            <td>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection