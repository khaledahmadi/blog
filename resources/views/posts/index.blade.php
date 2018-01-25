@extends('pages.base')
@section('title','| All Posts')


@section('content')
<!-- session display message -->
		@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@elseif(Session::has('danger'))
			<div class="alert alert-danger">
			  <strong>Danger!</strong> {{Session::get('danger')}}
			</div>
		@endif
<div class="row">
	<div class="col-md-11">
		<h1>All Posts</h1>
	</div>
	
	<div class="col-md-1">
		<!--{!! Html::linkRoute('posts.create','Create New', array(), array('class' => 'btn btn-primary'))!!} -->
		<a href="{{route('posts.create')}}" class="btn btn-primary btn-h1-spacing">New Post</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>No</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th>Action</th>
			</thead>
			
			<tbody>
				@foreach($posts as $post)
				<tr>
				<th>{{$post->id}}</th>
				<td>{{$post->title}}</td>
				<td>{{substr(strip_tags($post->body),0,50)}}{{strlen(strip_tags($post->body)) > 50 ? "...." : ""}}</td>
				<td>{{$post->created_at}}</td>
				<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-primary btn-sm">View</a> <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm">Edit</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- Generate links for pagination -->
		<div class="text-center">
			{!! $posts->links() !!}
		</div>
	</div>
</div>

@endsection