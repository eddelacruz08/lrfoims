$(document).ready(function () {
  // $('.table').DataTable();

  $(".orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/order',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        // console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

$(document).ready(function () {
  // $('.table').DataTable();

  $(".place-orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/place-order',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        // console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

$(document).ready(function () {
  // $('.table').DataTable();

  $(".serve-orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/serve-order',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        // console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

$(document).ready(function () {
  // $('.table').DataTable();

  $(".payment-orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/payment-order',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        // console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

$(document).ready(function () {
  // $('.table').DataTable();

  $(".payment-history-orders-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/orders/payment-history-order',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        // setInterval('location.reload()',2000);
        // console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

// $(document).ready(function () {
//   $('.menu-category-list-select').select2();
// });
