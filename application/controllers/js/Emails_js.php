<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emails_js extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');

        
        if($this->session->userdata('logged_in') != true):
            redirect('login/autentica');
        endif;

    }

    public function index(){
        
        $this->load->database();
        $this->load->model('Email_model','email');
        $list = $this->email->get_datatables();
        
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $post) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$post->email."</center>";
            $data[] = $row;     
        }

        

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->email->count_all(),
            "recordsFiltered" => $this->email->count_filtered(),
            "data" => $data,
        );

        //output to json format
        
        echo json_encode($output);

    }

    

}
