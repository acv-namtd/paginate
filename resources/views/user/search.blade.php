<div class="table-search">
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
			@if($soPage===0)
			<tr>
				<td colspan="8" align="center">
					Không có dữ liệu phù hợp với tìm kiếm, xin thử lại!	
				</td>
			</tr>
			@else
				@foreach($arrList as $obj)
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
						<button type="button" class="btn btn-primary edit round" data-toggle="modal" data-id="{{$obj->id}}" data-target="#myModal">
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
			@endif
		</tbody>
	</table>
	<div class="page pull-right">
		@if($page==1)
			<button class="btn btn-info disabled">
				<i class="fa fa-fast-backward "></i>
			</button>
		@else
			<button class="btn btn-info paginate" data-page="1" data-key={{$key}}>
				<i class="fa fa-fast-backward "></i>
			</button>
		@endif
		@for($i=1;$i<=$soPage;$i++)
			@if($i==$page)
				<button class="btn btn-info paginate active" data-page="{{$i}}" data-key={{$key}}>
					{{$i}}
				</button>
			@else
				<button class="btn btn-info paginate" data-page="{{$i}}" data-key={{$key}}>
					{{$i}}
				</button>
			@endif
		@endfor
		@if($page==$soPage)
			<button class="btn btn-info disabled">
				<i class="fa fa-fast-forward "></i>
			</button>
		@else
			<button class="btn btn-info paginate" data-page={{$soPage}} data-key={{$key}}>
				<i class="fa fa-fast-forward "></i>
			</button>
		@endif
	</div>
</div>