<?php 

class Users extends Admin_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
     	$this->load->model('model_users');
		$this->load->model('model_groups');
	}

	public function index(){
		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;
		}

		$this->data['user_data'] = $result;

		$this->render_template('users/index', $this->data);
	}

	public function create(){
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'type' => $this->input->post('type'),
        		'adderss' => $this->input->post('adderss'),
        		'password' => $password,        		
        	);

        	$create = $this->model_users->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            $this->render_template('users/create', $this->data);
        }		
	}

	public function password_hash($pass = ''){
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}


	public function edit($id = null){
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'name' => $this->input->post('name'),
		        		'email' => $this->input->post('email'),
		        		'phone' => $this->input->post('phone'),
		        		'type' => $this->input->post('type'),
		        		'adderss' => $this->input->post('adderss'),
		        		'password' => $password,  
		        	);

		        	$update = $this->model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'name' => $this->input->post('name'),
			        		'email' => $this->input->post('email'),
			        		'phone' => $this->input->post('phone'),
			        		'type' => $this->input->post('type'),
			        		'adderss' => $this->input->post('adderss'),
			        		'password' => $password,  
			        	);

			        	$update = $this->model_users->edit($data, $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$this->data['user_data'] = $user_data;
						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);       	
        	    $this->data['user_data'] = $user_data;
				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id){
		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	public function profile(){
		if(!in_array('viewProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;
        $this->render_template('users/profile', $this->data);
	}

	public function userwallet(){		
         
  			$this->data['user_data']  = $this->model_users->getUserData();
  			$this->render_template('users/userwallet', $this->data);
	}

	public function group()
	{
		$this->render_template('users/group', $this->data);
	}

	public function smsreport()
	{
		$this->render_template('users/smsreport', $this->data);
	}

	

 	 function addPoint($id=''){

  		if($this->input->post('smsble')){
	     	$data = array(		
	     		   'user_id'=>$this->input->post('userId'),		
		 		   'smsble' => $this->input->post('smsble'),
				   'whatsaapble' => $this->input->post('whatsaapble'),	   
	 		);
	     	$this->model_users->addpoints($data);
	     	echo "points added successffully";
	     }else{
	     	return false;
	     }	    

 	}

 	public function userdetails($id)
 	{
 		$data = $this->model_users->userdetails($id);
 		echo json_encode($data);
 	}
 	public function userinfo(){
 		$data = $this->model_users->userinfo($id);
 		echo json_encode($data);
 	}

}