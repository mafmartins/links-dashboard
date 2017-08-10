<?php

Class Links_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	    public function get_links($idlink = FALSE)
		{
        	if ($idlink === FALSE)
        	{
                $query = $this->db->get('links');
                return $query->result_array();
        	}

        	$query = $this->db->get_where('links', array('idlinks' => $idlink));
        	return $query->row_array();
		}

		public function get_recent_links()
		{
			$q = "SELECT * FROM links ORDER BY idlinks DESC LIMIT 0, 15";

        	$query = $this->db->query($q);
        	return $query->result_array();
		}

		public function add_link(){

			$new_url = str_replace("ftp://kitamura@moshimoshidb.org/home/kitamura", "http://moshimoshidb.org", $this->input->post('url'));
			
			$data = array(
        	'link' => $new_url,
        	'downloads' => 0,
        	'idprojeto' => $this->input->post('projeto'),
        	'num_ep' => $this->input->post('num_ep'),
        	'crc' => $this->input->post('crc'),
        	'data' => date("Y/m/d"),
        	'isova' => $this->input->post('isova')
    		);

            $q = "SELECT rls_eps FROM projetos WHERE idprojetos = ".$data['idprojeto'];
            $query = $this->db->query($q);

            $rls_eps_old = $query->row_array();
            $rls_eps_new = $rls_eps_old['rls_eps'] + 1;

            $rls_eps_update = array(
            'rls_eps' => $rls_eps_new,
            );

            $this->db->update('projetos', $rls_eps_update, "idprojetos = ".$data['idprojeto']);

    		return $this->db->insert('links', $data);

		}

		public function get_count(){

			$q = "SELECT * FROM links ORDER BY idlinks DESC";

        	$query = $this->db->query($q);

        	return $query->num_rows();

		}

        public function get_count_by_idprojeto($id){

            $q = "SELECT * FROM links WHERE idprojeto = ".$id." ORDER BY idlinks DESC";

            $query = $this->db->query($q);

            return $query->num_rows();

        }

		public function get_search_count($keyword){

			$q = "SELECT * FROM links WHERE link LIKE '%". $keyword ."%' ORDER BY idlinks DESC";

        	$query = $this->db->query($q);

        	return $query->num_rows();

		}


		public function get_by_range($lower, $upper){

			$q = "SELECT * FROM links ORDER BY idlinks DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();

		}

        public function get_by_range_and_id($lower, $upper, $id){

            $q = "SELECT * FROM links WHERE idprojeto = ". $id ." ORDER BY num_ep DESC LIMIT ". $lower .", ".$upper;

            $query = $this->db->query($q);

            return $query->result_array();

        }

		public function get_top($lower, $upper){

			$q = "SELECT * FROM links ORDER BY downloads DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();

		}
		public function get_searched_links($keyword, $lower, $upper){

			$q = "SELECT * FROM links WHERE link LIKE '%". $keyword ."%' ORDER BY idlinks DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();
		}

		public function del_links($id = FALSE)
        {
            $query = $this->db->get_where('links', array('idlinks' => $id));
            $link = $query->row_array();

            $q = "SELECT rls_eps FROM projetos WHERE idprojetos = ".$link['idprojeto'];
            $query = $this->db->query($q);

            $rls_eps_old = $query->row_array();
            $rls_eps_new = $rls_eps_old['rls_eps'] - 1;

            $rls_eps_update = array(
            'rls_eps' => $rls_eps_new,
            );

            $this->db->update('projetos', $rls_eps_update, "idprojetos = ".$link['idprojeto']);

            return $this->db->delete('links', array('idlinks' => $id));
            
        }

		public function edit_links($id){
			
			$data = array(
        	'link' => $this->input->post('url'),
        	'idprojeto' => $this->input->post('projeto'),
        	'num_ep' => $this->input->post('num_ep'),
        	'crc' => $this->input->post('crc'),
        	'data' => $this->input->post('data'),
        	'downloads' => $this->input->post('downloads'),
        	'isova' => $this->input->post('isova')
    		);

			$this->db->where('idlinks', $id);
    		return $this->db->update('links', $data);

		}
}
?>