

<?php

Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

// Load database
		$this->load->model('login_model');
		$this->load->model('links_model');
        $this->load->model('projetos_model');
        $this->load->model('news_model');
	}

// Show login page
	public function index() {
		$this->load->view('login/index');
	}

// Show registration page
	public function registration() {
		$this->load->view('login/registration');
	}

// Validate and store registration data in database
	public function new_user_registration() {

// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/registration');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email_value'),
				'password' => $this->input->post('password'),
				'class' => 1,
				'created' => date("Y-m-d H:i:s"),
				);
			$result = $this->login_model->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registo efetuado com sucesso!';
				$this->load->view('login/index', $data);
			} else {
				$data['message_display'] = 'User já existe!';
				$this->load->view('login/registration', $data);
			}
		}
	}

// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$data['title'] = 'Home';
				$data['links'] = $this->links_model->get_recent_links();
                $data['projetos'] = $this->projetos_model->get_projetos();
                $data['projetos_andamento'] = $this->projetos_model->get_andamento(0, 10);
                $data['news'] = $this->news_model->get_by_range(0,3);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');
			}else{
				$this->load->view('login/index');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			$result = $this->login_model->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->login_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'id' => $result[0]->id,
						'username' => $result[0]->username,
						'email' => $result[0]->email,
						'logged_in' => TRUE,
						'class' => $result[0]->class,
						'avatar' => $result[0]->avatar
						);
					// Add user data in session
					$this->session->set_userdata($session_data);
					$data['title'] = 'Home';
					$data['links'] = $this->links_model->get_recent_links();
                	$data['projetos'] = $this->projetos_model->get_projetos();
                	$data['projetos_andamento'] = $this->projetos_model->get_andamento(0, 10);
                	$data['news'] = $this->news_model->get_by_range(0,3);
					$this->load->view('templates/header', $data);
                	$this->load->view('pages/home', $data);
                	$this->load->view('templates/footer');
				}
			} else {
				$data = array(
					'error_message' => 'Username ou Password inválidos!'
					);
				$this->load->view('login/index', $data);
			}
		}
	}

// Logout from admin page
	public function logout() {

// Removing session data
		$sess_array = array(
			'username' => ''
			);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login/index', $data);
	}

}

?>

