<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helloworld extends CI_Controller {

	public function index()
	{
		$this->load->view('hello_world');
	}

	public function exemplo3(){
		$dados = array(
			'texto' => 'passando parametros',
			'numero' => 23,
			'animais' => array(
				0 => 'cachorro',
			 	1 => 'gato',
				2 => 'rato'),
			'segmento' => $this->uri->segment(3),
		);
		$this->load->view('exemplo3',$dados);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
