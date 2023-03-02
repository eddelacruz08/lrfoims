
function submitAddStockForm(route, ingredient_id_value, category_id_value, unit_quantity_value,
  price_value, date_expiration_value, unit_quantity_div_id, price_div_id, date_expiration_div_id,
  url, category_id){
    $.ajax({
      url: route,
      type: 'post',
      data: { 
        ingredient_id: ingredient_id_value,
        category_id: category_id_value,
        unit_quantity: unit_quantity_value,
        price: price_value,
        date_expiration: date_expiration_value,
      },
      success: function (response) {
        console.log(response)
        if(response.status_icon == 'success'){
            alert_no_flash(response.status_text, response.status_icon);
            displayIngredients(url, category_id);
        }else{
            alert_no_flash(response.status_text, response.status_icon);
            if(response.errors.data_expiration && response.errors.price && response.errors.unit_quantity){
              date_expiration_div_id.addClass('is-invalid');
              price_div_id.addClass('is-invalid');
              unit_quantity_div_id.addClass('is-invalid');
              console.log("all")
            }else
            if(response.errors.unit_quantity) {
              date_expiration_div_id.addClass('is-valid');
              price_div_id.addClass('is-valid');
              date_expiration_div_id.removeClass('is-invalid');
              price_div_id.removeClass('is-invalid');
              unit_quantity_div_id.addClass('is-invalid');
              console.log("unit")
            }else
            if(response.errors.price) {
              date_expiration_div_id.addClass('is-valid');
              date_expiration_div_id.removeClass('is-invalid');
              price_div_id.addClass('is-invalid');
              unit_quantity_div_id.addClass('is-valid');
              unit_quantity_div_id.removeClass('is-invalid');
              console.log("price")
            }else
            if(response.errors.date_expiration) {
              date_expiration_div_id.addClass('is-invalid');
              price_div_id.addClass('is-valid');
              unit_quantity_div_id.addClass('is-valid');
              price_div_id.removeClass('is-invalid');
              unit_quantity_div_id.removeClass('is-invalid');
              console.log("date")
            }else{
              console.log("none")
            }
        }
      }
    });
}

function displayPendingOrders(){
  var element = $('#display-pending-orders-table');
  var spinner = '<div class="spinner-border text-center m-4" role="status">';
      spinner += '<span class="visually-hidden">Loading...</span>';
      spinner += '</div>';
  $.ajax({
    url: "/dashboard/get-pending-orders/v",
    type: 'GET',
    data: {},
    beforeSend: function () {
      element.html(spinner);
    },
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.responseText);
      console.log(thrownError);
    }
  });
}
displayPendingOrders();

function returnIngredients(route, id){
	Swal.fire({
		title: 'Return Ingredients!',
		text: "Are you sure you want to return ingredients?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, return the data!',
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
					url: route + id,
					success: function (response) {
						displayPendingOrders();
						alert_no_flash(response.status_text, response.status_icon);
					}
				});
			});
		}
	});
}

function displayBarangayData(){
  var element = $('#display-barangay-table');
  var spinner = '<div class="spinner-border text-center m-4" role="status">';
      spinner += '<span class="visually-hidden">Loading...</span>';
      spinner += '</div>';
  $.ajax({
    url: "/barangay/v",
    type: 'GET',
    data: {},
    beforeSend: function () {
      element.html(spinner);
    },
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.responseText);
      console.log(thrownError);
    }
  });
}
displayBarangayData();

function displayOrderReportsData(){
  var element = $('#display-order-reports-table');
  var spinner = '<div class="spinner-border text-center m-4" role="status">';
      spinner += '<span class="visually-hidden">Loading...</span>';
      spinner += '</div>';
  $.ajax({
    url: "/order-reports/v",
    type: 'GET',
    data: {},
    beforeSend: function () {
      element.html(spinner);
    },
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.responseText);
      console.log(thrownError);
    }
  });
}
displayOrderReportsData();

