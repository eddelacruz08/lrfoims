
function cartRetrieve(){
	var element = $('#customer-order-cart-list-data');
	$.ajax({
	  url: "/cart/customer-order-cart-list-data",
	  type: 'GET',
	  data: {},
	  success: function (html) {
		element.html(html);
	  },
	  error: function (xhr, ajaxOptions, thrownError) {
		console.log(xhr.responseText);
		console.log(thrownError);
	  }
	});
}
cartRetrieve();

function addCodeCouponDiscount(route, orderId){
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
						cartRetrieve();
						alert_no_flash(response.status_text, response.status_icon);
					}else{
						cartRetrieve();
						alert_no_flash(response.status_text, response.status_icon);
					}
				}
			});
		}
	});
}

function checkout(route, orderId){
	var payment_method_id = document.getElementById('payment_method').value;
	var order_type = document.getElementById('order_type').value;
	var order_user_discount_id = 0;
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
			if (payment_method_id == '' || order_type == '') { 
				if(payment_method_id == ''){
					$('#payment_method').addClass('is-invalid');
					$('#error_payment_method').style.display = 'block';
				}else{
					$('#payment_method').addClass('is-valid');
					$('#error_payment_method').style.display = 'none';
				}
				if(order_type == ''){
					$('#order_type').addClass('is-invalid');
					$('#error_order_type').style.display = 'block';
				}else{
					$('#order_type').addClass('is-valid');
					$('#error_order_type').style.display = 'none';
				}
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
						cartRetrieve();
						alert_no_flash(response.status_text, response.status_icon);
					}else{
						cartRetrieve();
						alert_no_flash(response.status_text, response.status_icon);
					}
				}
			});
		}
	});
}

function plusAndMinusCartQuantity(route, cartId, minusOrPlus, quantity, menuId){
	$.ajax({
		url: route,
		type: "POST",
		data:{
			operation: minusOrPlus,
			quantity: quantity,
			cart_id: cartId,
			menu_id: menuId,
		},
		cache: false,
		success: function (response) {
			if(response.status_icon === "success"){
				cartRetrieve();
				alert_no_flash(response.status_text, response.status_icon);
			}else{
				cartRetrieve();
				alert_no_flash(response.status_text, response.status_icon);
			}
		}
	});
}

function addToCartCustomerMenu(route, menuId){
  var quantity = 1;
  $.ajax({
    type: "POST",
    url: route,
    data: {
      menu_id: menuId,
      quantity: quantity
    },
    cache: false,
    success: function (response) {
      if(response.status_icon == 'success'){
        alert_no_flash(response.status_text, response.status_icon);
      }else{
        alert_no_flash(response.status_text, response.status_icon);
      }
    }
  });
}

function alert_no_flash(message, status_icon){
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
		  toast.addEventListener('mouseenter', Swal.stopTimer)
		  toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	  })
	  
	  Toast.fire({ 
		icon: status_icon,
		title: message
	  })
}
