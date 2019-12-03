<?php
class Discussion extends CI_Controller{

	private $user_id = 0;

	public function __construct(){

		parent:: __construct();
		if(empty($this->session->userdata('user_id'))){
			if(empty($this->session->userdata('id'))){
	 			redirect('');
			}
	 	}

	 	if(empty($this->session->userdata('user_id'))){
			$this->user_id = $this->session->userdata('id');
		}else{
	 		$this->user_id   = $this->session->userdata('user_id');
		}

	 	$this->load->model('User_model');
	 	$this->load->model('Discussion_model');
	}

	/**
	 * loading html view for titel listing
	 * @return [type] [description]
	 */
	public function dashboard(){
		// $this->dd($this->session->userdata());
		$this->session->unset_userdata('breadcrum');
		$result = array();
		$re = $this->User_model->getall($this->user_id);
		$authers = $this->Discussion_model->get_authers();

		if($re == null){
			$re = $this->User_model->getAdminDetails($this->user_id);
			$result['fullname'] = $re->name;
		}else{
			$result['fullname'] = $re->fullname;
		}

		if(empty($this->session->userdata('admin'))){
			$result['usertype'] = 'user';
		}else{
			$result['usertype'] = 'admin';
		}

		$result['user_id'] = $this->user_id;
		$result['authers'] = $authers;
		$this->load->view('discussion/dashboard.php', $result);
	}

	/**
	 * used to create a new title and return status result
	 * @return [type] [description]
	 */
	public function create_discussion_title(){
		$insert_a['title'] = $this->input->post('title');
		$insert_a['user_id'] = $this->user_id;
		$result = $this->Discussion_model->create_title($insert_a);
		$this->json_output($result);
	}

	public function list_all_title(){

		if($this->input->post('page') !== null){
			$page = $this->input->post('page');
		}else{
			$page = 0;
		}

		if($this->input->post('limit') !== null){
			$limit = $this->input->post('limit');
		}else{
			$limit = 10;
		}

		$titles = $this->input->post('title');
		$auther = $this->input->post('auther');
		
		$sql_cond = "dt.title like '%".$titles."%'";
		

		if($auther){
			$sql_cond .= "and dt.user_id = ".$auther;
		}

		$result = $this->Discussion_model->get_all_title($limit, $page, $sql_cond);
		$this->json_output($result);
	}

	public function view_subtitle($id){
		$re = $this->User_model->getall($this->user_id);
		if($re == null){
			$re = $this->User_model->getAdminDetails($this->user_id);
			$result['fullname'] = $re->name;
		}else{
			$result['fullname'] = $re->fullname;
		}
		if(empty($this->session->userdata('admin'))){
			$result['usertype'] = 'user';
		}else{
			$result['usertype'] = 'admin';
		}
		$result['discussion_id'] = $id;
		$this->load->view('discussion/discussion_subtitles.php', $result);
	}

	public function details($id){
		$re = $this->User_model->getall($this->user_id);
		if($re == null){
			$re = $this->User_model->getAdminDetails($this->user_id);
			$result['fullname'] = $re->name;
		}else{
			$result['fullname'] = $re->fullname;
		}

		if(empty($this->session->userdata('admin'))){
			$result['usertype'] = 'user';
		}else{
			$result['usertype'] = 'admin';
		
		}
		$result['user_id'] = $this->user_id;
		$result['discussion_id'] = $id;
		$result['subtitles'] = $this->Discussion_model->get_subtitles($id);
		$result['discussion'] = $this->Discussion_model->get_discussion_details($id);
		$result['breadcrum'] = $this->generate_breadcrum($id, $result['discussion']->title);
		$this->load->view('discussion/discussion_details.php', $result);
	}

	/**
	 * generating breadcrum to the discussion
	 * @param  [type] $id    [description]
	 * @param  string $title [description]
	 * @return [type]        [description]
	 */
	public function generate_breadcrum($id, $title=" title"){
		$title = strip_tags($title);
		$title = substr($title, 0, 10)."...";
		$id_a = [];
		if($this->session->userdata('breadcrum') != null){
			
			$id_a = $this->session->userdata('breadcrum');
			$display_cont = '';
			if(!array_key_exists($id, $id_a)){
				$id_a[$id] = ['id' => $id, 'title' => $title];
				$this->session->set_userdata('breadcrum', $id_a);
			}
			foreach ($id_a as $key => $value) {
				$display_cont .= '<li class="breadcrumb-item"><a href="'.base_url().'discussion/details/'.$value['id'].'">'.$value['title'].'</a></li>';
				if($value['id'] == $id){
					$this->re_arrange_breadcrum($id_a, $key);
					break;	
				}
			}
		
			return $display_cont;
		}else{
			$id_a[$id] = ['id' => $id, 'title' => $title];
			$this->session->set_userdata('breadcrum', $id_a);
			return '<li class="breadcrumb-item"><a href="'.base_url().'discussion/details/'.$id.'">'.$title.'</a></li>';
		}
	}

	/**
	 * removing and arranging previous breadcurm.
	 * @param  [type] $array     [description]
	 * @param  [type] $key_value [description]
	 * @return [type]            [description]
	 */
	private function re_arrange_breadcrum($array, $key_value){
		
		$key_value++;
		$remove_flag = false;
		foreach ($array as $key => $value) {
			if($key == $key_value){
				$remove_flag = true;
			}
			if($remove_flag == true){
				unset($array[$key]);
			}
		}
		$this->session->set_userdata('breadcrum', $array);
	}

	public function create_subtitle(){
		$title = $this->input->post('title');
		$discussion_id = $this->input->post('discussion_id');

		$insert_a = [];
		$insert_a['subtitle_id'] = $discussion_id;
		$insert_a['title'] = $title;
		$insert_a['user_id'] = $this->user_id;
		$insert_a['type'] = 'sub';

		$result = $this->Discussion_model->create_title($insert_a);
		$this->json_output($result);
	}

	public function list_all_subtitle(){

		if($this->input->post('page') !== null){
			$page = $this->input->post('page');
		}else{
			$page = 0;
		}

		if($this->input->post('limit') !== null){
			$limit = $this->input->post('limit');
		}else{
			$limit = 10;
		}

		$discussion_id = $this->input->post('discussion_id');
		$titles = $this->input->post('title');
		$auther = $this->input->post('auther');
		
		$sql_cond = "ds.sub_topic like '%".$titles."%'";
		

		if($auther){
			$sql_cond .= "and ds.user_id = ".$auther;
		}

		$result = $this->Discussion_model->get_all_subtitle($discussion_id, $limit, $page, $sql_cond);
		$this->json_output($result);
	}

	public function post_discusion(){
		$insert_a['discussion'] = $this->input->post('title');
		$insert_a['user_id'] = $this->user_id;
		$insert_a['d_id'] = $this->input->post('discussion_id');

		$result = $this->Discussion_model->post_discussion($insert_a);
		$this->json_output($result);
	}

	public function get_discussion_list(){
		$d_id = $this->input->post('discussion_id');

		if($this->input->post('page') !== null){
			$page = $this->input->post('page');
		}else{
			$page = 0;
		}

		if($this->input->post('limit') !== null){
			$limit = $this->input->post('limit');
		}else{
			$limit = 10;
		}		

		$result = $this->Discussion_model->get_discussion_list($limit, $page, $d_id);
		$this->json_output($result);
	}

	/**
	 * used to print array and sttring with in a pre tag
	 * @param  [type] $val [description]
	 * @return [type]      [description]
	 */
	private function dd($val){
		echo '<pre>';
		print_r($val);
		echo '</pre>';
		exit();
	}

	/**
	 * used to print json enoded data
	 * @param  [type] $val [description]
	 * @return [type]      [description]
	 */
	private function json_output($val){
		echo json_encode($val);
		exit();
	}

	public function upload_image(){
		if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = FCPATH."/assets/images-discussion/" . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                // move_uploaded_file($location, $destination);
                $compress_upload = $this->compress_image($location, $destination, 20);
                if($compress_upload == true){
                	echo base_url()."assets/images-discussion/".$filename;//change this URL
                }
            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
        }
	}

	public function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);
		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source_url);
			$result = imagejpeg($image, $destination_url, $quality);
		if($result == 1){
	  		return true;
		} else {
		  	return false;
		}
	  
	}

	public function remmove_title(){
		$title_id = $this->input->post('title_id');
		$result = $this->Discussion_model->remove_title($title_id);
		$this->json_output($result);
	}

	public function remove_subtitle(){
		$ds_id = $this->input->post('ds_id');
		$result = $this->Discussion_model->remove_subtitle($ds_id);
		$this->json_output($result);
	}

	public function get_title_details($id){
		$discussion = $this->Discussion_model->get_discussion_details($id);
		if($discussion){
			$this->json_output(['status' => true, 'data' => $discussion]);
		}else{
			$this->json_output(['status' => false, 'message' => 'Sorry no data found']);
		}
	}

	public function update_title(){
		$title_id = $this->input->post('title_id');
		$title = $this->input->post('title');

		$result = $this->Discussion_model->update_title($title_id, $title);
		$this->json_output($result);
	}
}
?>