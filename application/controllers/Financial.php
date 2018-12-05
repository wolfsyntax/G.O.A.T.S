<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Financial extends CI_Controller {

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


/*	public function index()
*	{
*		$this->load->view("welcome_message");
*	}
*/

	public function __construct(){

		parent::__construct();

		//Controller: Plural (AppController)	
		//Model: Singular (ModelName)

		$this->load->model("Goat_model");

	}

	public function index()
	{
		
	
		$data["title"] = "-";
		$data["body"] = "financials/expense";

		$this->load->view("layouts/application",$data);



	}

	public function purchase()
	{
		
	
		$data["title"] = "-";
		$data["body"] = "financials/purchases";

		$this->load->view("layouts/application",$data);



	}

	public function sales()
	{
		
	
		$data["title"] = "-";
		$data["body"] = "financials/sales";
		$data["goat_record"] = $this->Goat_model->select_applet("goat_profile","status = 'active'");

		$this->load->view("layouts/application",$data);

	}


	public function validate_sales(){

		if($this->session->userdata("username") != ""){
			
			$this->form_validation->set_rules("eartag_id","Tag ID","required|numeric|xss_clean|trim|is_exist[goat_profile.eartag_id]",
				array(
					"required" => "{field} is required",
					"numeric" => "Not a valid {field} provided. Only digits are allowed",
					"is_exist" => "{field} is not existing",
				)
			);

			$this->form_validation->set_rules("date_sold","Date sold","required|xss_clean|trim",
				array(
					"required" => "{field} is required",
				)
			);

			$this->form_validation->set_rules("buyer_name","Buyer Name","required|xss_clean|trim",
				array(
					"required" => "{field} is required",
				)
			);

			$this->form_validation->set_rules("weight","Total Weight","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",

				)
			);

			$this->form_validation->set_rules("amount","Price per Kilo","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
				)
			);

			$this->form_validation->set_rules("purchase_price","Price per kilo","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
				)
			);			

			$this->form_validation->set_rules("purchase_weight","Total Weight","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
				)
			);			


			$this->form_validation->set_rules("description","Description / Notes","xss_clean|trim");			

			
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");


			if($this->form_validation->run() === FALSE){

				self::sales();

			}else{

				if($this->Goat_model->goat_purchase()){
					
					$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;Sales record added.</p>
							</div>
						</div>");

					

				}else{

					$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Failed</strong>&emsp;Sales Record not added.</p>
							</div>
						</div>");
				}

				redirect(base_url()."financial/sales");
			}
		}

	}

	public function validate_purchase(){

		if($this->session->userdata("username") != ""){
			
			$this->form_validation->set_rules("eartag_id","Tag ID","required|numeric|xss_clean|trim|is_unique[goat_profile.eartag_id]",
				array(
					"required" => "{field} is required",
					"numeric" => "Not a valid {field} provided. Only digits are allowed",
					"is_unique" => "{field} is already existing.",
				)
			);

			$this->form_validation->set_rules("tag_color", "Tag Color", "required|xss_clean|trim|alpha_spaces",
				array(
					"required" => "Tag Color is required",
					"alpha_spaces" => "The {field} field may only contain alphabetical characters and space.",
				)
			);

			$this->form_validation->set_rules("goat_gender", "Gender", "required|xss_clean|trim",
				array(
					"required" => "Gender is required",

				)
			);

			$this->form_validation->set_rules("body_color","Body Color","required|xss_clean|trim|alpha_spaces",
				array(
					"required" => "Body Color is required",
					"alpha_spaces" => "The {field} field may only contain alphabetical characters and space.",

				)
			);

			$this->form_validation->set_rules("purchase_date","Purchase Date","required|xss_clean|trim",
				array(
					"required" => "{field} is required",
				)
			);

			$this->form_validation->set_rules("purchase_price","Price per kilo","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
				)
			);			

			$this->form_validation->set_rules("purchase_weight","Total Weight","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
				)
			);			


			$this->form_validation->set_rules("description","Description / Notes","xss_clean|trim");			

			$this->form_validation->set_rules("vendor_name","Vendor Name","required|xss_clean|trim",
				array(
					"required" => "{field} is required",
				)
			);			
			
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");


			if($this->form_validation->run() === FALSE){

				self::purchase();

			}else{

				if($this->Goat_model->goat_purchase()){
					
					$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;New goat added successfully.</p>
							</div>
						</div>");

					

				}else{

					$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;Goat Purchased not added successfully.</p>
							</div>
						</div>");
				}

				redirect(base_url()."financial/purchase");
			}
		}

	}

}
