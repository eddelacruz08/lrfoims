
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
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function(){
    document.getElementById("order-type-dine-in-list-data").innerHTML = this.responseText;
  }
  xhttp.open("GET","/orders/order-type-dine-in-list-data/1");
  xhttp.send();
}

function orderTypeTakeOutList(){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function(){
    document.getElementById("order-type-take-out-list-data").innerHTML = this.responseText;
  }
  xhttp.open("GET","/orders/order-type-take-out-list-data/2");
  xhttp.send();
}

function orderTypeDeliveryList(){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function(){
    document.getElementById("order-type-delivery-list-data").innerHTML = this.responseText;
  }
  xhttp.open("GET","/orders/order-type-delivery-list-data/3");
  xhttp.send();
}

setInterval(function(){
  orderTypeDineInList();
}, 2000);

setInterval(function(){
  orderTypeTakeOutList();
}, 2000);

setInterval(function(){
  orderTypeDeliveryList();
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
            // console.log(html);
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
        if(response.menu[i]['menu_status'] === 'a'){
          var html = '<div class="border p-3 mb-1 rounded" id="menu_id_border">';
              html += ' <div class="row">';
              html += '   <div class="col-sm-8">';
              html += '     <div class="form-check">';
              html += '       <input type="radio" id="menu_id'+response.menu[i]['id']+'" name="menu_id" value="' + response.menu[i]['id'] + '" class="form-check-input mt-3 border-primary border">';
              html += '       <label class="form-check-label font-16 fw-bold mt-3" for="menu_id'+response.menu[i]['id']+'">' + response.menu[i]['menu'] + '</label>';
              html += '     </div>';
              html += '   </div>';
              html += '   <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">';
              html += '     <div class="card border-warning border card-menu-image-style p-0 m-1">';
              html += '       <div class="card-body p-0">';
              html += '          <img src="/assets/uploads/menu/' + response.menu[i]['image'] + '" class="menu-image-style rounded" alt="...">';
              html += '       </div>';
              html += '     </div>';
              html += '   </div>';
              html += ' </div>';
              html += '</div>';
          options = options.concat(html);
        }else{
          var html = '<div class="border p-3 mb-1 rounded" id="menu_id_border">';
              html += ' <div class="row">';
              html += '   <div class="col-sm-8">';
              html += '     <div class="form-check">';
              html += '       <input type="radio" id="menu_id'+response.menu[i]['id']+'" name="menu_id" value="' + response.menu[i]['id'] + '" class="form-check-input mt-3" disabled>';
              html += '       <label class="form-check-label font-16 fw-bold text-danger mt-3" for="menu_id'+response.menu[i]['id']+'">' + response.menu[i]['menu'] + '(unavailable)</label>';
              html += '     </div>';
              html += '   </div>';
              html += '   <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">';
              html += '     <div class="card border-warning border card-menu-image-style p-0 m-1">';
              html += '       <div class="card-body p-0">';
              html += '          <img src="/assets/uploads/menu/' + response.menu[i]['image'] + '" class="menu-image-style rounded" alt="...">';
              html += '       </div>';
              html += '     </div>';
              html += '   </div>';
              html += ' </div>';
              html += '</div>';
          options = options.concat(html);
        }
			}

			Swal.fire({
				title: '<h4 class="text-start">Add Food in Order#'+orderNumber+'</h4>',
				html: '<div class="card m-0 p-0"><div class="card-body p-1" style="overflow-y:scroll; height: 300px;">'+options+'</div></div>'+
              '<div class="card m-0 p-0"><div class="card-body p-1">'+
              ' <div class="border p-1 rounded">'+
              '   <div class="row">'+
              '     <div class="col-sm-12 col-md-12 col-lg-12">'+
              '       <label class="h5">Enter Quantity: </label>'+
              '       <input type="number" id="quantity" min="1" max="10" name="quantity" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="Enter quantity . . ." required class="form-control is-valid"/>'+
              '     </div>'+
              '   </div>'+
              ' </div>'+
              '</div>',
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
                console.log(menu_list_radio[i].value);
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

var fullscreenOpenOrders = document.getElementById("fullscreenOpenOrders");
var fullscreenCloseOrders = document.getElementById("fullscreenCloseOrders");
fullscreenCloseOrders.style.display = 'none';

var elem = document.getElementById("order_menu_fullscreen_display");

function openFullscreenOrdersDisplay() {
  if (elem.requestFullscreen) {
    fullscreenOpenOrders.style.display = 'none';
    fullscreenCloseOrders.style.display = 'block';
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    fullscreenOpenOrders.style.display = 'none';
    fullscreenCloseOrders.style.display = 'block';
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    fullscreenOpenOrders.style.display = 'none';
    fullscreenCloseOrders.style.display = 'block';
    elem.msRequestFullscreen();
  }
}

function closeFullscreenOrdersDisplay() {
  if (document.exitFullscreen) {
    fullscreenCloseOrders.style.display = 'none';
    fullscreenOpenOrders.style.display = 'block';
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
    fullscreenCloseOrders.style.display = 'none';
    fullscreenOpenOrders.style.display = 'block';
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
    fullscreenCloseOrders.style.display = 'none';
    fullscreenOpenOrders.style.display = 'block';
    document.msExitFullscreen();
  }
}
