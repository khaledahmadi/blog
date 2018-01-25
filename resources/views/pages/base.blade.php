<!doctype html>
<html lang="{{ config('app.locale') }}"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   			
		<title>Laravel Blog @yield('title')</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
		{!! Html::style('css/app.css') !!}
		{!! Html::style('css/parsley.css') !!}
		{!! Html::style('css/style.css') !!}
		{!! Html::style('css/select2.min.css') !!}
   
   		<!--wysiwyn editor for application-->
   		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=i9hu96pfi2y8ytkjvjb7tosx9qnimv2wc7l51n83hsjzq56b"></script>
  		<script>tinymce.init({ selector:'textarea',
							  plugins: "lists link image code wordcount table searchreplace"
							 
				});
		</script>
   
    </head>
    <body>
   		@include('pages.navbar')
   		<div class="container">
   			@yield('content')
   		</div>
   		<hr>
   		<footer class="text-center">
   			<p>Copyright Khalid, All Rights Reserved</p>
   		</footer>
    
    	{!! Html::script('js/app.js') !!}
		{!! Html::script('js/parsley.min.js') !!}
		{!! Html::script('js/select2.min.js') !!}
		
		<script>
 		$('.select2-multi').select2();
		</script>
	</body>
</html>
