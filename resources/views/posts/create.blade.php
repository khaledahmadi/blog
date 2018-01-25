@extends('pages.base')
@section('title','| Create New Post')



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>
		<hr>
		
		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => 'ture' ]) !!}
    		{{ Form::label('title', 'Title', ['class' => 'awesome']) }}
    		{{ Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Enter The Title!','required' => '', 'maxlength'=>'255']) }}
    		
    		{{ Form::label('slug','Slug') }}
    		{{ Form::text('slug',null,['class' => 'form-control', 'placeholder' =>'Enter Slug', 'required' => '', 'minlength' => '5', 'maxlenght' => '255']) }}
    		
    		{{ Form::label('category','Category') }} 
    		<select class="form-control" name='category_id' required>
    		    @foreach($categories as $category)
    			<option value="{{$category->id}}">{{$category->name}}</option>
    			@endforeach
    		</select>
		
			{{ Form::label('tags','Tags') }}
		    <select class="form-control select2-multi" multiple="multiple" name="tags[]" required>
				@foreach($tags as $tag)
				<option value="{{$tag->id}}">{{$tag->name}}</option>
    			@endforeach
    		</select>
    		
    		{{ Form::label('image', 'Upload Image') }}
    		{{ Form::file('image', ['class' => 'form-control']) }}
    
    		{{ Form::label('body','Post Body') }}
    		{{ Form::textarea('body',null,['class' => 'form-control', 'placeholder' => 'Type Here!', 'required' => '']) }}<br>
    		
    		{!! app('captcha')->display(); !!}<br>
    		
    		{{ Form::submit('Create Post',['class' => 'btn btn-success btn-block'])}}
		{!! Form::close() !!}
	</div>
</div>
@endsection