function alert_error(message){
	Swal.fire(
		'Opps!',
		message,
		'error'
	  );
}

function alert_success(message){
	 Swal.fire(
	  'Success!',
	  message,
	  'success'
	);
}

function alert_warning(message){
	 Swal.fire(
	  'Warning!',
	  message,
	  'warning'
	);
}

function plusAndMinusCartQuantity(route, cartId, menuId, orderId, quantity, routeType, minusOrPlus, url, orderNumber, orderMaxLimit){
	$.ajax({
		url: route + cartId + '/' + menuId + '/' + orderId + '/' + quantity + '/' + routeType,
		type: "POST",
		data:{
			operation: minusOrPlus,
			quantity: quantity,
		},
		cache: false,
		success: function (response) {
			if(routeType === 1){
				displayOrderTypeInfo(url, orderId, orderNumber, orderMaxLimit);
				alert_no_flash(response.status_text, response.status_icon);
			}else{
				displayCartListInfo(url, orderId);
				orderTypeMenuList();
				alert_no_flash(response.status_text, response.status_icon);
			}
		}
	});
}

function confirmDeleteOrder(route, orderId, orderNumber, orderMaxLimit, url){
	Swal.fire({
		title: 'Remove Order#'+ orderNumber+ '!',
		text: "Are you sure you want to remove this order?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, remove it!',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 1000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + orderId,
					success: function (response) {
						displayOrderTypeInfo(url, orderId, orderNumber, orderMaxLimit);
						alert_no_flash(response.status_text, response.status_icon);
					}
				});
			});
		}
	});
}

function alert_success_no_flash(message){
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
	icon: 'success',
	title: message
	})
}

function alert_error_no_flash(message){
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
		icon: 'error',
		title: message
	  })
}

function alert_login_success(message){
	 Swal.fire(
	  'Login Success!',
	  message,
	  'success'
	);
}

function confirmExport(route){
	Swal.fire({
		title: 'Export Ingredients',
		text: "Do you want to continue?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, export it!',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 1000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
						});
					}
				});
			});
		}
	});
}

function confirmDelete(route, id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 1000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + id,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							window.location.reload();
						});
					},
					error: function () {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						});
					}
				});
			});
		}
	});
}

function convert(str) {
	var date = new Date(str),
	mnth = ("0" + (date.getMonth() + 1)).slice(-2),
	day = ("0" + date.getDate()).slice(-2);
	return [date.getFullYear(), mnth, day].join("-");
}

function filterDateClick(route){
	let flatpickrInstance
	// const inputValue = $('#filter-date').val()

	Swal.fire({
		title: 'Filter Date',
		html: '<input class="swal2-input" id="filter-date" placeholder="Select a date">',
		stopKeydownPropagation: false,
		inputValidator: (value) => {
			return new Promise((resolve) => {
				if ($('#filter-date').val() == null) {
					resolve('Please select date!');
				}else{
					resolve()
				}
            })
		},
		willOpen: () => {
			flatpickrInstance = flatpickr(
				Swal.getPopup().querySelector('#filter-date')
			)
		}
	}).then((result) => {
		const date = $('#filter-date').val()
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 1000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + '/' + date,
					type: "POST",
					data:{},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							window.location.href = route + '/' + date;
							// window.location.reload();
							console.log(route + '/' + date)
						});
					},
					warning: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							console.log(route + '/' + date)
						});
					}
				});
			});
		}
	});
}

function createOrderNumber(route){
	$.ajax({
		url: route,
		success: function (response) {
			alert_no_flash(response.status_text, response.status_icon);
			orderTypeMenuList();
		}
	});
}

function confirmPlaceOrder(btnMsg, route, id, orderStatusId, orderNumber, orderMaxLimit, url){
	Swal.fire({
		title: 'Do you want to continue?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, '+btnMsg+'!',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 500,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + '/' + id + '/' + orderStatusId,
					success: function (response) {
						if(response.status_icon == 'success' || response.status_icon == 'warning'){
							displayOrderTypeInfo(url, id, orderNumber, orderMaxLimit);
							alert_no_flash(response.status_text, response.status_icon);
						}else{
							displayOrderTypeInfo(url, id, orderNumber, orderMaxLimit);
							alert_no_flash(response.status_text, response.status_icon);
						}
					}
				});
			});
		}
	});
}

function updateIngredientReportClick(route, id, ingredientId){

	Swal.fire({
		title: 'Edit report',
		inputLabel: 'Enter quantity for this field.',
		input: 'number',
		inputAttributes: {
			min: 0
		  },
		showCancelButton: true,
		inputPlaceholder: 'Enter quantity . . .',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
		allowOutsideClick: false,
		inputValidator: (value) => {
		  return new Promise((resolve) => {
			if (value == '') {
				resolve('Quantity field is required!')
			} else{
				resolve()
			}
		  })
		}
	}).then((result) => {
		const inputValueQuantity = result.value
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + id + ingredientId,
					type: "POST",
					data:{
						id: id,
						quantity: inputValueQuantity
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							window.location.reload();
							console.log(inputValueQuantity);
							console.log(true);
						});
						$("#ingredientReports"+id).modal("show");
					},
					warning: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							console.log(inputValueQuantity);
							console.log(false);
						});
						$("#ingredientReports"+id).modal("show");
					},
					
				});
			})
		}
		$("#ingredientReports"+id).modal("show");
	});
	$("#ingredientReports"+id).modal("show");
}

function applyPayment(route, orderId, totalAmount, url, orderNumber, orderMaxLimit, ...rest_param ){
	Swal.fire({
		title: 'Customer Payment',
		inputLabel: 'Your bill is ₱' + rest_param[0].toFixed(2),			
		input: 'number',
		inputAttributes: {
			min: 0
		  },
		showCancelButton: true,
		inputPlaceholder: 'Enter payment',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, apply payment?',
		allowOutsideClick: false,
		inputValidator: (value) => {
		  return new Promise((resolve) => {
			if (value == '') {
				resolve('Payment field is required!')
			} else if (rest_param[0] < value || rest_param[0] == value){
				resolve()
			} else{
				resolve('Please pay higher than your bill!')
			}
		  })
		}
	}).then((result) => {
		const inputValue = result.value
		if (result.isConfirmed) {
			$.ajax({
				url: route + orderId + '/' + totalAmount,
				type: "POST",
				data:{
					c_cash: inputValue,
					total_amount_order: totalAmount,
					total_amount: rest_param[0].toFixed(2),
					discount_amount: rest_param[1],

				},
				cache: false,
				success: function (response) {
					displayOrderTypeInfo(url, orderId, orderNumber, orderMaxLimit);
					alert_no_flash(response.status_text, response.status_icon);
				}
			});
		}
	});
}



