@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Contact US</h2>
    </div>
</section>
<section class="main-section">
    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
	    		<div class="main-head2">
    				<h3>Contact Form</h3>
    			</div>
    			@if(session()->has('msg'))
    				@if(session()->get('msg')['type'] == 'success')
    					<div class="alert alert-success">{{ session()->get('msg')['text'] }}</div>
    				@endif
    				@if(session()->get('msg')['type'] == 'error')
    					<div class="alert alert-danger">{{ session()->get('msg')['text'] }}</div>
    				@endif	
    			@endif
		    	<div class="contact-form">
		    		<form action="{{ route('form_submit') }}" method="POST">
		    			@csrf
		    			<div class="row">
		    				<div class="col-md-6">
		    					<div class="form-group">
		    						<label for="fullname">Fullname</label>
		    						<input type="text" name="fullname" id="fullname" placeholder="Enter Your Fullname" class="form-control">
		    						@error('fullname')
		    							<div class="text-danger">{{ $message }}</div>
		    						@enderror
		    					</div>
		    				</div>
		    				<div class="col-md-6">
		    					<div class="form-group">
		    						<label for="email">Email</label>
		    						<input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control">
		    						@error('email')
		    							<div class="text-danger">{{ $message }}</div>
		    						@enderror
		    					</div>
		    				</div>
		    				<div class="col-md-12">
		    					<div class="form-group">
		    						<label for="subject">Subject</label>
		    						<input type="text" name="subject" id="subject" placeholder="Enter Subject" class="form-control">
		    						@error('subject')
		    							<div class="text-danger">{{ $message }}</div>
		    						@enderror
		    					</div>
		    				</div>
		    				<div class="col-md-12">
		    					<div class="form-group">
		    						<label for="message">Message</label>
		    						<textarea name="message" id="message" rows="5" class="form-control"></textarea>
		    						@error('message')
		    							<div class="text-danger">{{ $message }}</div>
		    						@enderror
		    					</div>
		    				</div>
		    				<div class="col-md-12">
		    					<button type="submit" class="btn btn-base">Submit</button>
		    				</div>
		    			</div>
		    		</form>
		    	</div>
    		</div>
    		<div class="col-md-4">
    			<div class="main-head2">
    				<h3>Contact Details</h3>
    			</div>
    			<div class="main-panel">
    				<ul class="list-unstyled">
					  	<li>
					  		<strong>Email: </strong>
					  		<span>info@th3rdplatoon.com</span>
					  	</li>
					  	<hr>
					  	<li>
					  		<strong>Call us on: </strong>
					  		<span>(616) 375 2513</span>
					  	</li>
					</ul>
    			</div>	
    		</div>
    	</div>
    </div>
</section>
@endsection
