<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <title>Online Job Portal</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="navbar-collapse d-lg-flex collapse" id="navbarsExample11" style="">
            <a class="navbar-brand col-lg-3 me-0 px-4" href="#">Online Job Portal</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Resume Builder</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">My Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/post/jobs">Post a Job</a>
              </li>
              
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end px-4 ">
    
              @if (Auth::user())
                
                  <div class="navbar nav-item rounded-circle text-white px-4">{{ Auth::user()->name }}</div>
               
                     <span class="px-1"></span>
                     <a class="btn btn-primary" href="/logout">Logout</a>
              @else
                   <a class="btn btn-primary" href="/register">Signup</a>
                   <span class="px-1"></span>
                   <a class="btn btn-primary" href="/login">Login</a>
              @endif
             
                 
    
             
              
            </div>
          </div>
        </div>
      </nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>