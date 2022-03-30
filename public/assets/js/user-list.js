
function fetchAllUsers() 
{
  $('#datatable').DataTable().destroy();
  $("#user-list-tbody").empty();
  $.ajax({
    async: false,
    url: "/users",
    type: "GET",
    data: {
    },
    cache: false,
    success: function(response){
        $("#user-list-tbody").html(response);
        $("#datatable").DataTable({order:[], response: true});
        $("#datatable").DataTable().columns.adjust().responsive.recalc();
    }
  });
}
function deleteUser(userId) 
{
  $.ajax({
    url: "/users/" + userId,
    type: "POST",
    data: {
      _method: "DELETE",
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
        fetchAllUsers();
    },
    error: function(err) {
      console.log(err);
    }
  });
}

$( document ).ready(function() {

  $('#userlist').css('display', 'none');
  $('#user-list-btn').on('click', function() {
    $('#adduser').css('display', 'none');
    $('#userlist').css('display', 'block');
    fetchAllUsers();
  });
  $('#add-new-user-btn').on('click', function() {
    $('#adduser').css('display', 'block');
    $('#userlist').css('display', 'none');
  });

  $('#datatable tbody').on('click', '#delete-user-btn', function () {
    var data = $('#datatable').DataTable().row(this).data();
    var userId = data[0];
    deleteUser(userId);
  });

  $('#datatable tbody').on('click', '#edit-user-btn', function () {
    var data;
    try{
      data = $('#datatable').DataTable().row(this).data();
    }
    catch (e) { 
    }
    if(!data) {
      data = $('#datatable').DataTable().row( $(this).parents('tr') ).data();
    }
    console.log(data);
    $('#editUserId').val(data[0]);
    $('#editUsername').val(data[1]);
    $('#editEmail').val(data[2]);
    $('#editAddress').val(data[3]);
    $(`#editRole option:contains("${data[4]}")`).prop('selected', true);
    $("#exampleModalScrollable").modal('show');
  });

});