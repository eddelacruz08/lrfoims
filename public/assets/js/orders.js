$(document).ready(function () {
  // $('.table').DataTable();

  $(".orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/r',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});
