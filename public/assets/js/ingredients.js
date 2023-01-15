
// function getIngredientList(){
//   const xhttp = new XMLHttpRequest();
//   xhttp.onload = function(){
//     document.getElementById("ingredient-list").innerHTML = this.responseText;
//   }
//   xhttp.open("GET","/ingredients/ingredient-list");
//   xhttp.send();

//   $(document).ready(function(){
//     $('a[data-bs-toggle="pill"]').on('show.bs.tab', function(e) {
//       localStorage.setItem('active-ingredients-tab', $(e.target).attr('href'));
//     });
//     var activeIngredientsTab = localStorage.getItem('active-ingredients-tab');
//     if(activeIngredientsTab){
//       $('#v-pills-tab a[href="' + activeIngredientsTab + '"]').tab('show');
//     }
//   });
// }

// getIngredientList();

// function getIngredientData(){
//   const xhttp = new XMLHttpRequest();
//   xhttp.onload = function(){
//     document.getElementById("ingredient-data").innerHTML = this.responseText;
//   }
//   xhttp.open("GET","/ingredients/ingredient-data");
//   xhttp.send();
  
//   $(document).ready(function(){
//     $('a[data-bs-toggle="pill"]').on('show.bs.tab', function(e) {
//       localStorage.setItem('active-ingredients-tab', $(e.target).attr('href'));
//     });
//     var activeIngredientsTab = localStorage.getItem('active-ingredients-tab');
//     if(activeIngredientsTab){
//       $('#v-pills-tab a[href="' + activeIngredientsTab + '"]').tab('show');
//     }
//   });
// }

// getIngredientData();

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

