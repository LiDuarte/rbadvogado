<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	function __construct(){
		parent::__construct();
		$dados['error'] = null;
	}
	
	public function index()
	{	
		$dados['publicacao'] = null;
		$this->load->database();
		$this->load->model('Publicacao_model','publicacao');
		$dados['publicacao'] = $this->publicacao->find();

		$dados['page'] = 'index';

		$this->load->view('master_pages', $dados);
	}

	public function escritorio()
	{

		$dados['page'] = 'escritorio';

		$this->load->view('master_pages', $dados);
	}
	public function atuacao()
	{

		$dados['page'] = 'atuacao';

		$this->load->view('master_pages', $dados);
	}
	public function publicacao()
	{

		$dados['page'] = 'publicacoes';

		$this->load->view('master_pages', $dados);
	}

	public function contato()
	{

		$dados['page'] = 'contato';

		$this->load->view('master_pages', $dados );
	}
}
