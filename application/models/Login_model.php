<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

    private $table = 'administrador';

    public function autentica(){

        $this->db->where('nome', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0):
            return $query->row();
        else:
            return false;
        endif;

        
    }

}
