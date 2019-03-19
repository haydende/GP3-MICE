<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	 function __construct()
	{
		parent::__construct();	 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
	}
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('slideshow');
		$this->load->view('home');
		
	}
	
	public function cinema()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		//table name exact from database
		$crud->set_table('cinema');
		
		//give focus on name used for operations e.g. Add Order, Delete Order
		$crud->set_subject('Cinema');
		
		//the columns function lists attributes you see on frontend view of the table
		$crud->columns( 'Cinema_Name', 'Cinema_Location', 'Cinema_Address', 'Cinema_Manager');
	
		//the fields function lists attributes to see on add/edit forms.
		//Note no inclusion of Cinema_ID as this is auto-incrementing
		$crud->fields('Cinema_Name', 'Cinema_Location', 'Cinema_Address', 'Cinema_Manager');
		
		//form validation (could match database columns set to "not null")
		$crud->required_fields('Cinema_ID', 'Cinema_Name', 'Cinema_Location', 'Cinema_Address', 'Cinema_Manager');
		
		//change column heading name for readability ('columm name', 'name to display in frontend column header')
		$crud->display_as('Cinema ID', 'Cinema Name', 'Cinema Location', 'Cinema Address', 'Cinema Manager');
		
		$output = $crud->render();
		$this->cinema_output($output);
	}
	
	function Cinema_output($output = null)
	{
		//this function links up to corresponding page in the views folder to display content for this table
		$this->load->view('cinema_view.php', $output);
	}
	
	
		public function film()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		//table name exact from database
		$crud->set_table('film');
		
		//give focus on name used for operations e.g. Add Order, Delete Order
		$crud->set_subject('Film');
			
		//the fields function lists attributes to see on add/edit forms.
		//Note no inclusion of Cinema_ID as this is auto-incrementing
		$crud->fields('Title', 'Director_ID', 'Year_Release');
		
		$crud->set_relation('Director_ID', 'Director', 'Name');
		
		//form validation (could match database columns set to "not null")
		$crud->required_fields('Title', 'Director_ID', 'Year_Release', 'Cinema_Manager');
		
		//change column heading name for readability ('columm name', 'name to display in frontend column header')
		$crud->display_as('Film_ID', 'Film Number');
		$crud->display_as('Title', 'Film Name');
		$crud->display_as('Director_ID', 'Director Name');
		
		
		$output = $crud->render();
		$this->film_output($output);
	}
	
	function film_output($output = null)
	{
		//this function links up to corresponding page in the views folder to display content for this table
		$this->load->view('film_view.php', $output);
	}


	public function booking()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('booking');
		$crud->set_subject('booking');
		$crud->fields('Booking_ID', 'No_seats', 'Member_ID', 'Performance_ID', 'Film_ID');
		$crud->set_relation('Film_ID', 'Film', 'Title');
		$crud->required_fields('Booking_ID', 'No_seats', 'Member_ID', 'Performance_ID', 'Film_ID');
		$crud->display_as('Booking_ID', 'Booking Number');
		$crud->display_as('No_seats', 'Number of seats');
		$crud->display_as('Member_ID', 'Member ID');
		$crud->display_as('Performance_ID', 'Performance ID');
		$crud->display_as('Film_ID', 'Film ID');
		
		$output = $crud->render();
		$this->booking_output($output);
	}
	
	function booking_output($output = null)
	{
		$this->load->view('booking_view.php', $output);
	}
	
	public function querynav()
	{	
		$this->load->view('header');
		$this->load->view('querynav_view');
	}
	
	public function login_view()
	{
		$this->load->view('header');
		$this->load->view('login_view');
	}
		
	public function query1()
	{	
		$this->load->view('header');
		$this->load->view('query1_view');
	}
	
	public function query2()
	{	
		$this->load->view('header');
		$this->load->view('query2_view');
	}
	
	public function blank()
	{	
		$this->load->view('header');
		$this->load->view('blank_view');
	}
}


	//original orders functions below - commented out so it can be used for future reference
	
	// public function items()
	// {	
		// $this->load->view('header');
		// $crud = new grocery_CRUD();
		// $crud->set_theme('datatables');
		
		// $crud->set_table('items');
		// $crud->set_subject('item');
		// $crud->columns('itemID', 'itemDesc', 'orders');
		// $crud->fields('itemDesc', 'orders');
		// $crud->required_fields('itemID', 'itemDesc');
		// $crud->set_relation_n_n('orders', 'order_items', 'orders', 'item_id', 'invoice_no', 'invoiceNo');
		// $crud->display_as('itemDesc', 'Description');
		
		// $output = $crud->render();
		// $this->items_output($output);
	// }
	
	// function items_output($output = null)
	// {
		// $this->load->view('items_view.php', $output);
	//}
	
	
	// public function orderline()
	// {	
		// $this->load->view('header');
		// $crud = new grocery_CRUD();
		// $crud->set_theme('datatables');
		// $crud->set_table('order_items');
		// $crud->set_subject('order line');
		// $crud->fields('invoice_no', 'item_id', 'itemQty', 'itemPrice');
		// $crud->set_relation('invoice_no','orders','invoiceNo');
		// //have multiple columns show in one FK column by concatenation:  www.grocerycrud.com/forums/topic/479-concatenate-two-or-more-fields-into-one-field/
		// $crud->set_relation('item_id','items','{itemID} - {itemDesc}');
		// $crud->required_fields('invoice_no', 'item_id', 'itemQty', 'itemPrice');
		// $crud->display_as('invoice_no', 'InvoiceNo');
		// $crud->display_as('item_id', 'ItemID');
		// $crud->display_as('itemQty', 'Quantity');
		// $crud->display_as('itemPrice', 'Price');
		
		// $output = $crud->render();
		// $this->orderline_output($output);
	// }
		
	// function orderline_output($output = null)
	// {
		// $this->load->view('orderline_view.php', $output);
	//}
