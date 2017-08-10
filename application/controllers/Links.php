<?php
class Links extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('links_model');
                $this->load->model('projetos_model');
                $this->load->library('pagination');
        		$this->load->library('paginationlib');
        }

        public function index($page=1, $data=NULL)
        {
                $data['title'] = "Links";
                $data['projetos'] = $this->projetos_model->get_projetos();

           		$pagingConfig   = $this->paginationlib->initPagination("/links/p",$this->links_model->get_count(), 3);
           
           		$data["pagination_helper"] = $this->pagination;
           		$data['links'] = $this->links_model->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
           		$data['top_links'] = $this->links_model->get_top(0, 10);
            
           		$this->load->view('templates/header', $data);
               	$this->load->view('links/index', $data);
               	$this->load->view('templates/footer');            

        }

        public function add_link()
        {
                $this->form_validation->set_rules('url', 'URL', 'required');
                $this->form_validation->set_rules('num_ep', 'Episódio', 'required');

                if ($this->form_validation->run() === FALSE)
                {      
                    $data['message_display'] = 'Link adicionado com sucesso!';
					$this->index(1, $data);

                }
                else
                {
                    $this->links_model->add_link();
                    $data['message_display'] = 'Link adicionado com sucesso!';
                    $this->index(1, $data);
                }
        }

        public function search($keyword=NULL, $page=1)
        {
                $data['title'] = 'Pesquisa de Links';
                if (!isset($keyword)){
                	$keyword = $this->input->post('keyword');
                }
                
                $pagingConfig = $this->paginationlib->initPagination("/links/search/".$keyword, $this->links_model->get_search_count($keyword), 4);

                $data["pagination_helper"] = $this->pagination;
                $data['links'] = $this->links_model->get_searched_links($keyword, (($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);

                $data['keyword'] = $keyword;

                
                $this->load->view('templates/header', $data);
               	$this->load->view('links/search', $data);
               	$this->load->view('templates/footer');

        }

        public function delete($id = NULL)
        {
            $this->links_model->del_links($id);

            //$this->index();
            redirect(base_url('/links/'), 'location');

        }

        public function edit($id=NULL)
        {
        		$data['title'] = 'Editar Link';
                $data['projetos'] = $this->projetos_model->get_projetos();
                $data['links'] = $this->links_model->get_links($id);

               	$this->form_validation->set_rules('url', 'URL', 'required');
                $this->form_validation->set_rules('num_ep', 'Episódio', 'required');
                $this->form_validation->set_rules('data', 'Data', 'required');

                if ($this->form_validation->run() == FALSE)
                {      

					$this->load->view('templates/header', $data);
               		$this->load->view('links/edit', $data);
               		$this->load->view('templates/footer');

                }
                else
                {
                	$id = $this->input->post('idlinks');
                    $this->links_model->edit_links($id);
                    $data['message_display_edit'] = 'Link editado com sucesso!';

					$this->index(1, $data);
                }

        }
}