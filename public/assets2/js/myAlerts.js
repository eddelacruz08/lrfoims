function alert_error(message){
	 Swal.fire({
		  icon: 'error',
		  title: 'Oops!',
		  text: message,
		});
}

function alert_success(message){
	 Swal.fire(
	  'Success!',
	  message,
	  'success'
	);
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

function filterDateClick(route){
	let flatpickrInstance

	Swal.fire({
	title: 'Please enter departure date',
	html: '<input class="swal2-input" id="expiry-date">',
	stopKeydownPropagation: false,
	preConfirm: () => {
		if (flatpickrInstance.selectedDates[0] < new Date()) {
		Swal.showValidationMessage(`The departure date can't be in the past`)
		}
	},
	willOpen: () => {
		flatpickrInstance = flatpickr(
		Swal.getPopup().querySelector('#expiry-date')
		)
	}
	})

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

function addIngredientReportClick(route, id, quantity){

	const quantityValue = quantity.split("/")
	const ingredientQuantity =  Number(quantityValue[1]);

	Swal.fire({
		title: 'Apply Used Ingredient!',
		inputLabel: 'Enter total quantity for this field.',
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
			} else if (ingredientQuantity >= value){
				resolve()
			} else{
				resolve('Please check your stock of this ingredient! <br> You have low stock of ingredients.')
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
				timer: 1500,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + id,
					type: "POST",
					data:{
						ingredient_id: id,
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
							// $("#placeOrderPayment").load(location.href + "#placeOrderPayment");
							console.log(ingredientQuantity);
							console.log(inputValueQuantity);
							console.log(true);
						});
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
					}
				});
			})
		}
	});
}

function confirmPlaceOrder(route, id, valueId){
	Swal.fire({
		title: 'Do you want to continue?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, place order!',
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
					url: route + id + valueId,
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

function applyPayment(route, id, totalAmount){

	const totalPrice = totalAmount.split("/")

	Swal.fire({
		title: 'Customer Payment',
		inputLabel: 'Enter the payment in this field.',
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
			} else if (totalPrice[1] > value){
				resolve('Please pay higher than your bill!')
			} else{
				resolve()
			}
		  })
		}
	}).then((result) => {
		const inputValue = result.value
		if (result.isConfirmed) {
			// const totalPrice = totalAmount.split("/")
			// const inputValue = Swal.getInput()
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
					url: route + id + totalAmount,
					type: "POST",
					data:{
						c_cash: inputValue,
						total_amount: totalAmount,
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
							// $("#placeOrderPayment").load(location.href + "#placeOrderPayment");
							console.log(totalPrice[1]);
						});
					},
					warning: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							console.log(inputValue);
						});
					}
				});
			})
		}
	});
}

function applyPaymentOrders(route){
	var c_cash = $("#payment_customer_cash").val()
	var id = $("#payment_modal_id").val()
	var total_amount = $("#payment_total_amount").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You want to apply this payment?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
		allowOutsideClick: false,
	}).then((result) => {
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
					url: route,
					type: "POST",
					data: {
						c_cash: c_cash,
						total_amount: total_amount,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#addPaymentOrdersModal"+id).modal("hide");
							window.location.reload();
							console.log(total_amount);
						});
					},
					warning: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#addPaymentOrdersModal"+id).modal("show");
							console.log(total_amount);
						});
					}
				});
			})
		}
	});
}

function applyPaymentServeOrders(route){
	var c_cash = $("#serve_payment_customer_cash").val()
	var id = $("#serve_payment_modal_id").val()
	var total_amount = $("#serve_payment_total_amount").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You want to apply this payment?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
		allowOutsideClick: false,
	}).then((result) => {
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
					url: route,
					type: "POST",
					data: {
						c_cash: c_cash,
						total_amount: total_amount,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#addPaymentServeOrdersModal"+id).modal("hide");
							window.location.reload();
							console.log(total_amount);
						});
					},
					warning: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#addPaymentServeOrdersModal"+id).modal("show");
							window.location.reload();
							console.log(total_amount);
						});
					}
				});
			})
		}
	});
}


