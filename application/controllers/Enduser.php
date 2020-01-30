<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Enduser extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->model('Model_user'); 
    $this->load->library ('session');
	}

	public function footer()
	{
		$this->load->view('User/inc/footer');
	}

	public function header()
	{
		$data['user'] = $this->Model_user->getuserID($this->session->userdata('userid'));
		$this->load->view('User/inc/header',$data);
	}

	public function index(){  
    $this->load->view('userlogin');  
     }  

     public function check_login()
     {  
	    $data['loginid']=htmlspecialchars($_POST['loginid']);  
	    $data['password']=htmlspecialchars($_POST['password']);  
	    $res=$this->Model_user->islogin($data);  
	    if($res==true){        
	        redirect(base_url().'enduser/home');
	    }  
	    else{  
	       redirect(base_url()); 
	    }   
    }  
    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}  
      public function smsreport()
	{
		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/smsreport');
		$this->footer();
	}else{
		redirect(base_url());
	}
	}
	public function home()
	 {
	 	if($this->session->userdata('userlogin')){
		$this->header();
	 	$this->load->view('User/home');
//	 	$this->footer();
	 }else{
	 	redirect(base_url());
	 }
	 }

	 public function add_group_number($gid=''){
		if($this->input->post('mobilenum')){
	     	$mobilenum = $this->input->post('mobilenum');
	     	$this->Model_user->savenumber($mobilenum);
	     	echo "number added successffully";
	     }else{
			$this->header();
			$data['groupdata'] = $this->Model_user->groupdata($gid);
		 	$this->load->view('User/add_group_number',$data);

	     }	    
	 }

	 public function view_group_number(){
		$this->header();
		$data=$this->Model_user->grouplist();
	 	$this->load->view('User/view_group_number',$data);
	   }

	public function form()
	{
		$this->header();
		$senderdata['senderdata'] = $this->Model_user->Getsenderdata();
		//$data['groupdata'] = $this->Model_user->Getgroupdata();
		$this->load->view('User/form',$senderdata);
		$this->footer();
		// if($this->input->post('submit')){
		// 	$groupname = $this->input->post('groupname');
		// 	$
		// }
	
	}

	public function galary()
	{
		$this->header();
		$this->load->view('User/galary');
		$this->footer();
	}
	public function register()
	{	
		$this->header();
		$this->load->view('User/register');
		$this->footer();
	}
	public function profile()
	{	
		$this->header();
		$result['data']=$this->Model_user->displayData($this->session->userdata('userid'));
		$this->load->view('User/profile',$result);
		$this->footer();
	}
	public function Whatsappsms()
	{	
		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/Whatsappsms');
		$this->footer();
	}else{
		redirect(base_url());
	}
	}

	function show(){
		$data=$this->Model_user->grouplist();
		echo json_encode($data);
	}
	function save(){	
		$data=$this->Model_user->groupsave();
		echo json_encode($data);
	}
	public function group()
	{		

		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/group');
		$this->footer();
	    }
	    else
	    {
		   redirect(base_url());
	    }
	}
	public function filter()
	{	
		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/filtermsg');
		$this->footer();
	}else{
		redirect(base_url());
	}
	}
	public function sender()
	{	
		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/sender');
		$this->footer();
	}else{
		redirect(base_url());
	}
	}
	public function report(){
		if($this->session->userdata('userlogin')){
		$this->header();
		$this->load->view('User/report');
		$this->footer();
	}else{
		redirect(base_url());
	}
	}
	
	function sendershow(){
		$data=$this->Model_user->senderlist();
		echo json_encode($data);
	}
	function sendersave(){	
		$data=$this->Model_user->sendersave();
		echo json_encode($data);
	}
}
