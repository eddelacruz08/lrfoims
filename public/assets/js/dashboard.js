// function displayPendingOrders(){
//     const xhttpPendingOrders = new XMLHttpRequest();
//     xhttpPendingOrders.onload = function(){
//         var element = $('#display-pending-orders-table');
//         element.html(this.responseText);
//     }
//     xhttpPendingOrders.open("GET","/dashboard/get-pending-orders/v");
//     xhttpPendingOrders.send();
// }
// displayPendingOrders();

// function paginateTables(route, offset, divTextId) {
//     $(document).ready(function () {
//         $(divTextId).each(function () {
//             console.log(route +' : '+offset+' : '+divTextId);
//             var element = $(divTextId);
//             var spinner = '<div class="spinner-border text-center m-4" role="status">';
//             spinner += '<span class="visually-hidden">Loading...</span>';
//             spinner += '</div>';
//             $.ajax({
//                 url: route,
//                 type: 'get',
//                 data: { offset: offset },
//                 beforeSend: function () {
//                     element.html(spinner);
//                 },
//                 success: function (html) {
//                     element.html(html);
//                 },
//                 error: function (xhr, ajaxOptions, thrownError) {
//                     alert(xhr.responseText);
//                     alert(thrownError);
//                     alert(ajaxOptions);
//                 }
//             });
//         });
//     });
// }