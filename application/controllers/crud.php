<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {

//construtor
	public function __construct(){
		parent::__construct();
		$this->load->helper('url'); //ja esta sendo chamado no autoload
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('crud_model');
		$this->load->library('table');
	}

	public function index(){
    $dados = array(
			'titulo' => 'CRUD no CodeIgniter',
			'tela' => '',
		);
		$this->load->view('crud', $dados);
  }

	public function create(){
		//setting validation [REFERENCE RULES]
		$this->form_validation->set_rules('name','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_message('is_unique','Alguém já está usando esse %s.');
		$this->form_validation->set_rules('email','EMAIL','trim|required|max_length[50]|strtolower|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('login','LOGIN','trim|required|max_length[25]|strtolower|is_unique[user.login]');
		$this->form_validation->set_rules('password','PASSWORD','trim|required|strtolower');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('password2','REPEAT PASSWORD','trim|required|strtolower|matches[password]');

		if($this->form_validation->run() == TRUE){
			$dados = elements(array('name','email','login','password'),$this->input->post());
			$dados['password'] = md5($dados['password']);
			$this->crud_model->do_insert($dados);
			// echo "validação ok!";
		}else{
			// echo "ocorreu algum erro!";
		}

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
		);
		$this->load->view('crud', $dados);
	}

	public function retrieve(){
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'users' => $this->crud_model->get_all()->result(),	//pegando em forma de objeto
		);
		$this->load->view('crud', $dados);
	}

	public function update(){
		//setting validation [REFERENCE RULES]
		$this->form_validation->set_rules('name','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('password','PASSWORD','trim|required|strtolower');
		$this->form_validation->set_message('matches','O campo %s está diferente do campo %s.');
		$this->form_validation->set_rules('password2','REPEAT PASSWORD','trim|required|strtolower|matches[password]');

		if($this->form_validation->run() == TRUE){
			$dados = elements(array('name','password'),$this->input->post());
			$dados['password'] = md5($dados['password']);
			$this->crud_model->do_update($dados,array('id'=>$this->input->post('iduser')));
			// echo "validação ok!";
		}else{
			// echo "ocorreu algum erro!";
		}

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
		);
		$this->load->view('crud', $dados);
	}

	public function delete(){
		if($this->input->post('iduser')>0){
			$this->crud_model->do_delete(array('id'=>$this->input->post('iduser')));
		}

		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete',
		);
		$this->load->view('crud', $dados);
	}
}
