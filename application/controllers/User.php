<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
*		$this->load->view('welcome_message');
*	}
*/
	public function __construct(){
		parent::__construct();

		//Controller: Plural (AppController)
		//Model: Singular (ModelName)

//		$this->load->library('form_validation');
		$this->load->model("User_model");
//		$this->load->driver(");

		$config["protocol"] 	= "smtp";
		$config["smtp_host"]	= "ssl://smtp.googlemail.com";
		$config["smtp_port"] 	= 465;
		$config["smtp_user"] 	= "mail.goats@gmail.com";
		$config["smtp_pass"] 	= "09365621593";
		$config["mailtype"]		= "html";
		$config["charset"] 		= "utf-8";

		$this->email->initialize($config);
		$this->email->set_newline('\r\n');

		$this->send_email();
		
	}

	public function index()
	{
		
		if($this->session->userdata("username") != ""){
			
			redirect("dashboard");

		}else{

			$data["title"] = "Home";
			$data["body"] = "sitemaps/index";
			$this->load->view("layouts/application", $data);

		}

	}

	public function edit_account(){
		
		if($this->session->userdata('username')){
			
			$data["title"] = "Account Settings";
			$data["body"] = "users/edit_profile";
			
			$this->load->view("layouts/application", $data);

		}else{

			redirect(base_url());

		}

	}

	public function confirm_change_info(){

		
		if($this->session->userdata("username")){	

			$this->form_validation->set_rules("phone", "Mobile number", "required|min_length[11]|max_length[13]|trim|xss_clean", array(
					"required" => "Mobile number is required",
					"min_length[11]" => "Mobile number must contain atleast 11 digit",
					"max_length[13]" => "Mobile number must contain atleast 12 digit and a plus '+' sign",
				)
			);

			$this->form_validation->set_rules("last_name", "Last name", "required|min_length[2]|max_length[128]|trim|xss_clean", array(
					"required" => "Last name is required",
					"min_length[2]" => "Last name must contain at least two (2) letters",
					"max_length[128]"	=> "Last name exceeds the allowable length",
				)
			);

			$this->form_validation->set_rules("first_name", "First name", "required|trim|xss_clean",
				array("required" => "First name is required",)
			);

			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");
			
			if ($this->form_validation->run() == FALSE){

				$this->edit_account();

			}else{

				if($this->User_model->confirm_change()){
					$this->session->set_flashdata("item", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
										<div class='row'>
											<p><span class='fa fa-check-circle'></span>
						<strong>Success</strong>&emsp;Modified account details.</p>
										</div>
									</div>");

					redirect("dashboard");

				}else{

					$this->edit_account();
			
				}
				


			}

		} else { 

			redirect(base_url());

		}
	}



	public function confirm_change_pass(){

		if($this->session->userdata("username")){

			$this->form_validation->set_rules(
				"passwd", "Password", "required|min_length[6]|trim|xss_clean",
				array(
					"required" => "Password is required",
					"min_length[6]" => "Password must contain atleast six (6) alpha numeric characters"
				)
			);

			$this->form_validation->set_rules(
				"conf_passwd", "Confirm Password", "required|matches[passwd]|xss_clean",
				array(
					"required" => "Password is required",
					"matches['password']" => "Confirmation Password does not match",
				)
			);	

			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() == FALSE){

				$this->edit_account();

			}else{

				if($this->User_model->confirm_change(1)){

					$this->session->set_flashdata("item", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
										<div class='row'>
											<p><span class='fa fa-check-circle'></span>
						<strong>Success</strong>&emsp;Changing Password</p>
										</div>
									</div>");

					redirect("dashboard");

				}else{

					$this->edit_account();
			
				}
				


			}

		}else{

			redirect(base_url());

		}
	}

	public function register()
	{


		if($this->session->userdata("username") == ""){
			
			$data["title"] = "Register";
			$data["body"] = "users/register";

			$this->load->view("layouts/application",$data);

		}else{

			redirect("dashboard");

		}

	}


	public function verify_signup()
	{
		
		$this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user_account.Username]|xss_clean|min_length[8]|max_length[255]",
			array(
				"required" => "{field} is required",
				"is_unique" => "{field} is already taken",
				"min_length[8]" => "{field} must contain atleast 8 alphanumeric characters",
			)
		);

		$this->form_validation->set_rules("passwd", "Password", "required|min_length[6]|trim|xss_clean",
			array(
				"required" => "Password is required",
				"min_length[6]" => "Password must contain atleast six (6) alpha numeric characters",
			)
		);

		$this->form_validation->set_rules("phone", "Mobile number", "required|min_length[11]|max_length[13]|trim|xss_clean",
			array(
				"required" => "{field} is required",
				"min_length[11]"	=> "{field} must contain atleast 11 digit number",
				"max_length[13]"	=> "{field} must contain up to 12 digit and a plus sign '+'",
			)
		);

		$this->form_validation->set_rules("last_name", "Last name", "required|min_length[2]|max_length[255]|trim|xss_clean", array(
				"required" => "Last name is required",
				"min_length[2]" => "Last name must contain at least two (2) letters",
				"max_length[255]" => "{field} exceeds the allowable characters",
			)
		);

		$this->form_validation->set_rules("first_name", "First name", "required|trim|min_length[2]|max_length[255]|xss_clean", array(
				'required' => 'First name is required',
				'min_length[2]'	=> '{field} must contain atleast 2 characters from a-z',
				"max_length[255]" => "{field} exceeds the allowable characters",
			)
		);


		$this->form_validation->set_rules(
			"conf_passwd", "Confirm Password", "required|matches[passwd]|min_length[8]|xss_clean", array(
				"required" => "{field} is required",
				"matches['password']" => "{field} does not match",
				"min_length[8]"	=> "{field} must contain atleast 8 characters",
			)
		);	


		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		if ($this->form_validation->run() == FALSE){

			self::register();

		}else{

			if($this->User_model->process_registration()){

				$this->session->set_flashdata("item", "<div class='alert alert-success' role='alert' style='height: 50px;'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row'>
										<p><span class='fa fa-check-circle'></span>
					<strong>Success</strong>&emsp;Account created</p>
									</div>
								</div>");


				$this->email->from("mail.goats@gmail.com", "G.O.A.T.S");

				$this->email->to($this->session->userdata("user_email"));
				$this->email->subject("Your account using this email $(this->session->userdata('user_email')), has been created");
				$this->email->message("<h1>Congratulation!</h1><br/>You are now part of our community. Feel free to use our system<br/><a href='https://www.facebook.com/wolf.syntax'>- Wolf Syntax</a>");
				
				if($this->email->send()){

					echo "<script>alert('Email Sent');</script>";

				}else{

					echo "<script>alert('Error: Email Not Sent');</script>";

				}
				

				redirect("login");

			}else{

				self::register();
		
			}
			


		}

	}	

	public function login()
	{

		php_uname('n');


		//echo validation_errors('<span class="error">', '</span>');
		if($this->session->userdata("username") == ""){
			
			$data["title"] = "Login";
			$data["body"] = "users/login";	

			$this->load->view("layouts/application", $data);

		}else{

			redirect("dashboard");

		}
	}

	public function validate_login(){

		$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean", array(
			'required' => '{field} is required',
			'xss_clean' => '{field} is not valid',
		));

		$this->form_validation->set_rules("passwd", "Password", "trim|required|xss_clean", array(
			"required" => "{field} is required",
			"xss_clean" => "{field} is not valid",
		));

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		$data["title"] = "Login";
		$data["body"] = "users/login";
		
		if ($this->form_validation->run() == FALSE){

			$this->load->view("layouts/application", $data);

		} else {

			if($this->User_model->validate_login()){

				$this->email->send();
		
				redirect('dashboard');

			} else {

				$this->session->set_flashdata("item", "<div class='alert alert-danger' role='alert' style='height: 50px;''>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row'>
										<p><span class='fa fa-exclamation-triangle'></span>
					<strong>Invalid</strong>&emsp;Username or Password</p>
									</div>
								</div>");

				self::login();
				//$this->load->view('layouts/application',$data);

			}
			


		}

	}

	public function forgot_pass(){


		$data["title"] 	= "Forgot Password | Can't Log In ";
		$data["body"] 	= "users/forgot";
		
		$this->load->view("layouts/application", $data);

	}

	public function reset_pass(){

		if($this->session->userdata("email")){
			
			$data["title"] 	= "Reset Password | Can't Log In ";
			$data["body"] 	= "users/forgot_confirmation";			
			$data["email"]	= $this->session->userdata("email");

			$this->load->view("layouts/application", $data);

		}else{

			$this->session->unset_userdata("email");

			redirect(base_url()."forgot");

		}

	}

	public function change_pass(){

		$this->form_validation->set_rules(
			"passwd", "Password", "required|min_length[8]|trim|xss_clean", array(
				"required" => "Password is required",
				"min_length[8]" => "Password must contain atleast eight (8) alpha numeric characters"
			)
		);

		$this->form_validation->set_rules(
			"conf_passwd", "Confirm Password", "required|matches[passwd]|xss_clean", array(
				"required" => "Password is required",
				"matches['passwd']" => "Confirmation Password does not match",
			)
		);		

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");


		if ($this->form_validation->run() == FALSE){

			self::reset_pass();

		} else {

			if($this->User_model->confirm_change(2)){
				
				redirect(base_url()."login");

			} else {

				self::reset_pass();

			}
		}

	}

	public function cancel(){

		$this->session->unset_userdata("email");
		redirect(base_url()."login");

	}

	public function send_pass(){

		$this->form_validation->set_rules("forgot_info", "Email", "trim|required|valid_email|is_exist[user_account.Email]|xss_clean", array(
			"required" => "{field} is required",
			"is_exist" => "{field} is not registered",
			"xss_clean" => "{field} is not valid",
		));


		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		if ($this->form_validation->run() == FALSE){

			self::forgot_pass();

		}else{

			$this->session->unset_userdata("email");
			$this->session->set_userdata("email", $this->input->post("forgot_info"));

			redirect(base_url()."forgot/reset");

		}
	}	

	public function send_email(){
		//echo gethostname(); // may output e.g,: sandie
		// Or, an option that also works before PHP 5.3
		//echo php_uname('n'); // may output e.g,: sandie
		$timestamp = Carbon\Carbon::now();

		$date = Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $timestamp, "Asia/Manila");
		//$date->setTimezone('Asia/Singapore');
	//	$date->addSeconds(25200);

		$this->email->from("mail.goats@gmail.com", "G.O.A.T.S");

		$this->email->to("jaysonalpe@gmail.com");

		$this->email->subject("Access Login");
				
		$this->email->message("<h1>Alert!</h1><br/>Computer Name: ". php_uname('n') ."<br/>Timestamp: ". $date ."<br/>Username: ". $this->session->userdata("username"). "<br/>". $this->session->userdata("username"). "<br/><a href='https://www.facebook.com/wolf.syntax'>Admin</a>");
				
	}
}