function paginateTables(route, offset = null, divTextId = null, searchInput = null){
  $(document).ready(function () {
    $(divTextId).each(function () {
      var element = $(divTextId);
      var spinner = '<div class="d-flex align-items-center">';
          spinner += '<strong>Loading...</strong>';
          spinner += '<div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>';
          spinner += '</div>';
      $.ajax({
        url: route,
        type: 'GET',
        data: {
          offset: offset,
          search: searchInput,
        },
        beforeSend: function () {
          element.html(spinner);
        },
        success: function (html) {
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

$(document).ready(function(){
  $('a[data-bs-toggle="pill"]').on('show.bs.tab', function(e) {
    localStorage.setItem('active-ingredients-tab', $(e.target).attr('href'));
  });
  var activeIngredientsTab = localStorage.getItem('active-ingredients-tab');
  if(activeIngredientsTab){
    $('#v-pills-tab a[href="' + activeIngredientsTab + '"]').tab('show');
  }
});

function displayIngredients(route, product_category_id){
  $('.table').DataTable();
  $(document).ready(function () {
    $(".v-pills-tabContent-ingredients").each(function () {
      var element = $('#v-pills-tabContent-ingredients');
      var spinner = '<div class="spinner-border text-center m-4" role="status">';
          spinner += '<span class="visually-hidden">Loading...</span>';
          spinner += '</div>';
      $.ajax({
        url: route,
        type: 'get',
        data: { id: product_category_id },
        beforeSend: function () {
          element.html(spinner);
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
}

function viewStocks(route, ingredient_id, category_tab_id){
  $(document).ready(function () {
    $(".v-pills-tabContent-ingredients").each(function () {
      var element = $('#v-pills-tabContent-ingredients');
      var spinner = '<div class="spinner-border text-center m-4" role="status">';
          spinner += '<span class="visually-hidden">Loading...</span>';
          spinner += '</div>';
      $.ajax({
        url: route,
        type: 'get',
        data: { 
          id: ingredient_id,
          category_id: category_tab_id,
         },
        beforeSend: function () {
          element.html(spinner);
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
}

function addStockForm(route, ingredient_id, category_tab_id){
  $(document).ready(function () {
    $(".v-pills-tabContent-ingredients").each(function () {
      var element = $('#v-pills-tabContent-ingredients');
      var spinner = '<div class="spinner-border text-center m-4" role="status">';
          spinner += '<span class="visually-hidden">Loading...</span>';
          spinner += '</div>';
      $.ajax({
        url: route,
        type: 'get',
        data: { 
          id: ingredient_id,
          category_id: category_tab_id,
         },
        beforeSend: function () {
          element.html(spinner);
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
}

function confirmationStockIngredients(route, stockId, unit_quantity, ingredientId){
  var min = 0;
	Swal.fire({
		title: 'Confirm this stock if already expired!',
		inputLabel: 'If yes, please input unit quantity that expired based on the stock that expired within the expiration date. '+
                'If not literally expired on your ingredient stocks, please cancel this expired stock notification. '+
                'You may see the "Cancel" button beside the "Confimation" button. Thank you!',
		input: 'number',
    padding: '25px',
		inputAttributes: {
			min: 0,
		  },
		showCancelButton: true,
		inputPlaceholder: 'Enter unit quantity',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, apply changes?',
		allowOutsideClick: false,
		inputValidator: (value) => {
		  return new Promise((resolve) => {
			if (value == '') {
				resolve('Unit Quantity field is required!')
			} else if (value <= min){
				resolve('Please input value between 1 to '+unit_quantity+' that depends the range of quantity of expired stock.')
			}else if (unit_quantity > value || unit_quantity == value || value < min){
				resolve()
			} else{
				resolve('Please input value between 1 to '+unit_quantity+' that depends the range of quantity of expired stock.')
			}
		  })
		}
	}).then((result) => {
		const inputValue = result.value
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
					url: route + '/' + ingredientId + '/' + stockId,
					type: "POST",
					data:{
						unit_quantity: inputValue,
					},
					cache: false,
					success: function (response) {
						alert_no_flash(response.status_text, response.status_icon);
            window.location.reload();
					}
				});
			})
		}
	});
}

function confirmCancelExpiredStocks(route, stockId){
	Swal.fire({
		title: 'Are you sure you want to cancel expired stock?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, cancel it!',
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
					url: route + '/' + stockId,
					success: function (response) {
            alert_no_flash(response.status_text, response.status_icon);
            window.location.reload();
					}
				});
			});
		}
	});
}

function insertSpreadsheet(route){
  var fd = new FormData();
  var files = $('#file')[0].files;
  if(files.length > 0 ){
     fd.append('ingredients',files[0]);
     $.ajax({
        url: route,
        type: 'post',
        data: fd,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
          Swal.showLoading();
        },
        success: function(response){
          Swal.close()
          console.log(response)
          Swal.fire({
            icon: response['status'],
            title: response['message'],
            html: 'To be insert: ' + response['insert_count'] + '<br> Successfully inserted: ' + response['inserted_count'] + '<br> Existing Data: ' + response['exisiting_count']
          })
        },
        error: function (request, error) {
          Swal.close()
          console.log(request + ' : ' + error)
          Swal.fire({
            icon: 'error',
            title: 'Something went wrong!'
          })
        },
     });
  }else{
     alert("Please select a file.");
  }
}
function importIngredientsBackupSpreadsheet(route){
  var fd = new FormData();
  var files = $('#file')[0].files;
  if(files.length > 0 ){
     fd.append('ingredients_backup',files[0]);
     $.ajax({
        url: route,
        type: 'post',
        data: fd,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
          showLoading();
        },
        success: function(response){
          swal.close()
          console.log(response)
          Swal.fire({
            icon: response['status'],
            title: response['message'],
            html: 'To be insert: ' + response['insert_count'] + '<br> Successfully inserted: ' + response['inserted_count'] + '<br> Existing Data: ' + response['exisiting_count']
          })
        },
        error: function (request, error) {
          swal.close()
          Swal.fire({
            icon: 'error',
            title: 'Something went wrong!'
          })
        },
     });
  }else{
     alert("Please select a file.");
  }

}