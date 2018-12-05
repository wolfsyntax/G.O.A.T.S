<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Goat_model extends CI_Model {

		public function __construct(){

			parent::__construct();
			//$this->load->dbforge();
			
		}

		public function select_applet( $table_name, $where="",  $field = "*"){
			
			if($field != '*')
				$this->db->select($field);
			
			if($where){
				$this->db->where($where);
			}

			return $this->db->get($table_name)->result();

		}

		public function add_goat(){

			if(!empty($_POST)){
				$gender = strtolower($this->input->post('gender', TRUE));
				$data = array(

					'eartag_id'		=>	$this->input->post('eartag_id', TRUE),
					'eartag_color'	=>	strtolower($this->input->post('tag_color', TRUE)),
					'gender'		=>	$gender,
					'body_color'	=>	strtolower($this->input->post('body_color', TRUE)),
					'birth_date'	=>	$this->input->post('birth_date', TRUE),
					'birth_weight'	=>	$this->input->post('birth_weight', TRUE),
					'sire_id'		=>	$this->input->post('sire_id',TRUE),
					'dam_id'		=>	$this->input->post('dam_id',TRUE),
					'is_castrated'  =>  $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					'status'		=> 'active',
				);		

				return $this->db->insert("goat_profile",$data);

			}
			
		}			

		public function goat_purchase(){
			if(!empty($_POST)){

				$gender = strtolower($this->input->post('gender', TRUE));
				$data_profile = array(

					'eartag_id'		=>	$this->input->post('eartag_id', TRUE),
					'eartag_color'	=>	strtolower($this->input->post('tag_color', TRUE)),
					'gender'		=>	$gender,
					'body_color'	=>	strtolower($this->input->post('body_color', TRUE)),
					'is_castrated'  =>  $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					'status'		=> 'active',
				);		

				$data_purchase = array(
					'eartag_id' => $this->input->post('eartag_id',TRUE),
					'purchase_weight' => $this->input->post('purchase_weight',TRUE),
					'price_per_kilo' => $this->input->post("purchase_price",TRUE),
					'purchase_date' => $this->input->post("purchase_date",TRUE),
					'description' => $this->input->post("description",TRUE),
					'user_id' => $this->session->userdata("user_id"),
					'vendor_name' => $this->input->post("vendor_name",TRUE),
				);

				if($this->db->insert("goat_profile",$data_profile)){
					
					return $this->db->insert("purchase_record",$data_purchase);

				}else{

					return FALSE;
					
				}

			}
			
		}

		public function process_registration(){

			if(!empty($_POST)){
				
				$gender = strtolower($this->input->post('gender', TRUE));

				$data = array(

					'eartag_id'		=>	$this->input->post('eartag_id', TRUE),
					'eartag_color'	=>	strtolower($this->input->post('tag_color', TRUE)),
					'gender'		=>	$gender,
					'body_color'	=>	strtolower($this->input->post('body_color', TRUE)),
					'birth_date'	=>	$this->input->post('birth_date', TRUE),
					'sire_id'		=>	$this->input->post('sire_id',TRUE),
					'dam_id'		=>	$this->input->post('dam_id',TRUE),
					'is_castrated' 	=> 	$gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
				);
				


				return $this->db->insert("goat_profile",$data);

			}
				
		}

	
		public function add_breeding_record(){

			if(!empty($_POST)){
				
				$dam = $this->input->post('dam_id', TRUE);
				$sire = $this->input->post('sire_id', TRUE);
				$breeding_date = $this->input->post('breed_date', TRUE);

				$data = array(

					'dam_id' =>	$dam,
					'sire_id'	=>	$sire,
					'breeding_date'	=>	$breeding_date,
					'notes'	=>	$this->input->post('description', TRUE),

				);
				
				$this->db->where('dam_id = ',$dam);
				$this->db->where('sire_id = ',$sire);
				$this->db->where('breeding_date = ',$breeding_date);
				$query = $this->db->get('breeding_record');

				if($query->num_rows() === 0){

					return $this->db->insert('breeding_record',$data);

				}else{

					return FALSE;
				}

			}

		}

		public function goat_sales(){

			if(!empty($_POST)){

				$tag_id = $this->input->post('eartag_id', TRUE);

				$data = array(
					'eartag_id' => $tag_id,
					'status' => "Sold",
				);

				$this->db->where('eartag_id',$tag_id);

				if($this->db->update('goat_profile',$data)){
					
					$amount = $this->input->post("amount", TRUE);
					$data = array(
						'eartag_id' => $tag_id,
						'price_per_kilo' => $amount,
						'transact_date' => $this->input->post("date_sold", TRUE),
						'buyer_name' => $this->input->post("buyer_name", TRUE),
						'weight' => $this->input->post("weight", TRUE),
						'total_amount' => (floatval($amount) * floatval($weight)),
						'user_id' => $this->session->userdata('user_id'),
						'description' => $this->input->post("description", TRUE),
					);

					return $this->db->insert('sales_record',$data);
				}

				return FALSE;
			}

		}

		public function manage_loss(){

			if(!empty($_POST)){
				
				$tag_id = $this->input->post('eartag_id', TRUE);

				$data = array(
					'eartag_id' => $tag_id,
					'status' => $this->input->post("loss_caused",TRUE),
				);

				$this->db->where('eartag_id',$tag_id);

				if($this->db->update('goat_profile',$data)){
					$data = array(
						'eartag_id' => $tag_id,
						'loss_caused' => $this->input->post("loss_caused", TRUE),
						'loss_date' => $this->input->post("loss_date", TRUE),
						'description' => $this->input->post("description", TRUE),
						'user_id' => $this->session->userdata('user_id'),
					);

					return $this->db->insert('loss_record',$data);
				}

				return FALSE;

			}
		}

	}
?>
