<?php
class Projetos extends CI_Controller {

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
                $data['title'] = "Projetos";

           		$pagingConfig   = $this->paginationlib->initPagination("/projetos/p",$this->projetos_model->get_count(), 3);
           
           		$data["pagination_helper"] = $this->pagination;
           		$data['projetos'] = $this->projetos_model->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
           		$data['projetos_andamento'] = $this->projetos_model->get_andamento(0, 10);
            
           		$this->load->view('templates/header', $data);
               	$this->load->view('projetos/index', $data);
               	$this->load->view('templates/footer');            

        }

        public function view($id = NULL, $page=1)
        {
                $data['title'] = "Projetos";

                $pagingConfig   = $this->paginationlib->initPagination("/projetos/view/".$id, $this->links_model->get_count_by_idprojeto($id), 4);
           
                $data["pagination_helper"] = $this->pagination;

                $data['projeto'] = $this->projetos_model->get_projetos($id);
                $data['links'] = $this->links_model->get_by_range_and_id((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page'], $id);
                 if (empty($data['projeto']))
                {
                        show_404();
                }

                $this->load->view('templates/header', $data);
                $this->load->view('projetos/view', $data);
                $this->load->view('templates/footer');
        }

        public function add_projeto()
        {
                $this->form_validation->set_rules('titulo', 'Titulo', 'required');
                $this->form_validation->set_rules('img', 'Imagem', 'required');
                $this->form_validation->set_rules('capa', 'Capa', 'required');
                $this->form_validation->set_rules('num_eps', 'Numero de Episodios', 'required');
                $this->form_validation->set_rules('tipo', 'Tipo', 'required');
                $this->form_validation->set_rules('enc_video', 'Encode do Video', 'required');
                $this->form_validation->set_rules('enc_audio', 'Encode do Audio', 'required');
                $this->form_validation->set_rules('staff', 'Staff', 'required');
                $this->form_validation->set_rules('ano', 'ano', 'required');
                $this->form_validation->set_rules('estudio', 'Estudio', 'required');
                $this->form_validation->set_rules('autor', 'Autor', 'required');
                $this->form_validation->set_rules('genero', 'Genero', 'required');
                $this->form_validation->set_rules('sinopse', 'Sinopse', 'required');
                $this->form_validation->set_rules('parceria', 'Parceria', 'required');
                $this->form_validation->set_rules('rls_eps', 'Episodios Lançados', 'required');
                $this->form_validation->set_rules('bd', 'Blu-ray', 'required');



                if ($this->form_validation->run() === FALSE)
                {      
                    $data['message_display'] = 'Projeto adicionado com sucesso!';
                    $this->index(1, $data);

                }
                else
                {
                    $this->projetos_model->add_projeto();
                    $data['message_display'] = 'Projeto adicionado com sucesso!';
                    $this->index(1, $data);
                }
        }

        public function search($keyword=NULL, $page=1)
        {
                $data['title'] = 'Pesquisa de Projetos';
                if (!isset($keyword)){
                    $keyword = $this->input->post('keyword');
                }
                
                $pagingConfig = $this->paginationlib->initPagination("/projetos/search/".$keyword, $this->projetos_model->get_search_count($keyword), 4);

                $data["pagination_helper"] = $this->pagination;
                $data['projetos'] = $this->projetos_model->get_searched_projetos($keyword, (($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);

                $data['keyword'] = $keyword;

                
                $this->load->view('templates/header', $data);
                $this->load->view('projetos/search', $data);
                $this->load->view('templates/footer');

        }

        public function delete($id = NULL)
        {
            $this->projetos_model->del_projetos($id);

            //$this->index();
            redirect(base_url('/projetos/'), 'location');

        }

        public function edit($id=NULL)
        {
                $data['title'] = 'Editar Projetos';
                $data['projetos'] = $this->projetos_model->get_projetos($id);

                $this->form_validation->set_rules('titulo', 'Titulo', 'required');
                $this->form_validation->set_rules('img', 'Imagem', 'required');
                $this->form_validation->set_rules('capa', 'Capa', 'required');
                $this->form_validation->set_rules('num_eps', 'Numero de Episodios', 'required');
                $this->form_validation->set_rules('tipo', 'Tipo', 'required');
                $this->form_validation->set_rules('enc_video', 'Encode do Video', 'required');
                $this->form_validation->set_rules('enc_audio', 'Encode do Audio', 'required');
                $this->form_validation->set_rules('staff', 'Staff', 'required');
                $this->form_validation->set_rules('ano', 'ano', 'required');
                $this->form_validation->set_rules('estudio', 'Estudio', 'required');
                $this->form_validation->set_rules('autor', 'Autor', 'required');
                $this->form_validation->set_rules('genero', 'Genero', 'required');
                $this->form_validation->set_rules('sinopse', 'Sinopse', 'required');
                $this->form_validation->set_rules('parceria', 'Parceria', 'required');
                $this->form_validation->set_rules('rls_eps', 'Episodios Lançados', 'required');
                $this->form_validation->set_rules('bd', 'Blu-ray', 'required');

                if ($this->form_validation->run() == FALSE)
                {      

                    $this->load->view('templates/header', $data);
                    $this->load->view('projetos/edit', $data);
                    $this->load->view('templates/footer');

                }
                else
                {
                    $id = $this->input->post('idprojetos');
                    $this->projetos_model->edit_projetos($id);
                    $data['message_display_edit'] = 'Projeto editado com sucesso!';

                    $this->index(1, $data);
                }

        }

}