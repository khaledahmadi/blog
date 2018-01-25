@extends("pages.base")
@section('title','| Homepage')
 
 @section('content')
   		<div class="container">
   		@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@endif
		
			<div class="jumbotron text-center">
				<h1>Welcome To My Blog</h1>
				<p>Thanks for visting, this is my test website in laravel, please read my popular posts!</p>
				<a href="" class="btn btn-primary btn-lg">Popular Post</a>
			</div>
        </div>
        
        <div class="container">
        	<div class="row">
        		<div class="col-md-8">
        		@foreach($posts as $post)
        			<div class="post">
        				<h3>{{$post->title}}</h3>
        				<p>{{substr(strip_tags($post->body),0,300)}}{{strlen(strip_tags($post->body)) >300 ? "...." : ""}}</p>
            			<a href="{{route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
        			</div><hr>
        		@endforeach
        		</div>
        		<div class="col-md-3 col-md-offset-1">
        			<h2>Sidebar</h2>
        		</div>
        	</div>
        </div>
 @endsection
