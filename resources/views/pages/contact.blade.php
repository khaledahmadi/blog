@extends('pages.base')
@section('title','| Contact')


@section('content')
<br><br>

<div class="panel panel-primary">
	<div class="panel-heading">Contact Me</div>
	<div class="panel-body">
		<form class="form-group" action="{{ url('contact') }}" method="POST" data-parsley-validate >
			{{ csrf_field() }}
			<label for="email">Email</label>
			<input type="email" class="form-control" name='email' id='email' placeholder="Enter Your Email" required>
			<label for="subject">Subject</label>
			<input type="text" class="form-control" name='subject' id='subject' placeholder="Enter Your Subject" required minlength="5">
			<label for="msg">Message</label>
			<textarea class="form-control" name="msg" id='msg' placeholder="Type your Message here!!" required></textarea><br><br>
			<input type='submit' class="btn btn-success btn-lg" name="send" value="Send Message">
		</form>
	</div>
	<div class="panel-footer"></div>
</div>
@endsection