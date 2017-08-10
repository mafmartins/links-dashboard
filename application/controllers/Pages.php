<?php
class Pages extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('links_model');
                $this->load->model('projetos_model');
                $this->load->model('news_model');
        }

	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
                {
                // Whoops, we don't have a page for that!
                show_404();
                }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['links'] = $this->links_model->get_recent_links();
        $data['projetos'] = $this->projetos_model->get_projetos();
        $data['projetos_andamento'] = $this->projetos_model->get_andamento(0, 10);
        $data['news'] = $this->news_model->get_by_range(0,3);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);



	}
        public function add_link($page = 'home')
        {
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['links'] = $this->links_model->get_recent_links();
                $data['projetos'] = $this->projetos_model->get_projetos();
                $data['projetos_andamento'] = $this->projetos_model->get_andamento(0, 10);
                $data['news'] = $this->news_model->get_by_range(0,3);

                $this->form_validation->set_rules('url', 'URL', 'required');
                $this->form_validation->set_rules('num_ep', 'Episódio', 'required');

                if ($this->form_validation->run() === FALSE)
                {      
                        $data['message_display'] = 'Link adicionado com sucesso!';
                        $this->load->view('templates/header', $data);
                        $this->load->view('pages/'.$page, $data);
                        $this->load->view('templates/footer', $data);

                }
                else
                {
                        $this->links_model->add_link();
                        $data['links'] = $this->links_model->get_recent_links();
                        $data['message_display'] = 'Link adicionado com sucesso!';
                        $this->load->view('templates/header', $data);
                        $this->load->view('pages/'.$page, $data);
                        $this->load->view('templates/footer', $data);
                }
        }
}