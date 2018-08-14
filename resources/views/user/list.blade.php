@push("css")
<style type="text/css">
.listUser{margin-right: auto; margin-left: auto; float: none !important; margin-top: 5%;
}

.round{border-radius: 10px;}

thead,tfoot{color: white}

#check_all{ width: 50px; height: 30px; background: #ffc107; color: white;}

.check{ width:20px; height: 30px;}

#delete_all{ display: none;}

.paginate{border-radius: 10px;}

.disabled{ border-radius: 10px;}

.search{ margin-bottom: 5px; height: 40px;}

.page{margin-top: 10px;}

th.sorting::before{ opacity: 0.7 !important; font-weight: bold;}

th.sorting::after{opacity: 0.7 !important; font-weight: bold;}

.pagination a{width:40px; text-align: center; font-weight: bold;}

.pagination .page-item.active{ font-weight: bold;}

.noti{display: none}

button.active{ background:#4EEF83 !important;border: #3EDB63; height: 38px; width: 38px;}
</style>
@endpush
@extends("layout.index")
@section("content")
	<!--Import modal-->
	@include("user.modal_edit")
	<!--End modal-->
	<div class="list">
		<div class="col-lg-11 listUser">
			@if(Session::has("success"))
            <div class="alert alert-success alert-dismissible fade-in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <b>{{session("success")}}</b>
            </div>
        	@endif
        	<div class="alert alert-success alert-dismissible fade-in noti">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <b class="noti-success"></b>
            </div>
	        <div class="search">
	        	<span class="pull-left">
	        		<button class="btn btn-danger round " id="delete_all">Delete</button>
	        	</span>
	    		<span class="pull-right">
	    			<span class="btn-sm btn-info round">Search:</span>
					<input type="text" class="key round" placeholder="Input key...">
	    		</span>
			</div>
			<div id="table-search">
			</div>
			<div class="page">
				<span class="pull-right">
					{!!$arr->links()!!}
				</span>
			</div>
		</div>
	</div>
@endsection
@push("js")
<script type="text/javascript">
	var $=jQuery.noConflict();
	var check = 0;
	var dem=0;
	//phân trang
	$(document).ready(function(){
		$.get("data",function(data){
			buildList(data.data,data.key);
			// buildPaginate(data.data,data.key);
			console.log(data.data);
			dataTable();
		});
	});
	$('body').on('click', '.page-link', function(e){
		var href = $(this).attr('href');
		var page = href.match(/page=([0-9]+)/)[1];
		var key = '';
		e.preventDefault();	
		if(href.includes("key")){
			key = href.match(/key=([a-zA-Z0-9]*)/)[1];
			if(!key){
				key = "";
			}
		}
		$.get("data",{page:page,key:key},function(data){
			buildList(data.data,data.key);
			// buildPaginate(data.data,data.key);
			dataTable();
		});
		$.get("paginate",{page:page,key:key},function(data){
			$(".page").html(data);
		});
	});
	//search
	$('body').on('keyup', '.key', function(e){
		var key = $(this).val();
		$.get("data",{key:key},function(data){
			buildList(data.data,data.key);
			// buildPaginate(data.data,data.key);
			dataTable();
		});
		$.get("paginate",{key:key},function(data){
			$(".page").html(data);
		});
	});
	//check all
	$('body').on('click', '#check_all', function(e){
		var checkboxes = document.getElementsByName('xoa[]');
		if(check%2==0){
	        // Lặp và thiết lập checked
	        for (var i = 0; i < checkboxes.length; i++){
	        	if(!checkboxes[i].checked){
	        		 checkboxes[i].checked = true;
	        		 dem++;
	        	}
	            //phải tăng biến đếm
	        }
	        $("#delete_all").css("display","block");
		}
		else{
            for (var i = 0; i < checkboxes.length; i++){
            	if(checkboxes[i].checked){
	        		 checkboxes[i].checked = false;
	        		 dem--;
	        	}
            }
            $("#delete_all").css("display","none");
		}
		check++;
	});
	//Show delete all
	$('body').on('click', '.check', function(e){
		if($(this).is(":checked")){
			dem++;
		}
		else{
			dem--;
		}
		if(dem>0){
			$("#delete_all").css("display","block");
		}
		else{
			$("#delete_all").css("display","none");
		}
	}); 
	//confirm delete
	$('body').on('click','.delete',function(e){
		if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
	});
	//delete all
	$('body').on('click', '#delete_all', function(e){
		var arr = [];
		var rows = 0;
		var checkboxes = document.getElementsByName('xoa[]');
		for (var i = 0; i < checkboxes.length; i++){
            if(checkboxes[i].checked){
            	arr.push(checkboxes[i].value);
            	rows ++;
            }
        }
        if(rows>0){
        	swal({
                  title: "Warning!",
                  text: "Do u want to delete all?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                  html : true
                }).then((willDelete) =>{
                if (willDelete) {
                swal({
                  title: "Done!",
                  text: "Users has been deleted",
                  icon: "success",
                  timer: 1300,
                  showCancelButton: true,
                  closeOnConfirm: false,
                })
                .then(function(){
                	$.get("delete_all",{arr:arr},function(data){
                		location.reload();
        			});
                });
            }});
        }	
	});
	//edit user
	$('body').on('click', '.edit', function(e){
		var id = $(this).data("id");
		var key = $(this).data("key");
		$.get("edit",{id:id},function(data){
			data = JSON.parse(data);
			$("#id").val(data.id);
			$("#name").val(data.name);
			$("#email").val(data.email);
			$("#address").val(data.address);
			$(".modal-edit").data("key",key);
			if(data.is_active===1){
				$("#yes").prop("checked",true);
			}
			else{
				$("#no").prop("checked",true);
			}
		});
	});
	$('body').on('click','.modal-edit',function(e){
		var key = $(this).data("key");
		if(key){
			e.preventDefault(); 
			$('#myModal').modal('hide')
			var id = $('#id').val();
			var name = $('#name').val();
			var email = $('#email').val();
			var address = $('#address').val();
			var active = $('input[name=optradio]:checked').val();
			$.ajax({
			    type: "POST",
			    url: 'edit',
			    data: { 
			    	id:id,name:name,email:email,
			    	address:address,active:active, 
			    	_token: '{{csrf_token()}}' 
					},
				success:function(data){
					$(".noti").css("display","block");
					$(".noti-success").html("Edit user success");
					$.get("data",{key:key},function(data){
						buildList(data.data,data.key);
						dataTable();
					});
					$.get("paginate",{key:key},function(data){
					});
				}
			});
		}
	});
	//function dataTable
	function dataTable()
	{
		$('#dataTable').DataTable({
				"info": false,
		        "paging" : false,
		        searching:false,
		        "order": [],
		        "columnDefs": 
		        [{ "orderable": false, "targets": [0,6,7] }]
		});
	}
	//function build list
	function buildList(data,key)
	{
		let output = `
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
		<tbody>`;
		data.data.forEach(function(obj) {
			  	output+=`
			<tr>
				<td align="center"> 
					<input class="check" value="${obj.id}" type="checkbox" name="xoa[]">
				</td>
				<td>${obj.id}</td>
				<td>${obj.name}</td>
				<td>${obj.email}</td>
				<td>${obj.address}</td>`;
				if(obj.is_active==1)
					output+=`<td>Có</td>`;
				else
					output+=`<td>Không</td>`;

				output+=`
				<td align="center">
					<button type="button" class="btn btn-primary edit round" data-toggle="modal" data-id="${obj.id}" data-target="#myModal" data-key=${key}>
					  <i class="fa fa-pencil-square-o"></i>
					</button>
				</td>
				<td align="center"	>
					<a class="btn btn-danger round delete" href="delete?id=${obj.id}">
						<i class="fa fa-trash-o"></i>
					</a>
				</td>
			</tr>`;
			});
		output+=`
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
		</table>`;
		document.getElementById('table-search').innerHTML = output;
	}
	//function build pagination
	function buildPaginate(page,key)
	{
		let output='';
		if(page.current_page==1){
		output+=`
			<button class='btn btn-primary paginate disabled'>
				<i class='fa fa-wheelchair'></i>
			</button>
			<button class='btn btn-primary paginate disabled'>
				<i class='fa fa-hand-o-left'></i>
			</button>`;
		}else{
			output+=`
			<button class='btn btn-primary paginate' data-page=${page.first_page_url}&key=${key}>
				<i class='fa fa-wheelchair'></i>
			</button>
			<button class='btn btn-primary paginate' data-page=${page.prev_page_url}&key=${key}>
				<i class='fa fa-hand-o-left'></i>
			</button>`;
		}
		for(var i=1;i<=page.last_page;i++)
		{
			if(i==page.current_page){
				output+=`
				<button class='btn btn-primary paginate active' data-page=${page.path}?page=${i}&key=${key}>
					${i}
				</button>`;
			}else{
				output+=`
				<button class='btn btn-primary paginate' data-page=${page.path}?page=${i}&key=${key}>
					${i}
				</button>`;
			}
		}
		if(page.current_page==page.last_page){
			output+=`
			<button class='btn btn-primary paginate disabled'>
				<i class='fa fa-hand-o-right'></i>
			</button>
			<button class='btn btn-primary paginate disabled'>
				<i class='fa fa-wheelchair'></i>
			</button>`;
		}else{
			output+=`
			<button class='btn btn-primary paginate' data-page=${page.next_page_url}&key=${key}>
				<i class='fa fa-hand-o-right'></i>
			</button>
			<button class='btn btn-primary paginate' data-page=${page.last_page_url}&key=${key}>
				<i class='fa fa-wheelchair'></i>
			</button>`;
		}
		document.getElementById('page').innerHTML = output;
	}
</script>
@endpush