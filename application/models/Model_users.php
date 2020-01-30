<?php 
class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	

	public function create($data = '')
	{
		if($data) {
			$create = $this->db->insert('users', $data);
			$user_id = $this->db->insert_id();
			return ($create == true) ? true : false;
		}
	}

	 //  public function addPoint($data)
	 //  {
	 //  	$this->db->insert('users',$data);
	 //  	return true;

	 // // }
	

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);	
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function userwallet($id = '')
	{
 		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
 	}
  
   function addpoints($data){
   	 $result=$this->db->insert('wallet',$data);
     return $result;
 	}


 	function userinfo($id){
 		$this->db->select('*');
 		$this->db->form('wallet');
 		$this->where('id',$id);
 		$query = $this->db->get();
 		return $query->row_array();

 	}

 	public function userdetails($id)
 	{
 		$this->db->select('*');
 		$this->db->from('users');
 		$this->db->where('id',$id);
 		$query = $this->db->get();
 		return $query->row_array();
 	}
}