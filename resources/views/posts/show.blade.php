@extends('pages.base')
@section('title','| View Post')

@section('content')
<div class="row">
	<div class="col-md-8">
	<!-- session display message -->
		@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@endif
	    <div class="thumbnail image-opacity">
		<img src="{{ asset('images/' . $post->image) }}">
		</div>
		<h1>{{$post->title}}</h1>
		<p>{!!$post->body!!}</p>
		<hr>
		<!--tag lists-->
		<div class="">
			@foreach($post->tags as $tag)
			<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>
		
		<!--comments lists-->
		<div style="margin-top: 50px;">
			<h3>{{$post->comments->count()}} Comments</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($post->comments as $comment)
					<tr>
						<td>{{$comment->name}}</td>
						<td>{{$comment->email}}</td>
						<td style="text-align:justify;">{!!$comment->comment!!}</td>
						<td>
							<a href="{{route('comments.edit', $comment->id)}}" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></a>
							{!! Form::open(['route' => ['comments.destroy',$comment->id], 'method' => 'DELETE']) !!}
							
							<button type="submit" class=" btn btn-danger btn-xs" style="margin-top: -47px; margin-left: 25px;"><span class="fa fa-trash"></span></button>
							
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>URL:</dt>
				<dd><a href="{{route('blog.single', $post->slug)}}"> {{route('blog.single', $post->slug)}} </a></dd>
			</dl>
			
			<dl class="dl-horizontal">
				<dt>Category:</dt>
				<dd>{{ $post->category->name }}</dd>
			</dl>
			
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
					{{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
					
					<!--<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>-->
				</div>
				<div class="col-md-6">
					{!! Form::open(['route' => ['posts.destroy',$post->id], 'method' => 'DELETE']) !!}
					{{ Form::submit('Delete',['class' => 'btn btn-danger btn-block']) }}
					{!! Form::close() !!}
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('posts.index')}}" class="btn btn-default btn-block"> << View All Posts </a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection