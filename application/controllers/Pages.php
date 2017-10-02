<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	
	public function index()
	{

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
