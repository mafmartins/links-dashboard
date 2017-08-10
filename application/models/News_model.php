<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($id = FALSE)
		{
        	if ($id === FALSE)
        	{
                $this->db->order_by("id", "desc");
                $query = $this->db->get('news');
                return $query->result_array();
        	}

        	$query = $this->db->get_where('news', array('id' => $id));
        	return $query->row_array();
		}

        public function get_by_range($lower, $upper){

            $q = "SELECT * FROM news ORDER BY id DESC LIMIT ". $lower .", ".$upper;

            $query = $this->db->query($q);

            return $query->result_array();

        }

        public function get_count(){

            $q = "SELECT * FROM news ORDER BY id DESC";

            $query = $this->db->query($q);

            return $query->num_rows();

        }

		public function set_news()
		{

    		$slug = url_title($this->input->post('title'), 'dash', TRUE);

    		$data = array(
        		'title' => $this->input->post('title'),
        	'slug' => $slug,
        	'text' => nl2br($this->input->post('text')),
            'date' => date("Y/m/d")
    		);

    		return $this->db->insert('news', $data);
		}

        public function del_news($id = FALSE)
        {

            return $this->db->delete('news', array('id' => $id));
            
        }

        public function edit_news($id)
        {

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => nl2br($this->input->post('text'))
            );

            $this->db->where('id', $id);
            return $this->db->update('news', $data);
        }

}