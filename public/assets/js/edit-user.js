
$( document ).ready(function() {

  $('#edit-user-submit-btn').on('click', function(event) {

    $('#edit-user-form').validate({
  
      rules: {
        username: {
          required: true,
          maxlength: 20,
        },
        email: {
          required: true,
          email: true,
          maxlength: 50,
        },
        address: {
          required: true,
          maxlength: 70,
        },
        role: {
          required: true,
        }
      },
      
      messages: {
        username: {
          required: "Name is required",
          maxlength: "Name cannot be longer than 20 characters",
        },
        email: {
          required: "Email is required",
          email: "Enter a valid email",
          maxlength: "Email cannot be longer than 50 characters",
        },
        address: {
          required: "Address is required",
          maxlength: "Address cannot be longer than 70 characters",
        },
        role: {
          required: "Role is required",
        }
      },
    
    });
  });

  // clearing error and other messages from the edit modal
  $('#exampleModalScrollable').on('hidden.bs.modal', function() {
    var $erroredForm = $('#edit-user-form');
    $erroredForm.validate().resetForm();
    $erroredForm.find('.error').removeClass('error');
    $("#unexpected-edit-error").css("display", "none");
    $("#edit-success-alert").css("display", "none");
    $("#edit-email-exists").css("display", "none");
  });

  $('#editEmail').on('change', function() {
    $('#edit-email-exists').css('display', 'none');
  });

  $('#edit-user-form').on('change', function() {
    $('#unexpected-edit-error').css('display', 'none');
  });

  $('#edit-user-form').on('submit', function(event) {
    event.preventDefault();
    
    var userId = $("#editUserId").val();
    var name = $("#editUsername").val();
    var email = $("#editEmail").val();
    var address = $("#editAddress").val();
    var role = $("#editRole").val();
    var isvalid = $("#edit-user-form").valid();

    if(userId && name && email && address && role && isvalid) 
    {
      $.ajax({
        async: false,
        url: `/users/${userId}`,
        type: "POST",
        data: {
            _method: "PUT",
            name: name,
            email: email,
            address: address,
            role: role,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function(response){

          if(response == "saved") {
            fetchAllUsers();
            $('#user-edited-alert').html(`
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="edit-success-alert">
              <strong>Changes Saved!</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
          }
            
        },
        error: function(response, status, error) {
          var response_text = JSON.parse(response.responseText);
          var errors = response_text.errors;
          if(errors.hasOwnProperty('email')) {
            $("#edit-email-exists").html(errors.email[0]);
            $("#edit-email-exists").addClass("error");
            $("#edit-email-exists").css("display", "block");
          }
          else {
            $("#unexpected-edit-error").html("<p>Unexpected Error!<p>");
            $("#unexpected-edit-error").addClass("error");
            $("#unexpected-edit-error").css("display", "block");
          }
        }
      });
    }
    
  });

});