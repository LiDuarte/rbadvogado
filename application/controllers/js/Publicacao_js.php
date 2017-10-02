<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao_js extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');

        
        if($this->session->userdata('logged_in') != true):
            redirect('login/autentica');
        endif;

    }

    public function index(){
        
        $this->load->database();
        $this->load->model('Publicacao_model','publicacao');
        $list = $this->publicacao->get_datatables();
        
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $post) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $post->titulo;
            $row[] = $post->texto;
            $row[] = $post->data;
            $row[] = $post->horario;
            $data[] = $row;     
        }

        

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->publicacao->count_all(),
            "recordsFiltered" => $this->publicacao->count_filtered(),
            "data" => $data,
        );

        //output to json format
        
        echo json_encode($output);

    }

    

}
