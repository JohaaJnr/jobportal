<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')


        @if(session()->has('msg'))
        <div class="col-md-6 m-auto">
            <div class="alert alert-success mx-5 mt-2 ">
              {{ session()->get('msg') }}
            </div>
        </div>

        @endif


		<div class="col-md-10 m-auto">
			<div class="h-100 p-5 mt-3 bg-light border rounded-3">
				<h2>Post a Job OR Create your CV</h2>
				<p>The best online Jobs and CV Portal</p>
				<button class="btn btn-outline-secondary" type="button">Build Your Resume</button>
			  </div>
		  </div>


		  <div class="container">
			<div class="col-md-12 mt-4 py-2 m-auto">
			  <div class="row">
		<aside class="col-md-3">
			  
		  <div class="card">
			<article class="filter-group">
			  <header class="card-header">
				<h6 class="title">Search Jobs</h6>
			  </header>
			  <div class="filter-content collapse show" id="collapse_1" style="">
				<div class="card-body">
				  <form class="pb-3">
				  <div class="input-group ">
					<input type="text" class="form-control" placeholder="Search">
				   
					<div class="input-group-append">
					  <button class="btn btn-light mx-2" type="button"><i class="bi bi-search"></i></button>
					</div>
				  </div>
				  </form>
				  
				
		  
				</div> <!-- card-body.// -->
			  </div>
			</article> <!-- filter-group  .// -->
			<article class="filter-group ">
			  <header class="card-header">
				<h6 class="title">Categories</h6>
			  </header>
			  <div class="filter-content collapse show" id="collapse_2" style="">
				<div class="card-body">
					<div class="tree ">
						<ul style="padding-left: 0">
					
							<li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="/" aria-expanded="true"
										aria-controls="Web"><i class="collapsed"><i class="fas fa-folder"></i></i>
										<i class="expanded"><i class="far fa-folder-open"></i></i> All</a></span>
								<div id="Web" class="collapse show">
									<ul>
											@foreach ($categories as $cat)
											<li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="/categories/{{ $cat->category_name }}"
												aria-expanded="false" aria-controls="page1"><i class="collapsed"><i
													class="fas fa-folder"></i></i>
												<i class="expanded"><i class="far fa-folder-open"></i></i>{{ $cat->category_name }}</a>({{ count($cat->jobs) }})</span>
																	
											</li>
											@endforeach
									</ul>
								</div>
							</li>
						</ul>
					
					</div>
					
				
				  
				  
			</div> <!-- card-body.// -->
			  </div>
			</article> <!-- filter-group .// -->
		   
		  </div> <!-- card.// -->
		  
		</aside>
			<main class="col-md-9">
		  
		  <header class="border-bottom mb-4 pb-3">
			  <div class="form-inline">
				<span class="mr-md-auto">{{ count($jobs) }} Items found </span>
				<select class="mr-2 form-control">
				  <option>Latest items</option>
				  <option>Trending</option>
				  <option>Most Popular</option>
				  <option>Cheapest</option>
				</select>
			  
			  </div>
		  </header><!-- sect-heading -->
		  
		  <div class="row">
			
			@if(count($jobs) > 0)
					@foreach ($jobs as $job)
					<div class="col-md-6">
					
					<div class="job-card" style="border-radius: 8%">
						<div class="job-card__content p-1">
							<div class="job-card_img">
								<img src="{{ asset('storage/'. $job->job_image) }}" alt="Company Logo">
							</div>
							<div class="job-card_info">
								<h6 class="text-muted">
									<a href="#!" class="job-card_company">{{ $job->company_name }}</a> 
									<a href="#!" class="float-right">
										<i class="fa fa-heart-o"></i>
									</a>
								</h6>
								<h4>{{ $job->job_title }}</h4>
								<small class="job-label">{{ $job->job_meta }}</small>
								<p class="mt-3 mb-0">{{ $job->job_salary }}</p>
							</div>
						</div>
						<div class="job-card__footer">
							<div class="job-card_job-type">
								<span class="job-label">{{ $job->job_type }}</span>
								<span class="job-label">{{ $job->category->category_name }}</span>
								
							</div>
							<button class="btn btn-primary">Apply</button>
							
						</div>
						<div class="mt-3">
							@if (Auth::User() && Auth::User()->name == $job->user->name)
								<small class="mx-1 fw-light" >Posted by you</small>
							@else
								<small class="mx-1 fw-light" >Posted by {{ $job->user->name }}</small>
							@endif
						<small class="fw-light mx-1" style="float:right">Posted {{ $job->created_at->diffForHumans() }}</small>
						</div>
						
					</div>
					
					
				</div>
				
				@endforeach
			@else
				<div class="mx-auto py-3 text-center">No Post Found</div>
			@endif
			
			
		
		  </div> 
		  
		  
		  <nav class="mt-4" aria-label="Page navigation sample">
			<ul class="pagination">
			  <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
			  <li class="page-item active"><a class="page-link" href="#">1</a></li>
			  <li class="page-item"><a class="page-link" href="#">2</a></li>
			  <li class="page-item"><a class="page-link" href="#">3</a></li>
			  <li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		  </nav>
		  
			</main>
			</div>
			</div>
			
		  </div>


       

@endsection