<?php

Class Projetos_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	    public function get_projetos($idprojeto = FALSE)
		{
        	if ($idprojeto === FALSE)
        	{
                $query = $this->db->get('projetos');
                return $query->result_array();
        	}

        	$query = $this->db->get_where('projetos', array('idprojetos' => $idprojeto));
        	return $query->row_array();
		}

		public function get_count(){

			$q = "SELECT * FROM projetos ORDER BY idprojetos DESC";

        	$query = $this->db->query($q);

        	return $query->num_rows();

		}

		public function get_search_count($keyword){

			$q = "SELECT * FROM projetos WHERE titulo LIKE '%". $keyword ."%' ORDER BY idprojetos DESC";

        	$query = $this->db->query($q);

        	return $query->num_rows();

		}


		public function get_by_range($lower, $upper){

			$q = "SELECT * FROM projetos ORDER BY idprojetos DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();

		}

		public function get_andamento($lower, $upper){

			$q = "SELECT * FROM projetos WHERE rls_eps < num_eps ORDER BY titulo DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();

		}

		public function add_projeto(){

            if ($this->input->post('tor_link')==""){
                $torlink = NULL;
            } else {
                $torlink = $this->input->post('tor_link');
            }

			
			$data = array(
        	'titulo' => $this->input->post('titulo'),
        	'img' => $this->input->post('img'),
        	'capa' => $this->input->post('capa'),
        	'num_eps' => $this->input->post('num_eps'),
        	'tipo' => $this->input->post('tipo'),
        	'enc_video' => $this->input->post('enc_video'),
        	'enc_audio' => $this->input->post('enc_audio'),
        	'staff' => $this->input->post('staff'),
        	'ano' => $this->input->post('ano'),
        	'estudio' => $this->input->post('estudio'),
        	'autor' => $this->input->post('autor'),
        	'genero' => $this->input->post('genero'),
        	'sinopse' => $this->input->post('sinopse'),
        	'parceria' => $this->input->post('parceria'),
            'parceiro' => $this->input->post('parceiro'),
        	'rls_eps' => $this->input->post('rls_eps'),
            'tor_link' => $torlink,
            'bd' => $this->input->post('bd'),
    		);

    		return $this->db->insert('projetos', $data);

		}

		public function get_searched_projetos($keyword, $lower, $upper){

			$q = "SELECT * FROM projetos WHERE titulo LIKE '%". $keyword ."%' ORDER BY idprojetos DESC LIMIT ". $lower .", ".$upper;

        	$query = $this->db->query($q);

        	return $query->result_array();
		}

		public function del_projetos($id = FALSE)
        {

            return $this->db->delete('projetos', array('idprojetos' => $id));
            
        }

        public function edit_projetos($id){

            if ($this->input->post('tor_link')==""){
                $torlink = NULL;
            } else {
                $torlink = $this->input->post('tor_link');
            }
			
			$data = array(
        	'titulo' => $this->input->post('titulo'),
        	'img' => $this->input->post('img'),
        	'capa' => $this->input->post('capa'),
        	'num_eps' => $this->input->post('num_eps'),
        	'tipo' => $this->input->post('tipo'),
        	'enc_video' => $this->input->post('enc_video'),
        	'enc_audio' => $this->input->post('enc_audio'),
        	'staff' => $this->input->post('staff'),
        	'ano' => $this->input->post('ano'),
        	'estudio' => $this->input->post('estudio'),
        	'autor' => $this->input->post('autor'),
        	'genero' => $this->input->post('genero'),
        	'sinopse' => $this->input->post('sinopse'),
        	'parceria' => $this->input->post('parceria'),
            'parceiro' => $this->input->post('parceiro'),
        	'rls_eps' => $this->input->post('rls_eps'),
            'tor_link' => $torlink,
            'bd' => $this->input->post('bd'),
    		);

			$this->db->where('idprojetos', $id);
    		return $this->db->update('projetos', $data);

		}
}
?>
