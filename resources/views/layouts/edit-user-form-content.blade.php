<div class="edit-user-form-content">
  @csrf
  <input type="hidden" id="editUserId" name="userid">
  <div class="form-group">
    <label for="username">*Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="editUsername" name="username">
  </div>
  <div class="form-group">
    <label for="email">*Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="editEmail" name="email">
    <div id="edit-email-exists" class="error" for="editEmail" style="display: none;"></div>
  </div>
  <div class="form-group">
    <label for="address">*Address:</label>
    <input type="text" class="form-control" placeholder="Enter address" id="editAddress" name="address">
  </div>
  <div class="form-group">
    <label for="role">*Role:</label>
    <select class="form-control" id="editRole" name="role">
    </select>
  </div>
</div>