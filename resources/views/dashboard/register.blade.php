@extends('layout')


@section('content')

@if ($errors->any())
   
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
    <div class="container">
        <div class="row contents">
            <div class="col-md-6 mb-3">
               <center> <img height="350" src="{{asset('assets/img/register.png')}}"  alt="ini halaman login">
               </center>
            </div>
            <div class="col-md-6">
               <center><h3 class="signin-text mb-4">Sign Up</h3></center>
               <form action="{{route('register.post')}}" method="POST">
               @method('POST')
               @csrf
                <div class="form-group mb-1">
                    <label  for=" ">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan nama anda">
                </div>
                <div class="form-group mb-1">
                    <label for=" ">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                </div>
                <div class="form-group mb-1">
                    <label for="email ">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                </div>
                <div class="form-group mb-1">
                    <label for="password " >Password</label>
                    <input type="password" name="password" class="form-control mb-4" placeholder="Masukan Password">
                </div>
                <div class="d-flex justify-content"> 
                    <!-- bettwen untuk buttonnya ke kanan -->
                    
                    
                    <button type="submit" class="btn btn-class">Sign Up</button>
                    
                </div>
                 
                    
               </form>
               <div class="sign-up">
                    <center>Have an account?<a href="/" > Login</a></center>
                </div>
            </div>
        </div>
    </div>
    

