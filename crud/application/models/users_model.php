<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

    private $table = "users";

    public function __construct(){
        parent::__construct();
    }

	public function sign_up($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username)
		->where('password', $password)
		->or_where('email', $username)
		->where('password', $password);
		$query=$this->db->get($this->table);
		$return=$query->result_array();
		if (count($return) !== 0 && $return[0]['status']== 'active'){
			return $return;
		}
		else{
			return false;
		}
	}

	public function get_user($id)
	{
		if(isset($id) && $id != null){
            $this->db->where('id', $id);
        }

        $query = $this->db->get($this->table);
        
        return $query->result_array();
	}

	public function updateUser($data){

        $this->db->where('id', $data['id']);
        unset($data['id']);

        $this->db->update($this->table, $data);    
    }

	public function delete_account($id){
		
		$this->db->where('id', $id);
		$data['status'] = 'inactive';
		$this->db->update($this->table, $data);
		return true;		
	}
}
