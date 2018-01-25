@extends('pages.base')
@section('title', '| Edit Tag')


@section('content')

@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@endif

{!! Form::model($tag ,['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
	{{ Form::label('name' , 'Title') }}
	{{ Form::text('name' , null,['class' => 'form-control']) }}
	<br>
	{{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
@endsection