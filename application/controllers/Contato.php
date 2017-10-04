<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function enviar(){
        if($this->input->post("enviar") == "Enviar"):
                // Carrega a library email
            $this->load->library('email');
        $config['protocol'] = 'mail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);


        $this->email->from($this->input->post("email"), 'RB-Advogado - Contato');
        $this->email->to("contato@rbadvogadoseassociados.com.br");
        $this->email->cc("contato@rbadvogadoseassociados.com.br");
        $this->email->bcc(" contato@rbadvogadoseassociados.com.br");

        $this->email->subject($this->input->post("nome"));
        $conteudo = $this->load->view("email_templates/email_contato", $this->input->post(),TRUE);
        $this->email->message($conteudo);
        if($this->email->send()):
           echo "<script>alert('Email Enviado com sucesso'); window.location = 'http://rbadvogadoseassociados.com.br/pages/contato/';</script>";
       else:
        echo "Informe um email válido";
    endif;

    endif;
}

public function registrar_email(){
    $dados['error'] = null;
    $this->load->database();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[emails.email]|valid_email');

    if($this->form_validation->run() == TRUE) {
        $this->load->model('Email_model','email');
        if($this->email->registrar_email()):
            echo "<script>alert('Email Registrado com sucesso'); window.location = 'http://rbadvogadoseassociados.com.br/';</script>";
        endif;
    } else {           

        print"<script>alert('Este email já foi registrado ou é inválido'); window.location = 'http://rbadvogadoseassociados.com.br/';</script>";

    }    
}



}
