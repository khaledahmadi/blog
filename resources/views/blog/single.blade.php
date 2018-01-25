@extends('pages.base')
<?php $titleTag= htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
	@endif
	
		<div class="thumbnail image-opacity">
			<img src="{{ asset('images/' . $post->image) }}">
		</div>
	
		<h1>{{$post->title}}</h1>
		<!--is used to convert the html tag into text-->
		<p> {!!$post->body!!} </p>
		<hr>
		<div class="">
			@foreach($post->tags as $tag)
			<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		
		<p class="pull-right">Posted In: {{ $post->category->name }}</p>
		</div>
	</div>
	<!--display comments-->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comment_title"><span class="fa fa-comments"></span> {{$post->comments->count()}} Comments</h3>
			@foreach($post->comments as $comment)
			
			<div class="media">
			  <div class="media-left">
			  	<img src="{{ "https://www.gravatar.com/avatar/". md5(strtoLower(trim($comment->email))). "?s=50&d=retro" }}" class="img-circle">
			  </div>
			  <div class="media-body">
				<h4 class="media-heading">{{$comment->name}}</h4>
				<div class="text-muted">{{$comment->created_at}}</div>
				<p>{!!$comment->comment!!}</p>
			  </div>
			</div>
			
			@endforeach
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				{!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('name' ,'Name') }}
							{{ Form::text('name', null, ['class' => 'form-control', 'required'=> '']) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('email' ,'Email') }}
							{{ Form::text('email', null, ['class' => 'form-control', 'required'=> '']) }}
						</div>
						<div class="col-md-12">
							{{ Form::label('comment' ,'Comment') }}
							{{ Form::textarea('comment',null, ['class' => 'form-control', 'rows'=>'7']) }}
							<br>
							{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection