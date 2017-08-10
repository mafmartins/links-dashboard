<?php

Class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	    public function get_users($id = FALSE)
		{
        	if ($id === FALSE)
        	{
                $query = $this->db->get('users');
                return $query->result_array();
        	}

        	$query = $this->db->get_where('users', array('id' => $id));
        	return $query->row_array();
		}

		public function add_user(){
			
			$data = array(
        	'username' => $this->input->post('username'),
        	'password' => $this->input->post('password'),
        	'email' => $this->input->post('email'),
        	'class' => $this->input->post('class'),
        	'avatar' => $this->input->post('avatar'),
        	'created' => date("Y-m-d H:i:s")
    		);

    		return $this->db->insert('users', $data);

		}

         public function get_count(){

            $q = "SELECT * FROM users ORDER BY id DESC";

            $query = $this->db->query($q);

            return $query->num_rows();

        }

        public function get_by_range($lower, $upper){

            $q = "SELECT * FROM users ORDER BY id DESC LIMIT ". $lower .", ".$upper;

            $query = $this->db->query($q);

            return $query->result_array();

        }

        public function del_users($id = FALSE)
        {

            return $this->db->delete('users', array('id' => $id));
            
        }

        public function edit_users($id){
            
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'class' => $this->input->post('class'),
            'avatar' => $this->input->post('avatar'),
            );

            $this->db->where('id', $id);
            return $this->db->update('users', $data);

        }
}
?>