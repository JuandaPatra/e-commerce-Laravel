@extends('app')

@section('container')
<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h1>Profile Page</h1>
        </div>
        <form action="profile-edit" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">My Profile</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                    </td>
                </tr>
                <tr>
                    <!-- <th scope="row">2</th> -->
                    <td>Email</td>
                    <td>:</td>
                    <td>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>
                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                    </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td>
                        <input type="number" class="form-control" name="phone_number" value="{{$user->phone_number}}">
                    </td>
                </tr>
                </tbody>
                
            </table>
           
            <button type="submit" class="btn btn-success btn-sm">Edit Profile</button>
          </form>
    </div>
</div>
@endsection