<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Online Job Portal | User login</title>
</head>
<body>
    <div class="container">
      @if(session()->has('msg'))
      <div class="col-md-6 m-auto">
          <div class="alert alert-success mx-2 mt-2 mb-2">
            {{ session()->get('msg') }}
          </div>
      </div>
   
      @endif
        <div class="card" style="width: 22rem;  height: 18rem; margin-left: auto; margin-right: auto; margin-top: 5rem;">
          @if ($errors->any())
    <div class="alert alert-danger ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-body text-center">
          <h3 class="card-title text-center py-2">{{ config('app.name', 'Online Job Portal')}} Registration</h3>
          <img src="{{ asset('/images/user.png') }}" class="card-img-top " style="height: 80px; width: 80px;" alt="...">
        </div>
        <form class="form-control p-4 m-auto" action="{{ route('signup') }}" method="POST">
          @csrf
            <div class="mb-2">
              <label for="exampleInputUsername" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputName" aria-describedby="username">
              
            </div>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
              <div class="col-md-8 mt-3 d-flex m-auto form-control" style="border: none">
                        Already have an account?&ensp;<a href="/login">Login</a>
                    </div>

          </form>
        
      </div> 
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>