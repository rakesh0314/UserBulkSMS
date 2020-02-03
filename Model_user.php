<?php
class Model_user extends CI_Model{
function __construct()  
{  
    parent::__construct();  
    $this->load->database();  
}    
	public function islogin($data){
		$this->db->select('*');
		$this->db->from('users');
	    $this->db->where(array('username'=>$data['username'],'password'=>$data['password']));  
	    $query= $this->db->get();
	    if($query->num_rows()>0)
	    {
	    	$data = $query->row();
	    	$session = array('userlogin'=>true ,
	    	'userid'=> $data->id);
	    	$this->session->set_userdata($session);
	    	return true;
	    }else
	    {
	    	return false;
	    }
    }

    public function getuserID($id)
     {
     	$this->db->select('*');
		$this->db->from('users');
	    $this->db->where('id',$id);  
	    $query= $this->db->get(); 
	    return $query->row(); 
     } 
     public function displayData($id)
     {
     	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
	    $query= $this->db->get(); 
	    return $query->row(); 
     } 

     function grouplist(){
 		$data=$this->db->get('grouptable');
		return $data->result();
	}


     function groupsave(){
     	$date = date("Y-m-d h:i:s");
    		$data = array(				
				'groupname' => $this->input->post('groupname'),
				'date'=>$date,
				);
		$result=$this->db->insert('grouptable',$data);
		return $result;
	}

	function senderlist(){
		$data=$this->db->get('sender');
		return $data->result();
	}

	function sendersave(){
		$date = date("Y-m-d h:i:s");
       $data = array(				
			'sendername' => $this->input->post('sendername'),
			'date'=>$date
		);
    
	$result=$this->db->insert('sender',$data);
	return $result;
   } 	

   function savenumber(){
   	$data = array(				
			'mobilenum' => $this->input->post('mobilenum'),
		);
    
	$result=$this->db->insert('group_num',$data);
	return $result;
   }

   public function groupdata($id)
   {
   		$this->db->select('*');
   		$this->db->from('grouptable');
   		$this->db->where('gid',$id);
   		$query = $this->db->get();
   		return $query->row();
   }
   public function Getgroupdata(){
   	$this->db->select('*');
   		$this->db->from('grouptable');
   	    $query = $this->db->get();
   		return $query->result_array();
   }

    public function Getsenderdata(){
    	$this->db->select('*');
    	$this->db->from('sender');
    	$query = $this->db->get();
    	return $query->result_array();
      }

    public function viewnumber(){
    	$this->db->select('*');
    	$this->db->from('group_num');
    	$query = $this->db->get();
    	return $query->row();
      }

    public function userwallet($id='')
    {
    	$this->db->select('*');
    	$this->db->from('wallet');
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	return $query->row();
    }

  
}