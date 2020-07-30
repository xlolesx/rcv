@if(session('success'))
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true" style="font-size:20px">×</span>
	  	</button>
	  {{session('success')}}
	</div>
@endif

@if(session('warning'))
	
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true" style="font-size:20px">×</span>
	  	</button>	
	  {{session('warning')}}
	</div>
@endif