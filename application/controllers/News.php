<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->library('pagination');
                $this->load->library('paginationlib');
        }

        public function index($page=1, $data=NULL)
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'Notícias';

                $pagingConfig   = $this->paginationlib->initPagination("/news/p",$this->news_model->get_count(), 3, 5);
           
                $data["pagination_helper"] = $this->pagination;
                $data['news'] = $this->news_model->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($id);
                 if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
                $data['title'] = 'Criar Nova Notícia';

                $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('text', 'text', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('news/create', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->news_model->set_news();
                        $data['news'] = $this->news_model->get_news();
                        $data['title'] = 'Notícias';

                        $pagingConfig   = $this->paginationlib->initPagination("/news/p",$this->news_model->get_count(), 3, 5);
           
                        $data["pagination_helper"] = $this->pagination;
                        $data['news'] = $this->news_model->get_by_range(0,$pagingConfig['per_page']);

                        $data['message_display'] = 'Notícia adicionada com sucesso!';
                        $this->load->view('templates/header', $data);
                        $this->load->view('news/index', $data);
                        $this->load->view('templates/footer');
                }
        }

        public function delete($id = NULL)
        {
            $this->news_model->del_news($id);
            
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'Notícias';

            $pagingConfig   = $this->paginationlib->initPagination("/news/p",$this->news_model->get_count(), 3, 10);
           
            $data["pagination_helper"] = $this->pagination;
            $data['news'] = $this->news_model->get_by_range(0,$pagingConfig['per_page']);

            $data['message_display'] = 'Notícia apagada com sucesso!';
            $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            $this->load->view('templates/footer');

        }

        public function edit($id=NULL)
        {
                $data['title'] = 'Editar Notícia';

                $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('text', 'text', 'required');

                $data['news_item'] = $this->news_model->get_news($id);

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('news/edit', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $id = $this->input->post('id');
                        $this->news_model->edit_news($id);

                        $data['message_display'] = 'Notícia editada com sucesso!';

                        $this->index(1, $data);
                }
        }
}