
$(document).ready(function () {
    $.ajax({
		type: "GET",
		url: '/ingredients/get-ingredients',
		async: true,
		dataType: 'JSON',
		success: function (response) {
			console.log(response);

            var html = '<div class="row">';
                html += '   <div class="col-sm-3 mb-2 mb-sm-0">';
                html += '       <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
                    for (let x = 0; x < response.ingredientCategory.length; ++x) {
                        html += '<a class="nav-link show" id="v-pills-home-tab'+response.ingredientCategory[x]['id']+'" data-bs-toggle="pill" href="#v-pills-home'+response.ingredientCategory[x]['id']+'" role="tab" aria-controls="v-pills-home" aria-selected="true">';
                        html += '   <i class="mdi mdi-home-variant d-md-none d-block"></i>';
                        html += '   <span class="d-none d-md-block">' + response.ingredientCategory[x]['product_name'] + '</span>';
                        html += '</a>';
                    }
                html += '       </div>';
                html += '   </div>';
                html += '   <div class="col-sm-9">';
                html += '       <div class="tab-content" id="v-pills-tabContent">';
                    for (let x = 0; x < response.ingredientCategory.length; ++x) {
                        html += '   <div class="tab-pane fade show" id="v-pills-home'+response.ingredientCategory[x]['id']+'" role="tabpanel" aria-labelledby="v-pills-home-tab">';
                        html += '       <div class="table-responsive table-responsive-sm">';
                        html += '           <table id="table'+response.ingredientCategory[x]['id']+'" class="table'+response.ingredientCategory[x]['id']+' text-center table-sm table-hover dt-responsive nowrap w-100">';
                        html += '               <thead>';
                        html += '                   <tr>';
                        html += '                       <th>Name</th>';
                        html += '                       <th>Unit of measure</th>';
                        html += '                       <th>Current Price</th>';
                        html += '                       <th>Status</th>';
                        html += '                       <th>Stock In</th>';
                        html += '                       <th>View Stocks</th>';
                        html += '                       <th>Action</th>';
                        html += '                   </tr>';
                        html += '               </thead>';
                        html += '           <tbody class"ingredients-data-body>';
                        $('#table'+response.ingredientCategory[x]['id']).DataTable();
                            for (let i = 0; i < response.getIngredients.length; ++i) {
                                if(response.ingredientCategory[x]['id'] === response.getIngredients[i]['product_category_id']){
                                    html += '   <tr>';
                                    html += '       <td>'+response.getIngredients[i]['product_name']+'</td>';
                                    html += '       <td>'+response.getIngredients[i]['unit_quantity']+' '+response.getIngredients[i]['description']+'</td>';
                                    html += '       <td>₱ '+response.getIngredients[i]['price']+'</td>';
                                    html += '       <td>'+(response.getIngredients[i]['product_name'] == 1 ? '<span class="badge badge-spill bg-secondary">'+response.getIngredients[i]['name']+'</span>' : '<span class="badge badge-spill bg-dark">'+response.getIngredients[i]['name']+'</span>' )+'</td>';
                                    html += '       <td><a href="/ingredients/stocks/'+response.getIngredients[i]['id']+'" title="Add" class="btn btn-sm btn-link"><u>Add Stock</u></a></td>';
                                    html += '       <td><a href="/ingredients/v/'+response.getIngredients[i]['id']+'" title="View" class="btn btn-sm btn-default p-0 rounded-circle"><i class="mdi mdi-eye h4"></i></a></td>';
                                    html += '       <td><a href="/ingredients/u/'+response.getIngredients[i]['id']+'" title="Edit" class="btn btn-sm btn-link"><u>Edit</u></a></td>';
                                    html += '   </tr>';
                                }
                            }
                        html += '           </tbody>';
                        html += '       </table>';
                        html += '   </div>';
                        html += '</div>';
                        $('#table'+response.ingredientCategory[x]['id']+'').DataTable();
                    }
                html += '       </div>';
                html += '   </div>';
                html += '</div>';
                $(".ingredients-retrieve-data").html(html);
                // setInterval(function(){
                //     $(".ingredients-data-body").html(html);
                // },1000);
				
		}
	});

    // setInterval(function(){
    //     $(".ingredients-retrieve-data").load('/ingredients/get-ingredients').fadeIn('slow');
    // },1000);

    $('.table').DataTable();
  
    $(".ingredients-data").each(function () {
      var element = $(this);
      $.ajax({
        url: '/roles-permissions/r',
        type: 'get',
        data: { id: $(this).attr("id") },
        beforeSend: function () {
          element.html('Fetching Data...');
        },
        success: function (html) {
          console.log(html);
          element.html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.responseText);
          alert(thrownError);
        }
      });
    });
  });