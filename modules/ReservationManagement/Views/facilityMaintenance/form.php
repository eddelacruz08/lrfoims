                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/facility-maintenances"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <?= $edit? 'Edit' : 'Add' ?>
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-header"></div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="/facility-maintenances/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="for_checking_id" name="for_checking_id" value="<?= !$edit ? '' : $value['id'] ?>">
                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Facility <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['facilities']) ? 'is-invalid':'is-valid' ?>" id="facility_id" name="facility_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($facilities as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['facility_id'])):?>
                                                        <?php if($value['facility_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['facility_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['facility_id'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputCity">Maintenance Date <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['maintenance_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker2" placeholder="Maintenance Date" name="maintenance_date" value="<?= isset($value) ? $value['maintenance_date'] : ''?>">
                                                                            <?php if(isset($errors['maintenance_date'])):?>
                                                                                <small class="text-danger"><?=esc($errors['maintenance_date'])?></small>
                                                                            <?php endif;?>
                                                                            <small class="text-danger" id="checked_schedule_date">Reservation is already taken.</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCity">Event starting time <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['scheduled_starting_time']) ? 'is-invalid':'is-valid' ?>" id="picker3" placeholder="Event Starting Time" value="<?= isset($value) ? $value['scheduled_starting_time'] : ''?>">
                                                                            <input type="hidden" id="start-time" name="scheduled_starting_time" value="<?= isset($value) ? $value['scheduled_starting_time'] : ''?>">
                                                                            <?php if(isset($errors['scheduled_starting_time'])):?>
                                                                                <small class="text-danger"><?=esc($errors['scheduled_starting_time'])?></small>
                                                                            <?php endif;?>
                                                                            <small class="text-danger" id="checked_schedule_time1">Reservation is already taken.</small>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCity">Event end time <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['scheduled_end_time']) ? 'is-invalid':'is-valid' ?>" placeholder="Event end Time" value="<?= isset($value) ? $value['scheduled_end_time'] : ''?>" id="picker4">
                                                                            <input type="hidden" name="scheduled_end_time" id="end-time" value="<?= isset($value) ? $value['scheduled_end_time'] : ''?>">
                                                                            <?php if(isset($errors['scheduled_end_time'])):?>
                                                                                <small class="text-danger"><?=esc($errors['scheduled_end_time'])?></small>
                                                                            <?php endif;?>
                                                                            <small class="text-danger" id="checked_schedule_time2">Reservation is already taken.</small>
                                                                        </div>
                                                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Description" value="<?= isset($value['description']) ? $value['description'] : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right">Schedule Maintenance</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>