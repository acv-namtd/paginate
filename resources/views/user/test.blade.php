<div class="page pull-right">
			@if($page==1)
			<button class="btn btn-info disabled">
				<i class="fa fa-fast-backward "></i>
			</button>
			@else
			<button class="btn btn-info paginate" data-page=1>
				<i class="fa fa-fast-backward "></i>
			</button>
			@endif
			@for($i=1;$i<=$soPage;$i++)
				@if($i==$page)
					<button class="btn btn-info paginate active" data-page="{{$i}}">
						{{$i}}
					</button>
				@else
					<button class="btn btn-info paginate" data-page="{{$i}}">
						{{$i}}
					</button>
				@endif
			@endfor
			<button class="btn btn-info paginate" data-page="{{$soPage}}">
				<i class="fa fa-fast-forward"></i>
			</button>
		</div>