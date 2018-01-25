@extends('pages.base')
@section('title',"| $tag->name Tag")


@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Post</small></h1>
	</div>
	<div class="col-md-4">
		<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right">Edit</a>
	</div>
</div>

<div>
	<div class="col-md-15">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tag->posts as $post)
				<!--- display the tags of only posts which the users loged in -->
				@if($post->user == auth()->user())
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
						<span class="label label-default"> {{ $tag->name }}</span>
						@endforeach
					</td>
					<td>
						<a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-xs">View</a>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection