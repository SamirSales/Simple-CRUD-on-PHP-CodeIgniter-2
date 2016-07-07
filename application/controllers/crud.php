<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('crud_model');
		$this->load->library('table');
	}

	public function index(){
		$this->setTitleAndScreen('CRUD no CodeIgniter','');
  }

	public function create(){
		//setting validation...
		$this->nameFormValidation();
		$this->loginAndEmailFormValidation();
		$this->passwordFormValidation();

		if($this->form_validation->run() == TRUE){
			$dados = elements(array('name','email','login','password'),$this->input->post());
			$dados['password'] = md5($dados['password']);
			$this->crud_model->do_insert($dados);
			// echo "successfully performed validation!";
		}else{
			// echo "validation failed!";
		}

		$this->setTitleAndScreen('CRUD &raquo; Create','create');
	}

	public function retrieve(){
		$this->setTitleScreenUsers('CRUD &raquo; Retrieve','retrieve',$this->crud_model->get_all()->result());
	}

	public function update(){
		$this->nameFormValidation();
		$this->passwordFormValidation();

		if($this->form_validation->run() == TRUE){
			$dados = elements(array('name','password'),$this->input->post());
			$dados['password'] = md5($dados['password']);
			$this->crud_model->do_update($dados,array('id'=>$this->input->post('iduser')));
			// echo "successfully performed validation!";
		}else{
			// echo "validation failed!";
		}
		$this->setTitleAndScreen('CRUD &raquo; Update','update');
	}

	public function delete(){
		if($this->input->post('iduser')>0){
			$this->crud_model->do_delete(array('id'=>$this->input->post('iduser')));
		}
		$this->setTitleAndScreen('CRUD &raquo; Delete','delete');
	}

	/* SETTING VALIDATION AND REFERENCE RULES */

	private function nameFormValidation(){
		$this->form_validation->set_rules('name','NOME','trim|required|max_length[50]|ucwords');
	}

	private function loginAndEmailFormValidation(){
		$this->form_validation->set_message('is_unique','Alguém já está usando esse %s.');
		$this->form_validation->set_rules('email','EMAIL','trim|required|max_length[50]|strtolower|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('login','LOGIN','trim|required|max_length[25]|strtolower|is_unique[user.login]');
	}

	private function passwordFormValidation(){
		$this->form_validation->set_rules('password','PASSWORD','trim|required|strtolower');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('password2','REPEAT PASSWORD','trim|required|strtolower|matches[password]');
	}

	/* SCREEN SETTING FUNCTIONS */

	private function setTitleScreenUsers($title, $screen, $users){
		$dados = array(
			'title' => $title,
			'screen' => $screen,
			'users' => $users,
		);
		$this->load->view('crud', $dados);
	}

	private function setTitleAndScreen($title, $screen){
		$this->setTitleScreenUsers($title,$screen, null);
	}
}
