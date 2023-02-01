
<!-- <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="card rounded mt-2 shadow mb-1">
            <div class="card-body p-0 m-0">
                <p class="h4 float-start ms-2"><?= $title?></p>
                <button id="fullscreenOpenOrders" onclick="openFullscreenOrdersDisplay();" type="button" class="btn btn-sm btn-default m-1 float-end"><i class="dripicons-expand"></i></button>
                <button id="fullscreenCloseOrders" onclick="closeFullscreenOrdersDisplay();" type="button" class="btn btn-sm btn-default m-1 float-end"><i class="dripicons-contract"></i></button>
            </div>
        </div>
    </div>
</div> -->
<div class="row mt-1">
    <div class="col-sm-4 col-md-4 col-lg-4 col-xxl-4">
        <div class="card">
            <div class="card-body border rounded shadow p-1">
        
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-1 border rounded" id="orderTypeTab">
                    <li class="nav-item">
                        <a class="nav-link rounded-0 activeOrderTypeList" href="#dineIn" data-bs-toggle="tab">
                            <span class="d-sm-block">Dine&nbspIn</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0 activeOrderTypeList" href="#takeOut" data-bs-toggle="tab">
                            <span class="d-sm-block">Take&nbspOut</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0 activeOrderTypeList" href="#delivery" data-bs-toggle="tab">
                            <span class="d-sm-block">Delivery</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="dineIn" class="tab-pane fade show active">
                        <div class="order-type-dine-in-list-data" id="order-type-dine-in-list-data" onload="orderTypeDineInList();"></div>
                    </div>
                    <div id="takeOut" class="tab-pane fade">
                        <div class="order-type-take-out-list-data" id="order-type-take-out-list-data" onload="orderTypeTakeOutList();"></div>
                    </div>
                    <div id="delivery" class="tab-pane fade">
                        <div class="order-type-delivery-list-data" id="order-type-delivery-list-data" onload="orderTypeDeliveryList();"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-sm-8 col-md-8 col-lg-8 col-xxl-8">
        <div class="card">
            <div class="card-body p-2 m-0 border rounded shadow orderTypeDisplayInfo" id="orderTypeDisplayInfo">
                <h1 class="text-muted text-bold mt-5 mb-5 text-center">Select an order to display.</h1>
            </div>
        </div>
    </div>

</div>