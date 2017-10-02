<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');

        
        if($this->session->userdata('logged_in') != true):
            redirect('login/autentica');
        endif;

    }


    public function index(){
        $dados = array(
            'page' => 'index'
        );

        $this->load->view('admin/administrador_master', $dados);
    }

    public function publicacao(){
        $dados = array(
            'page' => 'publicacao'
        );

        $this->load->view('admin/administrador_master', $dados);
    }

    public function logout(){
            sleep(1);
            session_destroy();
            redirect('login/autentica');
        
    }

}