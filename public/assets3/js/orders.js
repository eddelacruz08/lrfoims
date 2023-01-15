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

  setInterval(function(){
    $(".place-orders-d").load('/orders/place-orders').fadeIn('slow');
  },1000);

  $(() => { 
    $("#submitButton").click(function(ev) {
        var form = $("#formId");
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            cache: false,
            // success: function(data) {
                // alert("Success");
            // },
            // error: function(data) {
            //     alert("some Error");
            // }
        });
    });
  });
});

$(document).ready(function () {
  // $('.table').DataTable();

  function check(){
  $(".place-orders-data").each(function () {
    var element = $(this);
    var spinner = '<div class="spinner-border text-center m-4" role="status">';
        spinner += '<span class="visually-hidden">Loading...</span>';
        spinner += '</div>';
      $.ajax({
        url: '/orders/place-order',
        type: 'get',
        data: { id: $(this).attr("id") },
        beforeSend: function () {
          element.html(spinner);
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
}
setInterval(check,20000);
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
