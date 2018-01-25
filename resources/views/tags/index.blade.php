@extends('pages.base')
@section('title', '| All Tags')


@section('content')
<div class="row">
	<div class="col-md-8">
	@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		
		@endif
	<h1>Tags</h1>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<th>{{ $tag->id }}</th>
					<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					<td>
						{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
						{{ Form::submit('Delete',['class' => 'btn btn-danger btn-xs']) }}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="col-md-4">
		<div class="well">
		{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
			<h1>New Tag</h1>
			{{ Form::label('name','Tag Name') }}
			{{ Form::text('name',null,['class' => 'form-control', 'required' =>'']) }}
			<br>
			{{ Form::submit('Add New Tag',['class' => 'btn btn-primary btn-block']) }}
		
		{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection