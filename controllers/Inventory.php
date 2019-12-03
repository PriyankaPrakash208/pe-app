<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller{
	
	var $lang;
	public function __construct(){
	 	parent::__construct();
	 	
/*	 	if(empty($this->session->userdata('logged_in') && $this->session->userdata('email')=='admin')){
	 		redirect(base_url().'hashadmin');
	 	}*/
	 	if(empty($this->session->userdata('logged_in') && $this->session->userdata('admin')=='true')){
	 		redirect(base_url().'hashadmin');
	 	}
	 	$this->load->model('Admin_model');
	 	
	 	
	 	$this->lang = array(
			'preview' => 'Public review',
			'creview' =>'Client review',
			'tquality' => 'Ticket Quality',
			'cquality' => 'Communication Quality',
			'treplies' =>'Thanks replies',
			'pviolation' => 'Policy Violation',
			'slaviolation' => 'SLA Violation',
			'wreport' => 'Work Reports',
			'skypeactivity' => 'Skype Activities',
			'warning' => 'Warning',
			'suspension' => 'Suspension ',
			'blogpost' => 'Blog Posts',
			'seminars' => 'Seminar',
			'training' => 'Training',
			'codeof' =>  'Code of conduct',
			'linkedin' => 'Linkedin Engagements',
			'fb' =>  'Facebook Engagements',			
			'twitter' =>  'Twitter Engagements',
			'insta' =>  'Instagram Engagements',			 
			'ssmedia' =>  'Social Media Engagements',
			'awards' => 'Awards & Achievements'
		);
	 } 
	
	Public function home(){		
		$this->load->view('admin/dashboard');
	}
	Public function index(){		
		redirect('/admin/home'); 
	}
	
	
	//===========================  Test functions  ==================================
	Public function testcode(){
		echo('Welcome to new controller : Inventory');
	}
	
	
	Public function viewteams(){
		$this->load->model('Inventory_model');
		$result=$this->Inventory_model->viewallteam();
		echo json_encode($result);
	}
	// Start adding inventory 
	Public function add_new_inv(){
		
		$datas['inv_type']   = $this->input->post('select_inv_item');
		$datas['inv_serial'] = $this->input->post('serialno');
		$datas['inv_brand']	 = $this->input->post('brandname');
		$datas['inv_specs']	 = $this->input->post('item_spec');
		$datas['inv_team']	 = $this->input->post('select_team2');	
		$invoice 			 = $this->input->post('invoice');	
		
	  	if($this->input->post('select_inv_item') == 0 || $this->input->post('select_team2') == 0 || $this->input->post('brandname') == '' ){
			$stat['flag'] = 0;
			$stat['msg'] = "Please fill the required field ";
			echo json_encode($stat);
		}
		else{
			//		File upload
			if(isset($_FILES['invoice'])){  
				$config['upload_path']          = '/home/hashroot/pe/assets/invoices'; 
				$config['allowed_types']        = 'pdf|doc|docx|txt|dot|png|jpg';
				$config['max_size']             = 5024;
				$config['file_name']            = 'invoice_'.strtotime('now');
				// $config['max_width']         = 1024;
				// $config['max_height']        = 768;
				$this->load->library('upload', $config);
				if($this->upload->do_upload('invoice')){ 
					$data = $this->upload->data();
					$datas['inv_invoice'] = $data['file_name'];
				}
			}  

			$this->load->model('Inventory_model');
			$fl = $this->Inventory_model->add_inv($datas);
			if($fl == "true"){
				$stat['flag'] = 1;
				echo json_encode($stat);
			}
			
			//		Close file upload 
			
		}

	}
	
// Close adding inventory

//start View inventory
	Public function view_inv(){
		
		$this->load->view('inventory/inventory_view');
	} 
	
/** Get inventory items */
	Public function get_inv_types1(){
		$type = $this->input->post('invtype');
		$this->load->model('Inventory_model');
		$inv_spec = $this->Inventory_model->get_inventories($type);
		echo json_encode($inv_spec);
	}
	Public function get_inv_types(){
		$type = $this->input->post('invtype');
		$this->load->model('Inventory_model');
		
//		print_r($inv_spec);
		$slno=1;
		echo "<div class='m-portlet'>
							<div class='m-portlet__head'>
								<div class='m-portlet__head-caption'>
									<div class='m-portlet__head-title'>
										<h3 class='m-portlet__head-text'>
											
										</h3>
									</div>
								</div>
							</div>
							<div class='m-portlet__body'>
								<!--begin::Section-->
								<div class='m-section'>
									<div class='m-section__content'>
										<table class='table table-striped m-table dataTable'>
											<thead>
												<tr>
													<th>#</th>
													<th>
														HashRoot ID
														
													</th>
													<th>
														Brand
													</th>
													<th>
														Specification
													</th>
													<th>
														Team 
													</th>
													<th>
														Invoice
													</th>
													<th>
														Actions
													</th>
												</tr>
											</thead>
											<tbody>";
		if($this->session->userdata('role')==4){
			$inv_spec = $this->Inventory_model->get_inventoriesByTeam($type);
		}else{
			$inv_spec = $this->Inventory_model->get_inventories($type);
		}
		
		if(count($inv_spec)>0){
			
					foreach($inv_spec as $row){ 
						echo "<tr id='row".$row['inv_id']."'>
									<td>".$slno."</td>
									
									<td>".$row['inv_serial']."</td>
									<td>".$row['inv_brand']."</td>
									<td>".$row['inv_specs']."</td>";
						
					$team_name = $this->Inventory_model->get_teams($row['inv_team']);
//						print_r($team_name->name);
							  echo "<td>".$team_name->name."</td>
									<td><a class='custom-hover' target='_blank' href='".base_url()."assets/invoices/".$row['inv_invoice']."' ><i class='fa fa-file-image-o' aria-hidden='true'></i></a></td>
									<td>
										<a href='javascript:;'  onclick='deleteInventory(".$row['inv_id'].")' class='btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air'>
															<i class='fa fa-archive'></i>
														</a>
									</td>
							</tr>";
						
						$slno++;
					}
			
					
		}
		echo "</tbody>
				</table>
			</div>
		</div>
		<!--end::Section-->
	</div>
	<!--end::Form-->
</div>";
		
	}
//
//
//
//Delete Inventory
//
//
	public function inventoryDelete(){
		$invId = $this->input->post('invId');
		$this->load->model('Inventory_model');
		$this->Inventory_model->deleteInventory($invId);
	}
//Close getting inventory
	
	//===========================  Test functions  ==================================
	
}
	 