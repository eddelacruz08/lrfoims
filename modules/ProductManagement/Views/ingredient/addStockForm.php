<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <div class="page-title-box p-0 m-0">
            <h4 class="float-start pb-1 ps-1 pe-1 border-bottom border-primary"><?= $title ?></h4>
            <button type="button" onclick="displayIngredients('/ingredients/ingredient-list-data',<?=$category_id?>);" class="btn btn-sm btn-outline-dark float-end">Go back</button>
        </div>
    </div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
        <form id="stockForm">
            <input type="hidden" value="<?=$id?>" name="id" id="ingredient_id">
            <input type="hidden" value="<?=$category_id?>" name="category_id" id="category_id">
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="unit_quantity" class="form-label">Unit of Quantity: <span class="text-danger">*</span></label>
                    <input type="number" id="unit_quantity" name="unit_quantity" placeholder="Enter unit of quantity" class="form-control form-control-sm" step=".001">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="price" class="form-label">Enter current price per measurement: <span class="text-danger">*</span></label>
                    <input type="number" id="price" name="price" placeholder="Enter current price" class="form-control form-control-sm" step=".001">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <label for="date_expiration" class="form-label">Expiration Date: <span class="text-danger">*</span></label>
                    <input type="date" id="date_expiration" name="date_expiration" class="form-control form-control-sm">
                    <small class="text-danger"></small>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-sm-6 mb-1">
                    <input type="submit" class="btn btn-sm btn-success float-end" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>   
<script>
    const unit_quantity = document.querySelector('#unit_quantity');
    const price = document.querySelector('#price');
    const date_expiration = document.querySelector('#date_expiration');
    const form = document.querySelector('#stockForm');
    const ingredient_id = document.querySelector('#ingredient_id');
    const category_id = document.querySelector('#category_id');
    const checkUnitQuantity= () => {
        let valid = false;
        const min = 1, max = 25;
        const quantity = unit_quantity.value.trim();

        if (!isRequired(quantity)) {
            showError(unit_quantity, 'Unit quantity field is required.');
        } else if (!isBetween(quantity, min)) {
            showError(unit_quantity, `Unit quantity must be greater than or equal ${min}.`)
        } else {
            showSuccess(unit_quantity);
            valid = true;
        }
        return valid;
    };
    const checkPrice = () => {
        let valid = false;
        const min = 1, max = 25;
        const amount = price.value.trim();
        if (!isRequired(amount)) {
            showError(price, 'Price field is required.');
        } else if (!isBetween(amount, min)) {
            showError(price, `Price must be greater than or equal ${min}.`)
        } else {
            showSuccess(price);
            valid = true;
        }
        return valid;
    };
    const checkDate = () => {
        let valid = false;
        const date = date_expiration.value.trim();
        if (!isRequired(date)) {
            showError(date_expiration, 'Expiration Date field is required.');
        } else {
            showSuccess(date_expiration);
            valid = true;
        }
        return valid;
    };
    const isValidNumber = (number) => {
        const re = /^\d+(\.\d+)?$/;
        return re.test(number);
    };
    const isPasswordSecure = (password) => {
        const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        return re.test(password);
    };

    const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min) => length < min ? false : true;

    const showError = (input, message) => {
        const formField = input.parentElement;

        formField.classList.remove('success');
        formField.classList.add('error');
        formField.classList.add('is-invalid');

        const error = formField.querySelector('small');
        error.textContent = message;
    };

    const showSuccess = (input) => {
        const formField = input.parentElement;

        formField.classList.remove('error');
        formField.classList.add('success');
        formField.classList.add('is-valid');

        const error = formField.querySelector('small');
        error.textContent = '';
    }
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let isUnitQuantityValid = checkUnitQuantity(),
            isPriceValid = checkPrice(),
            isDateValid = checkDate();

        let isFormValid = isUnitQuantityValid &&
            isPriceValid &&
            isDateValid;

        if (isFormValid) {
            const formData = new FormData(form);
            var unit_quantity_value = formData.get('unit_quantity');
            var price_value = formData.get('price');
            var date_expiration_value = formData.get('date_expiration');
            var ingredient_id_value = formData.get('id');
            var category_id_value = formData.get('category_id');
            console.log(unit_quantity_value);
            console.log(price_value);
            console.log(date_expiration_value);
            console.log(ingredient_id_value);
            console.log(category_id_value);
            console.log('okay');
            $.ajax({
                url: '/ingredients/stocks/a',
                type: 'POST',
                data: {
                    ingredient_id: ingredient_id_value,
                    category_id: category_id_value,
                    unit_quantity: unit_quantity_value,
                    price: price_value,
                    date_expiration: date_expiration_value,
                },
                cache: false,
                success: function (response) {
                    if(response.status_icon == 'success'){
                        document.getElementById('unit_quantity').value = '';
                        document.getElementById('price').value = '';
                        document.getElementById('date_expiration').value = '';
                        window.location.reload();
                        // displayIngredients('/ingredients/ingredient-list-data', category_id_value);
                        alert_no_flash(response.status_text, response.status_icon);
                    }else{
                        alert_no_flash(response.status_text, response.status_icon);
                    }
                }
            });
        }
    });
    const debounce = (fn, delay = 100) => {
        let timeoutId;
        return (...args) => {
            // cancel the previous timer
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            // setup a new timer
            timeoutId = setTimeout(() => {
                fn.apply(null, args)
            }, delay);
        };
    };
    form.addEventListener('input', debounce(function (e) {
        switch (e.target.id) {
            case 'unit_quantity':
                checkUnitQuantity();
                break;
            case 'price':
                checkPrice();
                break;
            case 'date_expiration':
                checkDate();
                break;
        }
    }));
</script>
