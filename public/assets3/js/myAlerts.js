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

function getMenuList(route, id, orderNumber, orderLimit){
	$.ajax({
		type: "GET",
		url: '/menu-list/get-menu-list/',
		async: true,
		dataType: 'JSON',
		success: function (response) {
			console.log(response);
			var options = '<option disabled value="" selected>-- Select a food --</option>';
			var	optionDisabled = '<option disabled value="" selected>-- Select a food --</option>';
				options = options.concat(optionDisabled);
			for (let x = 0; x < response.menuCategory.length; ++x) {
				var optionStartOpt = '<optgroup class="text-start" label="' + response.menuCategory[x]['name'] + '">';
				options = options.concat(optionStartOpt);
					for (let i = 0; i < response.menu.length; ++i) {
						if(response.menuCategory[x]['id'] === response.menu[i]['menu_category_id']){
							if(response.menu[i]['menu_status'] === 'a'){
								var optionList = '<option value="' + response.menu[i]['id'] + '">' + response.menu[i]['menu'] + '</option>';
								options = options.concat(optionList);
							}else{
								var optionList = '<option class="text-danger" value="' + response.menu[i]['id'] + '" disabled>' + response.menu[i]['menu'] + ' (unavailable)</option>';
								options = options.concat(optionList);
							}
						}
					}
				var optionEndOpt = '</optgroup>';
				options = options.concat(optionEndOpt);
			}
			Swal.fire({
				title: '<h4 class="text-start">Add Food in Order#'+orderNumber+'</h4>',
				html: 	'<input type="hidden" name="order_id" value="'+id+'">'+
						'<label for="menu_id">Menu List: <small class="text-danger">*</small></label>'+
						'<select class="form-control select2 mb-2" data-toggle="select2" id="menu_id" name="menu_id>' + options + '</select>'+
						'<label for="quantity" class="text-start">Quantity: <small class="text-danger">*(Limit of '+orderLimit+' orders only.)</small></label>'+
						'<input type="number" id="quantity" min="1" max="10" name="quantity" placeholder="Enter quantity . . ." required class="form-control"/>',
				stopKeydownPropagation: false,
				showCancelButton: true,
				confirmButtonColor: 'success',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Add to cart',
				allowOutsideClick: false,
				inputValidator: () => {
					return new Promise((resolve) => {
						if (document.getElementById('menu_id').value == '' && document.getElementById('quantity').value == '') {
							resolve('Please fill up all fields!')
						} else{
							resolve('okay')
						}
					})
				},
			}).then((result) => {
				console.log(result);
				console.log(document.getElementById('menu_id').value);
				console.log(document.getElementById('quantity').value);
				// if (result.isConfirmed) {
				// 	Swal.fire({
				// 		title: 'Processing...',
				// 		html: 'Please wait.',
				// 		icon: 'info',
				// 		timer: 2000,
				// 		timerProgressBar: true,
				// 		allowOutsideClick: false,
				// 		didOpen: () => {
				// 			Swal.showLoading()
				// 		},
				// 	}).then((result) => {
				// 		$.ajax({
				// 			url: route + id + totalAmount,
				// 			type: "POST",
				// 			data:{
				// 				c_cash: inputValue,
				// 				total_amount: totalAmount,
				// 			},
				// 			cache: false,
				// 			success: function (response) {
				// 				Swal.fire({
				// 					title: response.status,
				// 					text: response.status_text,
				// 					icon: response.status_icon,
				// 					allowOutsideClick: false,
				// 				}).then((confirm) => {
				// 					window.location.reload();
				// 					$("#placeOrderPayment").load(location.href + "#placeOrderPayment");
				// 					console.log(totaPriceAmount);
				// 				});
				// 			},
				// 			warning: function (response) {
				// 				Swal.fire({
				// 					title: response.status,
				// 					text: response.status_text,
				// 					icon: response.status_icon,
				// 					allowOutsideClick: false,
				// 				}).then((confirm) => {
				// 					console.log(inputValue);
				// 				}); 
				// 			}
				// 		});
				// 	})
				// }
			});
		}
	});
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

function confirmDeleteCart(route, cartId, menuId, orderId, cartQyt){
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
					url: route + cartId + '/' + menuId + '/' + orderId + '/' + cartQyt,
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
			type: "POST",
			data:{},
			cache: false,
			success: function (response) {
				Swal.fire({
					title: response.status,
					text: response.status_text,
					icon: response.status_icon,
				}).then((confirm) => {
					window.location.reload();
					console.log(route);
				});
			},
			warning: function (response) {
				Swal.fire({
					title: response.status,
					text: response.status_text,
					icon: response.status_icon,
				});
			}
		});
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
						}).then((confirm) => {
							console.log('False');
						});
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

function applyPayment(route, id, totalAmount){

	const totalPrice = totalAmount.split("/")
	const totaPriceAmount =  Number(totalPrice[1]);

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
			} else if (totaPriceAmount < value || totaPriceAmount == value){
				resolve()
			} else{
				resolve('Please pay higher than your bill!')
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
							console.log(totaPriceAmount);
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



