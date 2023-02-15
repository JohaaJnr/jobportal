
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
    <div class="col-md-10 p-3 mt-4 m-auto">
        <h2>Post a job</h2>
        <form class="input-group py-2 mt-3" action="{{ route('newjob') }}" method="POST" enctype="multipart/form-data">
            @csrf   
           <div class="d-flex">
                <input type="text" name="title" class="form-control mx-2" placeholder="Job title" required>
                <input type="text" name="meta" class="form-control mx-2" placeholder="Job meta" >
           </div>
           <div class="custom-select d-flex mx-2 py-3">
                <select class="form-control" name="type" required>
                    <option value="" selected>-- Choose a Type --</option>
                    <option value="Full-Time">Full-Time</option>
                    <option value="Part-Time">Part-Time</option>
                    <option value="Contractual">Contractual</option>
                </select>
                <input type="email" class="form-control mx-2" name="email" placeholder="email" required>
                <select class="form-control" name="category" required>
                    <option value="none" selected>-- Choose a Category --</option>
                   @foreach ($categories as $cat)
                   <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                   @endforeach
                    
                </select>
               <div class="form-control mx-1" style="border: none">
                    <a href="/create/new" >+ Create a category</a>
               </div>
           </div>
           <div class="d-flex py-2">
                <input type="number" class="form-control mx-2" name="vacancy" placeholder="Vacancies" required>
                <input type="number" class="form-control mx-2" name="salary" placeholder="Salary" required>
                <input type="text" class="form-control mx-2" name="company" placeholder="Company Name" required>
           </div>
           <div class="d-flex py-3">
                <input type="text" class="form-control mx-2" name="address" placeholder="Office Address" required>
                <input type="file" class="form-control mx-2" name="img" placeholder="Upload images">
           </div>
           <div class="mx-2 py-3">
                <textarea name="description" class="form-control" id="" cols="100" rows="10" placeholder="Enter Job Description" required></textarea>
           </div>
           <button type="submit" class="btn btn-primary py-2 mx-2">Submit</button>
        </form>
    </div>
</div>
@endsection


