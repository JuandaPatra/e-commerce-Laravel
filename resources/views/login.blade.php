@extends('app')
@section('container')
                @if(session()->has('loginSuccess'))
                  <div class="alert alert-danger alert-dismissable fade show" role="alert">
                    {{session('loginSuccess')}}
                  </div>
                  @endif

    <h1 class="text-center">Login</h1>
    <main class="form-signin">
                <form action="/login" method="POST">
                  @csrf
                  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                  @if(session()->has('loginError'))
                  <div class="alert alert-danger alert-dismissable fade show" role="alert">
                    {{session('loginError')}}
                  </div>
                  @endif
              
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email"autofocus value="{{old('email')}}"> 
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
              
                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <a href="register">Register</a>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
              </main>
    
@endsection