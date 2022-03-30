<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <form action="" id="edit-user-form" class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Edit User Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
            <div class="modal-body">
                @include('layouts.edit-user-form-content')
            </div>
            <div class="modal-footer">
                <div class="row col-md-12">
                    <div class="col-md-6" style="min-height: 65px">
                        <div id="unexpected-editError" class="error" style="display: none;"></div>
                        <div id="user-edited-alert"></div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit-user-submit-btn">Save changes</button>
                    </div>
                </div>
            </div>
      </form>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>