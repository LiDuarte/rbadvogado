<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function autentica(){
        $dados = null;
        $dados['log_error'] = null;
        $dados['validation_errors'] = null;
      
        if($this->input->post('Login') == 'Login'):
            
            $this->load->database();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Login', 'required');
            $this->form_validation->set_rules('password', 'Senha', 'required');
    
            if ($this->form_validation->run() == true)
            {
                $this->load->model('Login_model','login');
                
                if($this->login->autentica()):
                    $usuario = $this->login->autentica();

                    
                    $this->load->library('session');
                    $session = [
                        'id' => $usuario->id,
                        'nome' => $usuario->nome,
                        'email' => $usuario->email,
                        'status' => $usuario->status,
                        'logged_in' => true
                    ];

                    $this->session->set_userdata($session);

                    sleep(1);
                    redirect('administrador/');
                else:
                    
                    $dados['log_error'] = 'Usuario ou senha incorretos';
                endif;
            }else{
                $dados['validation_errors'] = validation_errors();
            }
                

        endif;

        $this->load->view('pages/login', $dados);
    }

}
