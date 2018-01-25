@extends('pages.base')
@section('title', '| All Categories')


@section('content')
<div class="row">
	<div class="col-md-8">
	@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		
		@endif
	<h1>Categories</h1>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<th>{{ $category->id }}</th>
					<td>{{ $category->name }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="col-md-4">
		<div class="well">
		{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
			<h1>New Category</h1>
			{{ Form::label('name','Category Name') }}
			{{ Form::text('name',null,['class' => 'form-control', 'required' =>'']) }}
			<br>
			{{ Form::submit('Add New Category',['class' => 'btn btn-primary btn-block']) }}
		
		{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection