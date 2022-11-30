<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <title>Daily</title>
</head>
<body>
    @if(Auth::check())
    <nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"><b> My Todo's</b></a>
    <form class="d-flex" role="search">
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user "></i>  {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/todo/"><i class="fa-solid fa-house" style="color:#6291a1;"></i> Home</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket" style="color:#6291a1;" ></i> Log Out</a></li>
          </ul>
        </li>
    
          
    </form>
  </div>
</nav>







<!-- <nav class="navbar fixed-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Daily</a>
    
    
    <div>
    <p>{{Auth::user()->name}}</p>
    
    <a href="/logout" class="btn btn-class">Log Out</a>
    </div>
  </div>
</nav> -->
@endif
<!-- <nav class="navbar fixed-top bg-light">
<div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form class="d-flex" role="search">
      <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav> -->
<br>


    @yield('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>