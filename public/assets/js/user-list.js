
$( document ).ready(function() {

  $.ajax({
    url: "/users",
    type: "GET",
    data: {
    },
    cache: false,
    success: function(response){
        $("#user-list-tbody").html(response);
        $("#my-datatable").DataTable();
    }
  });

});