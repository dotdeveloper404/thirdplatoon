@extends('layouts.frontend.app')

@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Post Ads</h2>
    </div>
</section>
<section class="main-section">
	<div class="container">
		@if(session()->has('msg'))
			@if(session()->get('msg')['type'] == 'success')
				<div class="alert alert-success">{{ session()->get('msg')['text'] }}</div>
			@endif
			@if(session()->get('msg')['type'] == 'error')
				<div class="alert alert-danger">{{ session()->get('msg')['text'] }}</div>
			@endif
		@endif
		<div class="main-panel">
			<div class="mp-body">
				<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="title">Title <span class="text-danger">*</span></label>
								<input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" value="{{ old('title') }}">
								@error('title')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="category">Category <span class="text-danger">*</span></label>
								<select name="category" id="category" class="form-control">
									<option value="">Select Category</option>
									@if($categories->count())
										@foreach($categories as $category)
											<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ ucwords($category->title) }}</option>
										@endforeach
									@endif
								</select>
								@error('category')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="price">Price <span class="text-danger">*</span></label>
								<div class="input-group">
							      	<div class="input-group-addon">{{ currency_symbol() }}</div>
							      	<input type="text" name="price" id="price" placeholder="0.00" class="form-control" value="{{ old('price') }}">
							    </div>
						      	@error('price')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="image">Image <span class="text-danger">*</span></label>
								<input type="file" name="image" id="image" class="form-control">
								@error('image')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-base">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection