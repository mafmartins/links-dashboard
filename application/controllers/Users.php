<?php
class Users extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('links_model');
                $this->load->model('projetos_model');
                $this->load->model('users_model');
                $this->load->library('pagination');
                $this->load->library('paginationlib');
        }

        public function index($page=1, $data=NULL)
        {
                $class = $this->session->userdata('class');

                if ($class > 1) {
                    show_404();
                }

                $data['title'] = "Usuários";
                $data['users'] = $this->users_model->get_users();



                $pagingConfig   = $this->paginationlib->initPagination("/users/p",$this->users_model->get_count(), 3);
           
                $data["pagination_helper"] = $this->pagination;
                $data['users'] = $this->users_model->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
            
                $this->load->view('templates/header', $data);
                $this->load->view('users/index', $data);
                $this->load->view('templates/footer');            

        }

        public function add_user()
        {
                $this->form_validation->set_rules('username', 'Nome de Usuário', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email', 'E-Mail', 'required');
                $this->form_validation->set_rules('class', 'Classe', 'required');

                if ($this->form_validation->run() === FALSE)
                {      
                    $data['message_display'] = 'Usuário criado com sucesso!';
                    $this->index(1, $data);

                }
                else
                {
                    $this->users_model->add_user();
                    $data['message_display'] = 'Usuário criado com sucesso!';
                    $this->index(1, $data);
                }
        }

        public function delete($id = NULL)
        {
            $this->users_model->del_users($id);

            //$this->index();
            redirect(base_url('/users/'), 'location');

        }

        public function edit($id=NULL)
        {
                $data['title'] = 'Editar Link';
                $data['users'] = $this->users_model->get_users($id);

                $this->form_validation->set_rules('username', 'Nome de Usuário', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email', 'E-Mail', 'required');
                $this->form_validation->set_rules('class', 'Classe', 'required');

                if ($this->form_validation->run() == FALSE)
                {      

                    $this->load->view('templates/header', $data);
                    $this->load->view('users/edit', $data);
                    $this->load->view('templates/footer');

                }
                else
                {
                    $id = $this->input->post('id');
                    $this->users_model->edit_users($id);
                    $data['message_display_edit'] = 'Usuário editado com sucesso!';

                    $this->index(1, $data);
                }

        }

        public function perfil($id = NULL)
        {
                $data['user'] = $this->users_model->get_users($id);
                 if (empty($data['user']))
                {
                        show_404();
                }

                $data['title'] = "Perfil";

                $this->load->view('templates/header', $data);
                $this->load->view('users/perfil', $data);
                $this->load->view('templates/footer');
        }
}
?>