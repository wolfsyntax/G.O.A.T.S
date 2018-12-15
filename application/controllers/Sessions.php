<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

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

	}

	public function index(){

		$data["title"] = "Bootswatch Template";
		$data["body"] = "template";

		$this->load->view("layouts/application", $data);

	}

	public function logout(){
		//destroy the whole session
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function forbidden_access(){

		$this->load->view("errors/html/error_403");

	}	
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
	public function test(){

		$data["body"] = "components/template";
		$data["title"] = "161";

		$this->form_validation->set_rules('tx', 'Input', 'trim|required|valid_emails');

		if($this->form_validation->run() == FALSE) {
			$this->load->view("layouts/application",$data);
		} else {
			echo "Validated";
		}



	}
}
?>