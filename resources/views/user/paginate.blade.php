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