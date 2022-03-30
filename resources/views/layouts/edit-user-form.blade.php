<form action="" id="edit-user-form">
  @csrf
  <div class="form-group">
    <label for="username">*Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="edit-username" name="username">
  </div>
  <div class="form-group">
    <label for="email">*Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="edit-email" name="email">
    <div id="email-exists" class="error" for="email" style="display: none;"></div>
  </div>
  <div class="form-group">
    <label for="address">*Address:</label>
    <input type="text" class="form-control" placeholder="Enter address" id="edit-address" name="address">
  </div>
  <div class="form-group">
    <label for="role">*Role:</label>
    <select class="form-control" id="edit-role" name="role">
    </select>
  </div>
  <div id="unexpected-edit-error" class="error" style="display: none;"></div>
  <div id="user-edited-alert"></div>
</form>
