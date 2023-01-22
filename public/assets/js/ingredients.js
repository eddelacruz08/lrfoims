
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

function paginateTables(route, offset = null, divTextId = null){
  var searchInput = $('searchPendingOrders').value;
  $(document).ready(function () {
    $(divTextId).each(function () {
      console.log(searchInput);
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