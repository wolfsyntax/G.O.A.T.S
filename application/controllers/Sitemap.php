<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#if (defined('BASEPATH') && !($this->input->is_ajax_request()))
#   exit('No direct script access allowed'); 

class Sitemap extends CI_Controller {

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
//	


	public function __construct(){
		parent::__construct();

		//Controller: Plural (AppController)
		//Model: Singular (ModelName)
		


	}

	public function index()
	{
			
		$data["title"] = "Home";
		$data["body"] = "sitemaps/index";
				
	
		if($this->session->userdata('username') != ''){
			
			redirect('dashboard');

		}else{

			$this->load->view("layouts/application", $data);

		}

	}


	public function landing_page(){

		$data["title"] = "";
		$data["body"] = "sitemaps/welcome";

		$this->load->view("layouts/application", $data);

	}

	public function dashboard(){
		
		if($this->session->userdata("username") != ""){
			
			
			$data["title"] = "Dashboard";
			$data["body"] = "sitemaps/dashboard";

			$this->faker = Faker\Factory::create();
			
			//Working Carbon
			$data["test"] = Carbon\Carbon::now();
			//$data['test'] = php_uname('n'); // may output e.g,: sandie

			$this->load->view("layouts/application", $data);
			
		} else {

			redirect(base_url());

		}

	}

	public function about()
	{

		$data["title"] = "About";
		$data["body"] = "sitemaps/about";

		$this->load->view("layouts/application", $data);

	}

	public function page_not_found(){

		$data["title"] = "Error 404 (Not Found)!!";
		$data["body"] = "sitemaps/404";

		$this->load->view("layouts/application", $data);	
		
	}

	public function generate_report(){

		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$data["rows"] = ""; //contains the query results

		$html = $this->load->view('',$data, true); // replace '' with your view that is used in displaying the html for generating PDF

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper("A4", "landscape"); //Paper Size: legal, letter, a4, etc,.

		// Render the HTML as PDF
		$dompdf->render();

		// Get the generated PDF file contents
		$pdf = $dompdf->output();

		// Output the generated PDF to Browser
		//$dompdf->stream();
		$dompdf->stream("T" .md5(time()). ".pdf", array("Attachment" => 0)); //output filename

	}


}
