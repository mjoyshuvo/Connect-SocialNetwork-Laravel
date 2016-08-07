@if (Session::has('info'))
	<div class="alert alert-info" role="alert">
		{{ Session::get('info') }}
	</div>
@endif

@if(Session::has('fail'))
	<section class="alert alert-danger" role="alert">
		{{Session::get('fail')}}
	</section>
@endif

@if(Session::has('success'))
	<section class="alert alert-success" role="alert">
		{{Session::get('success')}}
	</section>
@endif