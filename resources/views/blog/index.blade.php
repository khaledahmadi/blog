@extends('pages.base')
@section('title','| All Blogs')


@section('content')
 <div class="container">
       	<div class="row">
       		<div class="col-md-12">
       			<h1>Blog</h1>
       		</div>
       	</div>
       	@foreach($posts as $post)
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div class="post">
        				<h2>{{$post->title}}</h2>
        				<h5>Published: {{date('M d, Y', strtotime($post->created_at))}} By: {{ $post->user->name }}</h5>
        				<p>{{substr(strip_tags($post->body),0,300)}}{{strlen(strip_tags($post->body)) >300 ? "...." : ""}}</p>
            			<a href="{{route('blog.single',$post->slug) }}">Read More</a>
        			</div><hr>
        		</div>
       	 </div>
        @endforeach
        
        <div class="text-center">
        	{{$posts->links()}}
        </div>
 </div>
@endsection