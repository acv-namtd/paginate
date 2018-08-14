<table class="table table-bordered table-hover table-striped" width="100%" id="dataTable">
	<thead class="bg-success">
		<th>
			<button class="round" id="check_all">
			All
			</button>
		</th>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Active</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		@foreach($arr as $obj)
		<tr>
			<td align="center"> 
				<input class="check" value="{{$obj->id}}" type="checkbox" name="xoa[]">
			</td>
			<td>{{$obj->id}}</td>
			<td>{{$obj->name}}</td>
			<td>{{$obj->email}}</td>
			<td>{{$obj->address}}</td>
			<td>
				@if($obj->is_active==1)
				Có
				@else 
				Không
				@endif
			</td>
			<td align="center">
				<button type="button" class="btn btn-primary edit round" data-toggle="modal" data-id="{{$obj->id}}" data-target="#myModal" data-key={{$key}}>
				  <i class="fa fa-pencil-square-o"></i>
				</button>
			</td>
			<td align="center"	>
				<a class="btn btn-danger round" href="delete?id={{$obj->id}}" onclick="return confirm('Are u sure?')">
					<i class="fa fa-trash-o"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot class="bg-success">
		<th>
			<button class="round" id="check_all">
			All
			</button>
		</th>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Active</th>
		<th>Edit</th>
		<th>Delete</th>
	</tfoot>
</table>
<div class="page">
	<span class="pull-right">
		@if(isset($key))
		<?php  
			echo $arr->appends(['key' => $key])->links()
		?>
		@else
			{!!$arr->links()!!}
		@endif
	</span>
</div>