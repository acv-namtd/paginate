<div class="col-lg-10">
	<div class="form-group">
		<label>Id</label>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input class="form-control" type="text" readonly name="id" value="{{$obj->id}}">
	</div>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{$obj->name}}">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" value="{{$obj->email}}">
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" class="form-control" name="address" value="{{$obj->address}}">
	</div>
</div>