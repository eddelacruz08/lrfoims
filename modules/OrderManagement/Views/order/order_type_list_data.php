<?php if(!empty($getOrderTypeDetails)):?>
    <?php foreach($getOrderTypeDetails as $typeInfo):?>
        <?php if(user_link('orders/preparing', session()->get('userPermissionView'))):?>
            <?php if($typeInfo['order_status_id'] == 2):?>
                <div class="list-group border mb-1" id="borderStyle<?=$typeInfo['id']?>">
                    <a type="button" onclick="displayOrderTypeInfo('/orders/get-info',<?=$typeInfo['id']?>,<?=$typeInfo['number']?> ,<?=$orderMaxLimit['max_limit']?>);" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Order#<?=$typeInfo['number']?>
                                <span class="badge bg-warning mb-1"><?=ucwords($typeInfo['order_status'])?></span>
                            </h5>
                            <button type="button" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div> 
                        <small><?= date('F d, Y - H:i a',strtotime($typeInfo['created_at'])); ?></small> 
                    </a>
                </div>
            <?php endif;?>
        <?php endif;?>
        <?php if(user_link('orders/serving', session()->get('userPermissionView'))):?>
            <?php if($typeInfo['order_status_id'] == 3):?>
                <div class="list-group border mb-1" id="borderStyle<?=$typeInfo['id']?>">
                    <a type="button" onclick="displayOrderTypeInfo('/orders/get-info',<?=$typeInfo['id']?>,<?=$typeInfo['number']?> ,<?=$orderMaxLimit['max_limit']?>);" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Order#<?=$typeInfo['number']?>
                                <span class="badge bg-primary mb-1"><?=ucwords($typeInfo['order_status'])?></span>
                            </h5>
                            <button type="button" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div> 
                        <small><?= date('F d, Y - H:i a',strtotime($typeInfo['created_at'])); ?></small>
                    </a>
                </div>
            <?php endif;?>
        <?php endif;?>
        <?php if(user_link('orders/payment', session()->get('userPermissionView'))):?>
            <?php if($typeInfo['order_status_id'] == 4):?>
                <div class="list-group border mb-1" id="borderStyle<?=$typeInfo['id']?>">
                    <a type="button" onclick="displayOrderTypeInfo('/orders/get-info',<?=$typeInfo['id']?>,<?=$typeInfo['number']?> ,<?=$orderMaxLimit['max_limit']?>);" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Order#<?=$typeInfo['number']?>
                                <span class="badge bg-danger mb-1"><?=ucwords($typeInfo['order_status'])?></span>
                            </h5>
                            <button type="button" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div> 
                        <small><?= date('F d, Y - H:i a',strtotime($typeInfo['created_at'])); ?></small>
                    </a>
                </div>
            <?php endif;?>
        <?php endif;?>
        <?php if(user_link('orders/paid', session()->get('userPermissionView'))):?>
            <?php if($typeInfo['order_status_id'] == 5):?>
                <div class="list-group border mb-1" id="borderStyle<?=$typeInfo['id']?>">
                    <a type="button" onclick="displayOrderTypeInfo('/orders/get-info',<?=$typeInfo['id']?>,<?=$typeInfo['number']?> ,<?=$orderMaxLimit['max_limit']?>);" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Order#<?=$typeInfo['number']?>
                                <span class="badge bg-success mb-1"><?=ucwords($typeInfo['order_status'])?></span>
                            </h5>
                            <button type="button" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div> 
                        <small><?= date('F d, Y - H:i a',strtotime($typeInfo['created_at'])); ?></small>
                    </a>
                </div>
            <?php endif;?>
        <?php endif;?>
    <?php endforeach;?>
<?php else: ?>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">No data</h5>
            </div>
        </a>
    </div>
<?php endif;?>