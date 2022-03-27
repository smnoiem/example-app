
$( document ).ready(function() {

  $('#new-user-submit').on('click', function(event) {

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

  $('#new-user-form').on('submit', function(event) {
    event.preventDefault();
    var csrfToken = $("input[name=_token]").val();
    var name = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();
    var address = $("#address").val();
    var role = $("#role").val();

    if(name && email && password && confirmPassword && address && role && password==confirmPassword) 
    {
      //register through an ajax request
      //console.log(csrfToken);
      $.ajax({
        async: false,
        url: "/users",
        type: "POST",
        data: {
            _token: csrfToken,
            name: name,
        },
        cache: false,
        success: function(response){
          console.log(response);
        }
      });
    }
    
  });

});