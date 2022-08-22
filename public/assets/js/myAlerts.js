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

function confirmReassess(route){
	Swal.fire({
		title: 'Are you sure?',
		text: "You can revert this action anytime.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
							allowOutsideClick: false,
						});
					}
				});
			})
		}
	});
}

function approveReservation(route){
	var remarks = $("#remarks-app").val()
	var fee = $("#fee").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
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
						remarks: remarks,
						reservation_fee: fee,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#approve").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#approve").modal("hide");
						});
					}
				});
			})
		}
	});
}
function approveReservationByOffice(route){
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
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
						officeIsChecked: 1
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
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							
						});
					}
				});
			})
		}
	});
}

function freeReservation(route){
	var remarks = $("#remarks-app").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
						remarks: remarks
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#approve").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#approve").modal("hide");
						});
					}
				});
			});
		}
	});
}

function rejectReservation(route){
	var remarks = $("#remarks-rej").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
						remarks: remarks
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#reject").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#reject").modal("hide");
						});
					},
				});
			})
		}
	});
}
function rejectReservationByOffice(route){
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
						officeIsChecked: 2
					},
					cache: false,
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
					},
				});
			})
		}
	});
}

function endReservation(route){
	var remarks = $("#remarks-end").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#end").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#end").modal("hide");
						});
					},
				});
			})
		}
	});
}
function cancelReservation(route){
	var remarks = $("#remarks-cancel").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#cancel").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#cancel").modal("hide");
						});
					}
				});
			})
		}
	});
}

function verifyReservation(route){
	var remarks = $("#remarks-verify").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
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
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						console.log("OK");
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#verify").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						console.log("OK");
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#verify").modal("hide");
						});
					}
				});
			})
		}
	});
}


