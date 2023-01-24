function adminMenu(){
  var element = $('#admin-menu');
  $.ajax({
    url: "/orders/admin-menu/admin-menu-page-reload",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
      orderTypeMenuList();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.responseText);
      console.log(thrownError);
    }
  });
}

adminMenu();

function orderTypeMenuList(){
  var element = $('#menu-list-data');
  $.ajax({
    url: "/orders/admin-menu/order-menu-list-data",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // console.log(xhr.responseText);
      // console.log(thrownError);
    }
  });
}

orderTypeMenuList();

function cartRefreshAndCancelButtons(){
  var element = $('#cart-refresh-and-cancel-buttons');
  $.ajax({
    url: "/orders/admin-menu/cart-refresh-and-cancel-buttons",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
      // orderTypeMenuList();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // console.log(xhr.responseText);
      // console.log(thrownError);
    }
  });
}

setInterval(function(){
  cartRefreshAndCancelButtons();
}, 2000);

function displayCartListInfo(route, id){
  $(document).ready(function () {
    $(".cart-list-data").each(function () {
      var element = $(this);
      var spinner = '<div class="spinner-border text-center m-4" role="status">';
          spinner += '<span class="visually-hidden">Loading...</span>';
          spinner += '</div>';
        $.ajax({
          url: route,
          type: 'get',
          data: { id: id },
          beforeSend: function () {
            element.html(spinner);
          },
          success: function (html) {
            const el = document.getElementById('cart-display');
            el.style.display = 'none';
            element.html(html);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.responseText);
            console.log(thrownError);
          }
        });
    });
  });
}

function addToCartAdminMenu(route, menuId, orderId, url){
  var quantity = document.getElementById('quantity'+menuId).value;
  $.ajax({
    type: "POST",
    url: route,
    data: {
      order_id: orderId,
      menu_id: menuId,
      quantity: quantity
    },
    cache: false,
    success: function (response) {
      if(response.status_icon == 'success'){
        displayCartListInfo(url, orderId);
        orderTypeMenuList();
        alert_no_flash(response.status_text, response.status_icon);
      }else{
        displayCartListInfo(url, orderId);
        orderTypeMenuList();
        alert_no_flash(response.status_text, response.status_icon);
      }
    }
  });
}

function addCodeCouponDiscount(route, orderId, url){
  Swal.fire({
    title: 'Coupon Code',
    inputLabel: 'Enter a coupon code in this field.',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'on',
      min: 0,
      maxlength: 7
      },
    showCancelButton: true,
    inputPlaceholder: 'Enter code',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, apply code?',
    allowOutsideClick: false,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value == '') {
          resolve('Code field is required!')
        }else if(value.length === 7){
          resolve()
        } else{
          resolve('Please input code atleast 7 characters!')
        }
      })
    }
  }).then((result) => {
    const coupon_code = result.value
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: route,
        data: {
          order_id: orderId,
          coupon_code: coupon_code,
        },
        cache: false,
        success: function (response) {
          if(response.status_icon == 'success'){
            displayCartListInfo(url, orderId);
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }else{
            displayCartListInfo(url, orderId);
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }
        }
      });
		}
	});
}

function checkout(route, orderId, url){
  var payment_method_id = document.getElementById('payment_method').value;
  var order_type = document.getElementById('order_type').value;
  var order_user_discount_id = document.getElementById('order_user_discount_id').value;
  Swal.fire({
		title: 'Are you done?',
		text: "Please make sure your details are completed!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue!',
		allowOutsideClick: false,
	}).then((result) => {
		if (payment_method_id == '') { 
      $('#payment_method').addClass('is-invalid');
      $('#order_type').addClass('is-invalid');
      $('#error_payment_method').style.display = 'block';
      $('#error_order_type').style.display = 'block';
      Swal.showValidationMessage('Please complete all fields!')
    }else{
      $.ajax({
        type: "POST",
        url: route,
        data: {
          order_id: orderId,
          payment_method_id: payment_method_id,
          order_type: order_type,
          order_user_discount_id: order_user_discount_id,
        },
        cache: false,
        success: function (response) {
          if(response.status_icon == 'success'){
            adminMenu();
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }else{
            displayCartListInfo(url, orderId);
            alert_no_flash(response.status_text, response.status_icon);
          }
        }
      });
    }
  });
}

function cancelOrder(route, url, orderId){
  Swal.fire({
		title: 'Do you want to continue?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue!',
		allowOutsideClick: false,
	}).then((result) => {
      $.ajax({
        type: "POST",
        url: route,
        data: {
          order_id: orderId,
        },
        cache: false,
        success: function (response) {
          if(response.status_icon == 'success'){
            adminMenu();
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }else{
            displayCartListInfo(url, orderId);
            alert_no_flash(response.status_text, response.status_icon);
          }
        }
      });
  });
}

function refreshCartList(url, orderId){
  displayCartListInfo(url, orderId);
}
