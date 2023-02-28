
$(document).ready(function () {
  $('.table').DataTable();

  $(".permissions-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/roles-permissions/r',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});
