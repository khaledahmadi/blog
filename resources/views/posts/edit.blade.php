@extends('pages.base')
@section('title','| View Post')

@section('content')
<div class="row">
<!-- Model Form Binding -->
	{!! Form::Model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => 'true']) !!}
	<div class="col-md-8">
	<!-- Session display message -->
		@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@endif
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',null,['class' => 'form-control input-lg', 'required' =>'']) }}
		
		{{ Form::label('slug','Slug') }}
		{{ Form::text('slug', null, ['class' => 'form-control', 'required' =>'']) }}
		
		{{ Form::label('category_id','Category') }} 
    	{{ Form::select('category_id', $cats, null, ['class' => 'form-control']) }}
    	
    	{{ Form::label('tags','Tag') }} 
    	{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
    	
    	{{ Form::label('image', 'Upload Image') }}
    	{{ Form::file('image', ['class' => 'form-control']) }}
		
		{{ Form::label('body','Body') }}
		{{ Form::textarea('body',null,['class' => 'form-control', 'required' =>'']) }}
	</div>
	
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M d,Y h:m A',strtotime($post->created_at)) }}</dd>
			</dl>
			
			<dl class="dl-horizontal">
				<dt>Updated At:</dt>
				<dd>{{ date('M d,Y h:m A',strtotime($post->updated_at)) }}</dd>
			</dl>
			
			<div class="row">
				<div class="col-md-6">
					{!! Html::linkRoute('posts.show', 'Concel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					<!--<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>-->
				</div>
				<div class="col-md-6">
					{{ Form::submit('Save Changes',array('class' => 'btn btn-success btn-block'))}}
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection