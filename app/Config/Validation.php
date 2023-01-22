<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\App\Validation\UserRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $users = [
        'first_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'First name'
		],
        'last_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Last name'
		],
        'email_address' => [
			'rules' => 'required|min_length[5]|max_length[100]|valid_email',
			'label' => 'Email Address'
		],
        'username' => [
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[lrfoims_users.username,id,{userID}]',
			'label' => 'Username'
		],
        'password' => [
			'rules' => 'required|min_length[8]|max_length[100]',
			'label' => 'Password'
		],
        'confirm_password' => [
			'rules' => 'matches[password]',
			'label' => 'Confirm Password'
		],
        'role_id' => [
			'rules' => 'required|numeric',
			'label' => 'Role',
			'errors' => [
				'numeric' => '{field} field is required.'
			]
		]    
	];

	public $addRegister = [
        'first_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'First name'
		],
        'last_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Last name'
		],
        'email_address' => [
			'rules' => 'required|valid_email|min_length[5]|max_length[100]|is_unique[lrfoims_users.email_address,id,{userID}]',
			'label' => 'Email Address'
		],
        'username' => [
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[lrfoims_users.username,id,{userID}]',
			'label' => 'Username'
		],
		'contact_number' => [
			'label'  => 'Contact Number',
			'rules'  => 'required|numeric|regex_match[((^(\+)(\d){12}$)|(^\d{11}$))]|is_unique[lrfoims_users.contact_number]',
		],
        'region_id' => [
			'rules' => 'required',
			'label' => 'Region'
		],
        'province_id' => [
			'rules' => 'required',
			'label' => 'Province'
		],
        'city_id' => [
			'rules' => 'required',
			'label' => 'City'
		],
        'addtl_address' => [
			'rules' => 'required',
			'label' => 'House #, Street & Baranggay'
		],
        'password' => [
			'rules' => 'required|min_length[8]|max_length[100]',
			'label' => 'Password'
		],
        'confirm_password' => [
			'rules' => 'matches[password]',
			'label' => 'Confirm Password'
		],
	];

	public $forgotPassword = [
        'email_address' => [
			'rules' => 'required|min_length[5]|max_length[100]|valid_email',
			'label' => 'Email Address'
		],
	];

	public $editProfile = [
        'first_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'First name'
		],
        'last_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Last name'
		],
        'email_address' => [
			'rules' => 'required|valid_email|min_length[5]|max_length[100]',
			'label' => 'Email Address'
		],
        'username' => [
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[lrfoims_users.username,id,{userID}]',
			'label' => 'Username'
		],
		'contact_number' => [
			'label'  => 'Contact Number',
			'rules'  => 'required|numeric|regex_match[((^(\+)(\d){12}$)|(^\d{11}$))]',
		],
        'region_id' => [
			'rules' => 'required',
			'label' => 'Region'
		],
        'province_id' => [
			'rules' => 'required',
			'label' => 'Province'
		],
        'city_id' => [
			'rules' => 'required',
			'label' => 'City'
		],
        'addtl_address' => [
			'rules' => 'required',
			'label' => 'House #, Street & Baranggay'
		],
        'password' => [
			'rules' => 'required|min_length[8]|max_length[100]',
			'label' => 'Password'
		],
        'confirm_password' => [
			'rules' => 'matches[password]',
			'label' => 'Confirm Password'
		],
	];

	public $roles = [
		'role_name' => [
			'rules' => 'required|min_length[3]|max_length[50]|is_unique[lrfoims_roles.role_name,id,{roleID}]',
			'label' => 'Role name',
			'errors' => [
                'is_unique' => 'Role already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
		'landing_page_id' => [
			'rules' => 'required',
			'label' => 'Landing Page'
		]
	];

	public $region = [
		'psgcCode' => [
			'rules' => 'required|numeric',
			'label' => 'psgcCode',
		],
		'region_name' => [
			'rules' => 'required',
			'label' => 'Region Name'
		],
		'region_code' => [
			'rules' => 'required|numeric',
			'label' => 'Region Code'
		]
	];

	public $province = [
		'psgcCode' => [
			'rules' => 'required|numeric',
			'label' => 'psgcCode',
		],
		'province_name' => [
			'rules' => 'required',
			'label' => 'Province Name'
		],
		'region_code' => [
			'rules' => 'required|numeric',
			'label' => 'Region Code'
		],
		'province_code' => [
			'rules' => 'required|numeric',
			'label' => 'Province Code'
		]
	];
	
	public $city = [
		'psgcCode' => [
			'rules' => 'required|numeric',
			'label' => 'psgcCode',
		],
		'city_name' => [
			'rules' => 'required',
			'label' => 'City Name'
		],
		'province_code' => [
			'rules' => 'required|numeric',
			'label' => 'Province Code'
		],
		'city_code' => [
			'rules' => 'required|numeric',
			'label' => 'City Code'
		]
	];
	
	public $barangay = [
		'barangay_code' => [
			'rules' => 'required|numeric',
			'label' => 'psgcCode',
		],
		'barangay_name' => [
			'rules' => 'required',
			'label' => 'Barangay Name'
		],
		'region_code' => [
			'rules' => 'required|numeric',
			'label' => 'Region Code'
		],
		'province_code' => [
			'rules' => 'required|numeric',
			'label' => 'Province Code'
		],
		'city_code' => [
			'rules' => 'required|numeric',
			'label' => 'City Code'
		]
	];
	public $modules = [
		'module' => [
			'rules' => 'required|min_length[4]|max_length[50]|is_unique[lrfoims_modules.module,id,{moduleID}]',
			'label' => 'Module',
			'errors' => [
                'is_unique' => 'Module already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		]
	];

	public $extensions = [
		'extension_name' => [
			'rules' => 'required|min_length[1]|max_length[10]',
			'label' => 'Extension Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
	];

	public $addIngredients = [
		'product_name' => [
			'rules' => 'required|is_unique[lrfoims_products.product_name,id,{id}]',
			'label' => 'Ingredient Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'product_description_id' => [
			'rules' => 'required',
			'label' => 'Ingredient Measure',
			'errors' => [
                'required' => '{field} field is required'      
            ]
		],
		'product_category_id' => [
			'rules' => 'required',
			'label' => 'Ingredient Category',
			'errors' => [
                'required' => '{field} field is required'      
            ]
		],
	];
	
	public $editIngredients = [
		'product_name' => [
			'rules' => 'required',
			'label' => 'Ingredient Name',
		],
		'product_description_id' => [
			'rules' => 'required',
			'label' => 'Ingredient Measure',
			'errors' => [
                'required' => '{field} field is required'      
            ]
		],
		'product_category_id' => [
			'rules' => 'required',
			'label' => 'Ingredient Category',
			'errors' => [
                'required' => '{field} field is required'      
            ]
		],
	];

	public $orderLimit = [
		'max_limit' => [
			'rules' => 'required|numeric',
			'label' => 'Maximum Order',
		],
		'order_type' => [
			'rules' => 'required',
			'label' => 'Order Type',
		],
	];

	public $addStockIngredients = [
		'unit_quantity' => [
			'rules' => 'required|numeric|greater_than[0]|regex_match[[+-]?([0-9]*[.])?[0-9]+]',
			'label' => 'Unit of Measure',
			'errors' => [
				'required' => '{field} field is required',
				'numeric' => '{field} must be number'
			]
		],
		'price' => [
			'rules' => 'required|numeric|greater_than[0]|regex_match[[+-]?([0-9]*[.])?[0-9]+]',
			'label' => 'Amount',
			'errors' => [
				'required' => '{field} field is required',
				'numeric' => '{field} must be number'    
            ]
		],
		'date_expiration' => [
			'rules' => 'required',
			'label' => 'Expiration Date',
			'errors' => [
				'required' => '{field} field is required',
            ]
		],
	];

	public $productCategory = [
		'product_name' => [
			'rules' => 'required',
			'label' => 'Product Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'product_description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description',
		],
	];

	public $ingredientBatchUploadFile = [
		'upload_file' => [
			'rules' => 'uploaded[upload_file]|max_size[upload_file,4096]|ext_in[upload_file,csv,xls,xlsx]',
			'label' => 'Batch Upload File',
		]
	];

	public $menuCategory = [
		'name' => [
			'rules' => 'required',
			'label' => 'Menu Category Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description',
		],
	];

	public $menuIngredient = [
		'menu_id' => [
			'rules' => 'required',
			'label' => 'Menu',
		],
		'ingredient_id' => [
			'rules' => 'required',
			'label' => 'Ingredient',
		],
		'unit_quantity' => [
			'rules' => 'required|numeric|greater_than_equal_to[0]',
			'label' => 'Unit Of Measure',
		],
	];

	public $menu = [
		'image' => [
			'rules' => 'uploaded[image]|max_size[image, 10240]|ext_in[image,png,jpg,gif]|is_image[image]', 
			'label' => 'Image',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'menu' => [
			'rules' => 'required',
			'label' => 'Menu name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'menu_category_id' => [
			'rules' => 'required|numeric',
			'label' => 'Menu Category',
		],
		'price' => [
			'rules' => 'required|numeric|greater_than[0]',
			'label' => 'Price',
		],
	];
	
	public $editmenu = [
		// 'image' => [
		// 	'rules' => 'required|uploaded[image]|max_size[image, 10240]|ext_in[image,png,jpg,gif]|is_image[image]', 
		// 	'label' => 'Image',
		// ],
		'menu' => [
			'rules' => 'required',
			'label' => 'Menu name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'menu_category_id' => [
			'rules' => 'required|numeric',
			'label' => 'Menu Category',
		],
		'price' => [
			'rules' => 'required|numeric|greater_than[0]',
			'label' => 'Price',
		],
	];

	public $addToCartAdmin = [
		'menu_id' => [
			'rules' => 'required',
			'label' => 'Menu',
		],
		'quantity' => [
			'rules' => 'required|numeric|greater_than[0]',
			'label' => 'Quantity',
		],
	];

	public $productStatus = [
		'name' => [
			'rules' => 'required',
			'label' => 'Ingredient Status Name',
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Ingredient Status Description',
		],
	];
 
	public $emailCode = [
		'email_code' => [
			'rules' => 'required|max_length[6]', 
			'label' => 'Email Code',
		],
	];

	public $homeDetails = [
		'restaurant_name' => [
			'rules' => 'required', 
			'label' => 'Restaurant Name',
		],
		'body_desc' => [
			'rules' => 'required', 
			'label' => 'Body Description',
		],
		'footer_desc' => [
			'rules' => 'required', 
			'label' => 'Footer Description',
		],
        'region_id' => [
			'rules' => 'required',
			'label' => 'Region'
		],
        'province_id' => [
			'rules' => 'required',
			'label' => 'Province'
		],
        'city_id' => [
			'rules' => 'required',
			'label' => 'City'
		],
        'addtl_address' => [
			'rules' => 'required',
			'label' => 'House #, Street & Baranggay'
		],
		'contact' => [
			'rules' => 'required|numeric|min_length[11]|max_length[11]', 
			'label' => 'Contact Number',
		],
        'email_address' => [
			'rules' => 'required|min_length[5]|max_length[100]|valid_email',
			'label' => 'Email Address'
		],
		'fb_link' => [
			'rules' => 'required', 
			'label' => 'Facebook Link',
		],
	];
	
	public $productMeasure = [
		'name' => [
			'rules' => 'required',
			'label' => 'Measure Name',
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Measure Description',
		],
	];


	public $addAdminPayment = [
		'c_cash' => [
			'rules' => 'required|numeric',
			'label' => 'Cash Amount',
		],
	];

	public $addAdminOrderNumber = [
		'order_number_id' => [
			'rules' => 'required',
			'label' => 'Order Number',
		],
	];

	public $addOrderToCartInMenuList = [
		'quantity' => [
			'rules' => 'required',
			'label' => 'Quantity',
		],
	];

	public $placeOrderType = [
		'order_type' => [
			'rules' => 'required',
			'label' => 'Order Type',
		],
	];
	
	public $submitOrderToCartInMenuList = [
		'order_type' => [
			'rules' => 'required',
			'label' => 'Order Type',
		],
		'payment_method_id' => [
			'rules' => 'required',
			'label' => 'Payment Method',
		],
	];

	public $permissionTypes = [
		'type' => [
			'rules' => 'required',
			'label' => 'Permission Type'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		]
	];

	public $permissions = [
		'module_id' => [
			'rules' => 'required|numeric',
			'label' => 'Module',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission_type' => [
			'rules' => 'required|numeric',
			'label' => 'Permission Type',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission' => [
			'rules' => 'required',
			'label' => 'Permission'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		],
		'icon' => [
			'rules' => 'required',
			'label' => 'Icon'
		]
	];

	public $image = [
		'receipt' => [
			'rules' => 'uploaded[receipt]|max_size[receipt, 10240]', 
			'label' => 'receipt'
		],
	];

	public $report = [
		'date' => [
			'rules' => 'required',
			'label' => 'Date'
		]
	];

	public $coupon = [
		'name' => [
			'rules' => 'required',
			'label' => 'Name'
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Description'
		],
		'amount' => [
			'rules' => 'required|numeric',
			'label' => 'Amount'
		],
		'expiration_date' => [
			'rules' => 'required',
			'label' => 'Expiration Date'
		],
	];

	public $deliveryFee = [
		'delivery_fee' => [
			'rules' => 'required|numeric',
			'label' => 'Delivery Fee'
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Description'
		],
	];

	public $discount = [
		'customer_type' => [
			'rules' => 'required',
			'label' => 'Customer Type'
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Description'
		],
		'discount_amount' => [
			'rules' => 'required|numeric',
			'label' => 'Discount Amount'
		],
	];

	public $method = [
		'payment_method' => [
			'rules' => 'required',
			'label' => 'Payment Method'
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Description'
		],
	];

	public $vat = [
		'divide_vat' => [
			'rules' => 'required|numeric',
			'label' => 'Divide VAT'
		],
		'multiply_vat' => [
			'rules' => 'required|numeric',
			'label' => 'Multiply VAT'
		],
		'description' => [
			'rules' => 'required',
			'label' => 'Description'
		],
	];
}
