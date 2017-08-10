<?php
class Stats extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('links_model');
                $this->load->model('projetos_model');
                $this->load->model('stats_model');
        }

        public function index($data=NULL)
        {
                $data['title'] = "Estatísticas";
                $data['projetos'] = $this->projetos_model->get_projetos();
           
           		$data['top_links'] = $this->links_model->get_top(0, 10);
           		$data['total_downs'] = $this->stats_model->get_total_downloads();
           		$data['avg_downs'] = $this->stats_model->get_total_average();
           		$data['links_count'] = $this->stats_model->get_links_count();
           		$data['avg_days'] = $this->stats_model->get_days_average();
            
           		$this->load->view('templates/header', $data);
               	$this->load->view('stats/index', $data);
               	$this->load->view('templates/footer');            

        }

        public function top_eps_stats(){

        	$result = $this->stats_model->get_top_eps_stats();

        	$table = array();

        	$table['cols'] = array(
    			array('id' => "", 'label' => 'Episódio', 'pattern' => "", 'type' => 'string'),
    			array('id' => "", 'label' => 'Downloads', 'pattern' => "", 'type' => 'number')
    		);

    		$rows = array();	

        	$i = 0;

        	foreach ($result as $result_item):

        		if($result_item["isova"]==1){
					if (strpos($result_item["link"],'OVA') !== false) { 
						$num_ep = "OVA ".$result_item["num_ep"];
					} else {
						$projeto = $this->projetos_model->get_projetos($result_item["idprojeto"]);
						if ($projeto["tipo"] == "Filme"){
							if (strpos($result_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
						}
												
					} 
				} else {
					$projeto = $this->projetos_model->get_projetos($result_item["idprojeto"]);
					if ($projeto["tipo"] == "Filme"){
						if (strpos($result_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
					} else {
						$num_ep = $result_item["num_ep"];
					}
				}

				$projeto = $this->projetos_model->get_projetos($result_item["idprojeto"]);

				$nome = $projeto["titulo"]." - ".$num_ep;

        		$temp = array();
    			$temp[] = array('v' => $nome, 'f' =>NULL);
    			$temp[] = array('v' => $result_item['downloads'], 'f' =>NULL);
    			$rows[] = array('c' => $temp);

        	endforeach; 

        	$table['rows'] = $rows;

        	echo json_encode($table);

        }

        public function top_proj_downs(){

        	$result = $this->stats_model->get_top_proj_downs();

    		echo json_encode($result);


        }

        public function top_proj_avg(){

        	$result = $this->stats_model->get_top_proj_avg();

    		echo json_encode($result);


        }

        public function last_days(){

        	$result = $this->stats_model->get_last_days();

        	echo json_encode($result);
        	
        }
}
?>