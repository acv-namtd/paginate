<!-- The Modal -->
<form action="{{route('edit')}}" method="post">
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
        <div class="modal-body">
          <div class="col-lg-10">
            <div class="form-group">
              <label>Id</label>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input class="form-control" type="text" name="id" readonly id="id">
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
              <label>Active</label></br>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optradio" value="yes" id="yes">Có
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input radio" name="optradio" value="no" id="no">Không
                </label>
              </div>
            </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success modal-edit">Edit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
</form>