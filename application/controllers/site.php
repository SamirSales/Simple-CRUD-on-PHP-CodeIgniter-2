<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$dados = array(
			'titulo1' => 'Primeira Parte',
			'titulo2' => 'Cabeçalho um!!!',
		);
		$this->load->view('site', $dados);
	}

	public function dois(){
		$dados = array(
			'titulo1' => 'Segunda Parte',
			'titulo2' => 'EEeeeehhh! Não sei!',
		);
		$this->load->view('site', $dados);
	}
}
