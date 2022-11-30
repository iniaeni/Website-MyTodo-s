@extends('layout')

@section('content')


    <div class="container">
    <!-- @include('sweetalert::alert') -->
    
    @if (Session::get('success'))
    
    <div class="alert alert-success w-100">
        {{Session::get('success')}}

    </div>
    @endif
    
        
     @if (Session::get('fail'))
    
        <div class="alert alert-danger w-100">
            {{Session::get('fail')}}

        </div>
    @endif

    @if (Session::get('notAllowed'))
    
        <div class="alert alert-danger w-100">
            {{Session::get('notAllowed')}}

        </div>
    @endif

    

    @if ($errors->any())
   
        <div class="alert alert-success">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
    @endif
            <div class="row contents">
            <div class="col-md-6 mb-3">
               <center> <img height="350" src="{{asset('assets/img/login.png')}}"  alt="ini halaman login">
               </center>
            </div>

            <div class="col-md-6">
               <center><h3 class="signin-text mb-4">Login</h3></center>
               <form action="{{route('login.auth')}}" method="POST">
               @method('POST')
               @csrf
                <div class="form-group">
                    <label for="email ">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                </div><br>
                <div class="form-group">
                    <label for="password " >Password</label>
                    <input type="password" name="password" class="form-control mb-4" placeholder="Masukan Password">
                </div>
                <button type="submit" class="btn btn-class">Login</button>
                <div class="sign-up">
                    <center>Don't have an account?<a href="register" > Create account</a></center>
                </div>
               </form>
            </div>
        </div>
    </div>
    

