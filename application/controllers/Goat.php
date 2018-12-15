<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**

		must be at least _ characters in length.								- min_length
		cannot exceed _ characters in length.									- max_length
		must contain only numbers.												- numeric
		must contain a decimal number.											- decimal
		must contain an integer.												- integer
		is required.															- required
		must be exactly _ characters in length.									- exact_length
		must contain a number less than _.										- less_than
		must contain a number less than or equal to _.							- less_than_equal_to
		must contain a number greater than or equal to _.						- greater_than_equal_to
		must contain a number greater than _.									- greater_than
		must be one of: _,_,_.													- inlist[_,_,_]
		may only contain alphabetical characters.								- alpha
		may only contain alpha-numeric characters.								- alpha_numeric
		may only contain alpha-numeric characters and spaces.					- alpha_numeric_spaces
		may only contain alpha-numeric characters, underscores, and dashes.		- alpha_dash
		must contain a valid IP.												- valid_ip
		must contain a valid email address.										- valid_email
		must contain all valid email addresses.									- valid_emails

	**/

/*	public function index()
*	{
*		$this->load->view('welcome_message');
*	}
*/

	public function __construct(){

		parent::__construct();

		//Controller: Plural (AppController)	
		//Model: Singular (ModelName)

		$this->load->model('Goat_model');

	}

	public function view_goat(){

		if($this->session->userdata('username') != ''){

			$data['title'] = 'Add Goats';
				
			$data['body'] = 'goats/goat_table';

			$this->load->view('layouts/application',$data);

		}else{

			show_404();

		}

	}

	public function index()
	{
		
		if($this->session->userdata('username') != ''){
			
			$data['title'] = 'Add Goats';
			
			$data['body'] = 'goats/add_goats';

			$data['sire_record'] = $this->Goat_model->show_record('goat_profile',"gender = 'male'");

			$data['dam_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'female'");

			$this->load->view('layouts/application',$data);

		}else{

			redirect('dashboard');

		}

	}

	public function add_goats(){

		$data["title"] = "-";
		$data["body"] = "financials/purchases";

		$this->load->view('layouts/application',$data);

	}

	public function validate_goat_details($category = ""){

		if($this->session->userdata('username') != ''){
			
			$this->form_validation->set_rules('eartag_id','Tag ID','required|integer|xss_clean|trim|is_unique[goat_profile.eartag_id]',
			array(
				'required' => '{field} is required',
				'integer' => '{field} must contain an integer',
				'is_unique' => '{field} is already existed',
				)
			);

			$this->form_validation->set_rules('eartag_color','Tag Color','required|xss_clean|trim|alpha_spaces',
				array(
					'required' => '{field} is required',
					'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',
				)
			);

			$this->form_validation->set_rules('gender','Gender','required|xss_clean|trim|alpha_spaces',
				array(
					'required' 	=> '{field} is required',
					'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',
				)
			);

			$this->form_validation->set_rules('body_color','Body Color','required|xss_clean|trim|alpha_spaces',
				array(
					'required' => 'Body Color is required',
					'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',

				)
			);

			if($category === "birth"){

				$this->form_validation->set_rules('birth_date','Birth Date','required|xss_clean|trim|check_date',
					array(
						'required' => "{field} is required",
						"check_date"	=> "{field} is set incorrectly"
					)
				);
		
				$this->form_validation->set_rules('sire_id','Sire ID','xss_clean|trim|integer|is_sire_exist[goat_profile.eartag_id]',
					array(
						'required' => '{field} is required',
						'is_sire_exist' => '{field} do not exist',
						"numeric" => "must contain only numbers.",	
					)
				);

				$this->form_validation->set_rules('dam_id','Dam ID','xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]',
					array(
						'required' => '{field} is required',
						'is_dam_exist' => '{field} do not exist',
						"*"
					)
				);

			} else if($category === "purchase") {
		
				$this->form_validation->set_rules('purchase_weight','Weight Purchase','xss_clean|trim|numeric',
					array(
						'required' 	=> '{field} is required',
						"numeric" => "must contain only numbers.",	
					)
				);

				$this->form_validation->set_rules('purchase_price','Purchased Price','xss_clean|trim|numeric',
					array(
						'required' => '{field} is required',
						'is_dam_exist' => '{field} must be a digit',
						"numeric" => "must contain only numbers.",	
					)
				);

				$this->form_validation->set_rules('purchase_date','Purchased Date','xss_clean|trim|check_date',
					array(
						'required' => '{field} is required',
						"check_date"	=> "{field} is set incorrectly"
					)
				);

				$this->form_validation->set_rules('purchase_from','Vendor','xss_clean|trim');


			}

			$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');

			if($this->form_validation->run() === FALSE){
				if($category == "birth"){
					self::index();
				}else{

					self::add_goats();

				}

			}else{

				if($this->Goat_model->add_goat($category) > 0){
						
					$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
											
								<div class="row">
									<p><span class="fa fa-check-circle"></span>
									<strong>Success</strong>&emsp;New goat added successfully.</p>
								</div>
							</div>');

						

				}else{

					$this->session->set_flashdata('goat', '<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
											
						<div class="row">
							<p><span class="fa fa-exclamation-circle"></span>
							<strong>Failed</strong>&emsp;Error: Cannot Add Goat.</p>
						</div>
					</div>');
				}

				self::add_goats();
			}
		}

	}

	public function goat_profile_validator($category){


	}
	/**
	 * Breeding Module
	 *
	 * Description... Line 1
	 * Description... Line 2
	 * Description... Line End
	 *
//	 * @param	mixed	$field
//	 * @param	string	$label
//	 * @param	mixed	$rules
//	 * @param	array	$errors
//	 * @return	CI_Form_validation
	 */

	public function breeding_module()
	{
		


		if($this->session->userdata('username') != ''){
			
			$data['title'] = 'Goat Breeding';
			$data['body'] = 'goats/breeding';
			$data['sire_record'] = $this->Goat_model->show_record('goat_profile',"gender = 'male'");
			$data['breeding_attempt'] = $this->Goat_model->show_record('breeding_record');
			$data['dam_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'female'");

			$this->load->view('layouts/application',$data);

		}else{

			redirect('dashboard');

		}

	}

	public function validate_breeding_info()
	{

		if($this->session->userdata('username') != ''){
			
			$this->form_validation->set_rules('eartag_id','Dam ID','required|xss_clean|trim|numeric|is_dam_exist[goat_profile.eartag_id]',
				array(
					'required' => 'Dam ID is required',
					'is_dam_exist' => 'Do not exist as a {field}',
					"integer" => "must contain an integer.",	
				)
			);

			$this->form_validation->set_rules('partner_id','Sire ID','required|xss_clean|trim|numeric|is_sire_exist[goat_profile.eartag_id]',
				array(
					'required' => 'Sire ID is required',
					'is_sire_exist' => 'Sire do not exist',
					"integer" => "must contain an integer.",	
				)
			);

			$this->form_validation->set_rules('perform_date','Breed Date','required|xss_clean|trim|check_date',
				array(
					'required' => 'Breed Date is required',
					"check_date"	=> "{field} is set incorrectly",
 				)
			);

			$this->form_validation->set_rules('remarks','Remarks','xss_clean|trim');

			$this->form_validation->set_rules('is_pregnant','Is Pregnant','xss_clean|trim');

			$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');

			if($this->form_validation->run() === FALSE){

				self::breeding_module();

			}else{
				
				$message = '';						
				$flag = 0;		
				if($this->Goat_model->breeding_record()){

					$message = '<span class="fa fa-check-circle"></span>
						<strong>Success</strong>&emsp; Breeding record added';
					
					$flag = 1;

				}else{

					$message = '<span class="fa fa-exclamation-circle"></span>
						<strong>Failed</strong>&emsp; Breeding Record already existed';

				}

				

				$content = '<div class="alert '.($flag === 1 ? 'alert-success' : 'alert-danger').' col-12" role="alert" style="height: 50px;">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button><div class="row">
											<p>'. $message . '</p>
										</div>
									</div>';

				
				$this->session->set_flashdata('goat', $content);

				self::breeding_module();

			}


		}else{

			redirect('dashboard');

		}

	}	

	public function manage_loss(){
		
		if($this->session->userdata('username') != ''){
			$data['body'] = 'goats/manage_loss';
			$data['title'] = '';
			$data['goat_record'] = $this->Goat_model->show_record("goat_profile","status = 'active'");

			$this->load->view('layouts/application',$data);

		}else{
			show_404();
		}

	}

	public function record_loss(){

		self::manage_loss_validator();

		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
		
		if($this->form_validation->run() === FALSE){

			self::manage_loss();

		}else{

			$flag = 0;

			if($this->Goat_model->manage_loss()){

				$message = '<span class="fa fa-check-circle"></span>
						Loss Details successfully added';
				
				$flag = 1;

			}else{

				$message = '<span class="fa fa-exclamation-circle"></span>
						Failed to add Loss Details';

			}


			$content = '<div class="alert '.($flag === 1 ? 'alert-success' : 'alert-danger').' col-12" role="alert" style="height: 50px;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
	<div class="row">
		<p>'. $message . '</p>
	</div>
</div>';	

			self::manage_loss();

		}
	}

	public function manage_loss_validator(){

		$this->form_validation->set_rules('eartag_id', 'Tag ID', 'trim|required|numeric|is_exist[goat_profile.eartag_id]|xss_clean',array(
			'is_exist' => '{field} do not exist',
			'required' => '{field} is required',
			"integer" => "must contain an integer",	
		));

		$this->form_validation->set_rules('cause', 'Caused of Loss', 'trim|required|xss_clean|manage_option',array(
			'required' 			=> '{field} is required',
			"manage_option"		=> "{field} is not a valid option",

		));

		$this->form_validation->set_rules('perform_date', 'Date of Loss', 'trim|required|xss_clean|check_date',array(
			'required' => '{field} is required',
			"check_date"	=> "{field} is set incorrectly",
		));


		$this->form_validation->set_rules('remarks', 'Notes / Description', 'trim|xss_clean|required',array(
			'required' => '{field} is required',
		));
		
		
	}

	public function manage_option($str){
		switch ($str) {
			case "Deceased":
			case "Lost":
			case "Stolen":

				return TRUE;
			
			default:
				return FALSE;
		}
	}

	public function goat_sales(){
		
		$this->form_validation->set_rules('price_per_kilo', 'Price per Kilo', 'trim|required|numeric',
			array(
				"required" 	=> "{field} is required",
				"numeric" => "must contain only numbers.",	 
			)
		);

		$this->form_validation->set_rules('purchase_weight', 'Purchase Weight', 'trim|required|numeric',
			array(
				"required"	=> "{field} is required",
				"numeric" => "must contain only numbers.",	
			)
		);

		$this->form_validation->set_rules('transact_date', 'Date Sold', 'trim|required|check_date',
			array(
				"required"		=> "{field} is required",
				"check_date"	=> "{field} is set incorrectly"
			)
		);

		$this->form_validation->set_rules('sold_to','Buyer Name','required|xss_clean|trim|name_check',
			array(
				'required' 		=> '{field} is required',
				"name_check"	=> "{field} is not a valid name",
 			)
		);

		$this->form_validation->set_rules('remarks','Remarks',"xss_clean|trim");

		$this->form_validation->set_rules('eartag_id', 'Tag ID', 'trim|required|numeric|is_exist[goat_profile.eartag_id]|xss_clean',array(
			'is_exist' => '{field} do not exist',
			'required' => '{field} is required',
		));
	}
}
