
$( document ).ready(function() {

  $.ajax({
    url: "/role-options",
    type: "GET",
    data: {
    },
    cache: false,
    success: function(response){
      $("#role").html(response);
      $("#editRole").html(response);
    }
  });

  $('#new-user-submit-btn').on('click', function(event) {

    $('#new-user-form').validate({
  
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
        password: {
          required: true,
        },
        confirmPassword: {
          required: true,
          equalTo: "#password",
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
        password: {
          required: "Password is required",
        },
        confirmPassword: {
          required: "Password confirmation is required",
          equalTo: "Passwords should be same",
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

  $('#email').on('change', function() {
    $('#email-exists').css('display', 'none');
  });

  $('#new-user-form').on('change', function() {
    $('#unexpected-error').css('display', 'none');
  });

  $('#new-user-form').on('submit', function(event) {
    event.preventDefault();
    var csrfToken = $("input[name=_token]").val();
    var name = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();
    var address = $("#address").val();
    var role = $("#role").val();
    var isvalid = $("#new-user-form").valid();

    if(name && email && password && confirmPassword && address && role && password==confirmPassword && isvalid) 
    {
      $.ajax({
        async: false,
        url: "/users",
        type: "POST",
        data: {
            _token: csrfToken,
            name: name,
            email: email,
            password: password,
            confirmPassword: confirmPassword,
            address: address,
            role: role,
        },
        cache: false,
        success: function(response){
          var newUserId = response;
          fetchAllUsers();
          $('#user-added-alert').html(`
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>User Added Successfully!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>`);
        },
        error: function(res, status, error) {
          var response_text = JSON.parse(res.responseText);
          var errors = response_text.errors;
          if(errors.hasOwnProperty('email')) {
            $("#email-exists").html(errors.email[0]);
            $("#email-exists").css("display", "block");
            $('html, body').animate({
              scrollTop: $("#email").offset().top
            }, 300);
          }
          else {
            $("#unexpected-error").html("<p>Unexpected Error!<p>");
            $("#unexpected-error").css("display", "block");
          }
        }
      });
    }
    
  });

});