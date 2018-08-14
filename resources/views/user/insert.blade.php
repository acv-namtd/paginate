@extends("layout.index")
@section("content")
<div class="col-lg-8">
	<div class="card">
	  <div class="card-header">New User</div>
	  <div class="card-body card-block">
	  	<form action="" method="POST">
	  		<input type="hidden" name="_token" value="{{csrf_token()}}">
		    <div class="form-group">
		        <div class="input-group">
		          <div class="input-group-addon"><i class="fa fa-user"></i></div>
		          <input type="text" id="name" name="name" placeholder="Name" class="form-control">
		        </div>
		    </div>
	      	<div class="form-group">
		        <div class="input-group">
		          <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
		          <input type="email" name="email" id="email" placeholder="Email" class="form-control">
		        </div>
	      	</div>
	      	<div class="form-group">
		        <div class="input-group">
		          <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
		          <input type="text" name="address" id="address" placeholder="Address" class="form-control">
		        </div>
	        </div>
		    <div class="form-actions form-group pull-right">
		      	<button type="submit" class="btn btn-success btn-sm">Add</button>
		    </div>
		</form>
	  	</div>
	</div>
</div>
@endsection