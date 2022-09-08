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
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[frbs_users.username,id,{userID}]',
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

	public $roles = [
		'role_name' => [
			'rules' => 'required|min_length[3]|max_length[50]|is_unique[frbs_roles.role_name,id,{roleID}]',
			'label' => 'Role name',
			'errors' => [
                'is_unique' => 'Role already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		]
	];

	public $modules = [
		'module' => [
			'rules' => 'required|min_length[5]|max_length[50]|is_unique[frbs_modules.module,id,{moduleID}]',
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

	public $students = [
		'student_number' => [
			'rules' => 'required|max_length[15]|is_unique[frbs_students.student_number,id,{studentID}]',
			'label' => 'Student Number',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'last_name' => [
			'rules' => 'required|min_length[2]|max_length[50]',
			'label' => 'Last Name'
		],

		'first_name' => [
			'rules' => 'required|min_length[3]|max_length[50]',
			'label' => 'First Name'
		],

		'middle_name' => [
			'rules' => 'max_length[50]',
			'label' => 'Middle Name'
		],

		'email_address' => [
			'rules' => 'required|min_length[5]|max_length[50]|valid_email',
			'label' => 'Email Address'
		],

		'contact_number' => [
			'rules' => 'required|min_length[9]|max_length[50]|numeric',
			'label' => 'Contact Number'
		],

		'facebook_account' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Facebook Account'
		],

		'extension_name_id' => [
			'rules' => 'numeric',
			'label' => 'Extension Name',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'year_id' => [
			'rules' => 'required|numeric',
			'label' => 'Year Level',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
		
		'course_id' => [
			'rules' => 'required|numeric',
			'label' => 'Course',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],

		'organization_id' => [
			'rules' => 'required|numeric',
			'label' => 'Course',
			'errors' => [
				'numeric' => '{field} field is required'
			]
		],
	];

	public $ingredients = [
		'product_name' => [
			'rules' => 'required',
			'label' => 'Product Name',
			'errors' => [
                'is_unique' => '{field} already exist'      
            ]
		],
		'product_category_id' => [
			'rules' => 'required',
			'label' => 'Product Category',
			'errors' => [
                'required' => '{field} field is required'      
            ]
		],
		'unit' => [
			'rules' => 'required|numeric',
			'label' => 'Unit Number',
			'errors' => [
				'required' => '{field} field is required',
				'numeric' => '{field} must be number'
			]
		],
		'quantity' => [
			'rules' => 'required|numeric',
			'label' => 'Quantity',
			'errors' => [
				'required' => '{field} field is required',
				'numeric' => '{field} must be number'
			]
		],
		'product_description_id' => [
			'rules' => 'required',
			'label' => 'Description',
		],
		'price' => [
			'rules' => 'required|numeric',
			'label' => 'Price',
			'errors' => [
				'required' => '{field} field is required',
				'numeric' => '{field} must be number'    
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
			'rules' => 'required|numeric',
			'label' => 'Price',
		],
	];

	public $addToCartAdmin = [
		'menu_id' => [
			'rules' => 'required',
			'label' => 'Menu',
		],
		'quantity' => [
			'rules' => 'required|numeric',
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
 
	public $orderNumbers = [
		'number' => [
			'rules' => 'required|numeric|is_unique[lrfoims_order_numbers.number,{number}]',
			'label' => 'Order Number',
			'errors' => [
				'is_unique' => '{field} already exist'      
			]
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
		'facility_id' => [
			'rules' => 'numeric',
			'label' => 'Facility'
		],
		'starting_date' => [
			'rules' => 'required',
			'label' => 'Start Date'
		],
		'ending_date' => [
			'rules' => 'required',
			'label' => 'End Date'
		],
	];

}
