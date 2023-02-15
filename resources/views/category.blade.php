@extends('layouts.app')

@section('content')
<div class="container">
            @if(session()->has('msg'))
            <div class="col-md-6 m-auto">
                <div class="alert alert-success mx-5 mt-2 ">
                {{ session()->get('msg') }}
                </div>
            </div>

            @endif
        @if ($errors->any())
        <div class="alert alert-danger mx-5 mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-6 mt-4 m-auto">
        <h2>Create a new category</h2>
        <form class="input-group py-2 mt-3" action="{{ route('newcategory') }}" method="POST">
            @csrf   
           <div class="d-flex">
                <input type="text" name="category" class="form-control mx-2" placeholder="Category name" required>
                <button type="submit" class="btn btn-primary py-2 mx-2">Create</button>
           </div>
       
           
        </form>
    </div>
</div>
    
@endsection