@extends('admin.admin')

@section('content')

<div class="col-md-12">
  <h1 class="text-center">Add Product</h1>
  <form method="POST" action="{{url('admin')}}/addProduct" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">Add Product</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nama Produk</td>
              <td>:</td>
              <td>
              <input type="text" class="form-control"  placeholder="nama Produk" name="name">
              </td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td>
              <input type="number" class="form-control"  placeholder="Harga Produk" name="price">
              </td>
            </tr>
            <tr>
              <td>Stok Produk</td>
              <td>:</td>
              <td>
              <input type="number" class="form-control"  placeholder="Stok Produk" name="stock">
              </td>
            </tr>
            <tr>
              <td>Keterangan Produk</td>
              <td>:</td>
              <td>
              <!-- <input type="text" class="form-control"  placeholder="Deskripsi Produk" name="description"> -->
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Deskripsi Produk"></textarea>
              </td>
            </tr>
            <tr>
              <td>Gambar Produk</td>
              <td>:</td>
              <td>
              <input class="form-control" type="file" id="formFile" name="images">
              </td>
            </tr>
            
            
          </tbody>
        </table>
        <div class="d-flex">
          <button type="submit" class="btn btn-success">Tambah Produk</button>

        </div>
      </div>
    </div>

  </form>
</div>
@endsection