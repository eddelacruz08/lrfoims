
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

function orderTypeDineInList(){
  var element = $('#order-type-dine-in-list-data');
  $.ajax({
    url: "/orders/order-type-dine-in-list-data/1",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // alert(xhr.responseText);
      // alert(thrownError);
    }
  });
}

function orderTypeTakeOutList(){
  var element = $('#order-type-take-out-list-data');
  $.ajax({
    url: "/orders/order-type-take-out-list-data/2",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // alert(xhr.responseText);
      // alert(thrownError);
    }
  });
}

function orderTypeDeliveryList(){
  var element = $('#order-type-delivery-list-data');
  $.ajax({
    url: "/orders/order-type-delivery-list-data/3",
    type: 'GET',
    data: {},
    success: function (html) {
      element.html(html);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // alert(xhr.responseText);
      // alert(thrownError);
    }
  });
}

setInterval(function(){
    orderTypeDineInList()
}, 2000);

setInterval(function(){
    orderTypeTakeOutList()
}, 2000);

setInterval(function(){
    orderTypeDeliveryList()
}, 2000);

function displayOrderTypeInfo(route, id, orderNumber, orderMaxLimit){
  $(document).ready(function () {
    $(".orderTypeDisplayInfo").each(function () {
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
          localStorage.setItem('BorderStyle','borderStyle'+id);

          var getBorderStyle = localStorage.getItem('BorderStyle');
          $('#'+getBorderStyle).addClass('border-warning');

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

function getMenuList(route, id, orderNumber, orderLimit, url){
	$.ajax({
		type: "GET",
		url: '/menu-list/get-menu-list/',
		async: true,
		dataType: 'JSON',
		success: function (response) {
			var options = '';
      for (let i = 0; i < response.menu.length; ++i) {
        var html =  '<table class="table table-sm table-hover w-100">';
            html += ' <tbody>';
            html += '   <tr>';
            html += '     <td><input type="radio" id="menu_id'+response.menu[i]['id']+'" name="menu_id" value="' + response.menu[i]['id'] + '" class="form-check-input float-start mt-3 '+(response.menu[i]['menu_status'] === 'a'?' border-primary border':'')+'" '+(response.menu[i]['menu_status'] === 'a'?'':'disabled')+'></td>';
            html += '     <td><label class="form-check-label font-16 fw-bold mt-3" for="menu_id'+response.menu[i]['id']+'">' + response.menu[i]['menu'] + '</label></td>';
            html += '     <td>';
            html += '     <div class="card border-warning border card-menu-image-style float-end p-0 m-1">';
            html += '       <div class="card-body p-0">';
            html += '          <img src="/assets/uploads/menu/' + response.menu[i]['image'] + '" class="menu-image-style rounded float-end" alt="...">';
            html += '       </div>';
            html += '     </div>';
            html += '     </td>';
            html += '   </tr>';
            html += ' </tbody>';
            html += '</table>';
        options = options.concat(html);
			}

			Swal.fire({
				title: '<h4 class="text-start">Add Food in Order#'+orderNumber+'</h4>',
				html: '<div class="card m-0 p-0"><div class="card-body p-1" style="overflow-y:scroll; height: 300px;">'+options+'</div></div>'+
              '<input type="hidden" id="quantity" value="1" name="quantity"/>',
				stopKeydownPropagation: false,
				showCancelButton: true,
				confirmButtonColor: 'success',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Add to cart',
				allowOutsideClick: false,
				preConfirm: () => {
          var menu_list_radio = document.getElementsByName('menu_id');
          for(var i = 0; i < menu_list_radio.length; i++) {
              if(menu_list_radio[i].checked){
                var selected_menu_id = menu_list_radio[i].value;
              }
          }
          if (selected_menu_id == '' || document.getElementById('quantity').value == '') {
            $('#menu_id_border').addClass('border-danger');
            $('#menu_id').addClass('border-danger');
            $('#quantity').addClass('is-invalid');
            Swal.showValidationMessage('Please complete all fields!')
          } else{
            if (Number(document.getElementById('quantity').value) > orderLimit) {
              $('#menu_id_border').addClass('border-primary');
              $('#menu_id').addClass('border-secondary');
              $('#quantity').addClass('is-invalid');
              Swal.showValidationMessage('Please input quantity not greater than to '+orderLimit+' for the order limit!')
            } else{
              var menu_id = selected_menu_id;
              var quantity = document.getElementById('quantity').value;
              $.ajax({
                url: route,
                type: "POST",
                data:{
                  order_id: id,
                  menu_id: menu_id,
                  quantity: quantity
                },
                cache: false,
                success: function (response) {
                  if(response.status_icon == 'success'){
                    displayOrderTypeInfo(url, id, orderNumber, orderLimit);
                    alert_no_flash(response.status_text, response.status_icon);
                  }else{
                    Swal.fire({
                      title: response.status,
                      text: response.status_text,
                      icon: response.status_icon,
                    }).then((confirm) => {
                      getMenuList(url, id, orderNumber, orderLimit)
                    });
                  }
                }
              });
            }
          }
				},
			})
		}
	});
}

function confirmDeleteCart(route, cartId, menuId, orderId, cartQyt, routeType, url, id, orderNumber, orderMaxLimit){
  $.ajax({
    url: route + cartId + '/' + menuId + '/' + orderId + '/' + cartQyt,
    success: function (response) {
        if(routeType === 1){
          if(response.status_icon == 'success'){
            displayOrderTypeInfo(url, orderId, orderNumber, orderMaxLimit);
            alert_no_flash(response.status_text, response.status_icon);
          }else{
            displayOrderTypeInfo(url, orderId, orderNumber, orderMaxLimit);
            alert_no_flash(response.status_text, response.status_icon);
          }
        }else{
          if(response.status_icon == 'success'){
            console.log('ok');
            displayCartListInfo(url, orderId);
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }else{
            console.log('ok');
            displayCartListInfo(url, orderId);
            orderTypeMenuList();
            alert_no_flash(response.status_text, response.status_icon);
          }
        }
    }
  });
}
