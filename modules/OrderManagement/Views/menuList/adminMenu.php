
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="card rounded mb-1 shadow">
            <div class="card-body p-0 m-0">
                <p class="h4 float-start ms-2">Order Menu</p>
                <div class="cart-refresh-and-cancel-buttons" id="cart-refresh-and-cancel-buttons" onload="cartRefreshAndCancelButtons();"></div>
                <!-- <button id="fullscreenOpenAdminMenu" onclick="openFullscreenAdminMenuDisplay();" type="button" class="btn btn-sm btn-default m-1 float-end"><i class="dripicons-expand"></i></button>
                <button id="fullscreenCloseAdminMenu" onclick="closeFullscreenAdminMenuDisplay();" type="button" class="btn btn-sm btn-default m-1 float-end"><i class="dripicons-contract"></i></button> -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8 col-xxl-8">
        <div class="card rounded shadow">
            <div class="card-body p-2">
                <div class="menu-list-data" id="menu-list-data" onload="orderTypeMenuList();"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 col-xxl-4">
        <div class="card p-0 rounded shadow pb-0">
            <div class="card-body p-0 m-0  mb-0 pb-0">
                <div class="cart-list-data" id="cart-list-data"></div>
                <div class="card rounded shadow mb-0 pb-0" style="border: 5px dashed gray;" id="cart-display">
                    <div class="card-body">
                        <h1 class="text-muted text-bold text-center" style="height: 200px; margin-top: 150px;">Cart display.</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>