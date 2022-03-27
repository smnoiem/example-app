<form action="" id="new-user-form">
  @csrf
  <div class="form-group">
    <label for="username">*Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="email">*Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">*Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="confirmPassword">*Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Confirm password" id="confirmPassword" name="confirmPassword">
  </div>
  <div class="form-group">
    <label for="address">*Address:</label>
    <input type="text" class="form-control" placeholder="Enter address" id="address" name="address">
  </div>
  <div class="form-group">
    <label for="role">*Role:</label>
    <select class="form-control" id="role" name="role">
      <option selected value="" disabled>Select</option>
      <option value="admin">Admin</option>
      <option value="manager">Manager</option>
      <option value="customer">Customer</option>
  </select>
  </div>
  <button type="submit" class="btn btn-primary" id="new-user-submit">Submit</button>
</form>
