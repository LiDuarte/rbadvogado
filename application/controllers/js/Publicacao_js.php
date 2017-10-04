<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao_js extends CI_Controller {

    function __construct(){
        parent::__construct();
        // carregamentos
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Publicacao_model','publicacao');
        $this->load->library('form_validation');

        $config['upload_path'] = "./upload/publicacao/";
        $config['allowed_types'] = "jpg|png|gif|jpeg";
        $this->load->library("upload", $config);

        
        if($this->session->userdata('logged_in') != true):
            redirect('login/autentica');
        endif;

    }

    public function index(){

        $list = $this->publicacao->get_datatables();
        
        $data = array();
        $no = $_POST['start'];
         $path_vusualizar = base_url("eventos/visualizar/");
         $path_excluir = base_url("js/Publicacao_js/excluir/");
        foreach ($list as $post) {
            $img = base_url("/upload/publicacao/$post->images");
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "<img src='$img'  width='100'>'";
            $row[] = $post->titulo;
            $row[] = substr($post->texto, 0,100)."...";
            $row[] = $post->data;
            $row[] = $post->horario;
            $row[] = "<a href='{$path_excluir}{$post->id}' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></i> Excluir</a>
            <a href='{$path_vusualizar}{$post->id}' class='btn-sm btn btn-info'><i class='fa fa-eye'></i> View</a>";
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
    public function publicar(){

        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('texto', 'Texto', 'required');

        if($this->form_validation->run() == TRUE) {
          if ($this->upload->do_upload('userfile') == true):
                if( $this->publicacao->registrar_publicacao()):
                    if($this->disparar_emails($this->input->post())):
                        // echo "Publicado";
                    endif;          
                endif;


            else:
                echo "Selecione uma Foto";
            endif;
        } else {
            echo validation_errors();
        }
    }

    function disparar_emails($dados =null){
        
        $dados['images'] = $this->upload->data('file_name');

         $this->load->model('Email_model');
         $email = $this->Email_model->find_all();
                            // Carrega a library email
                        $this->load->library('email');
                        $config['protocol'] = 'mail';
                        $config['mailpath'] = '/usr/sbin/sendmail';
                        $config['charset'] = 'utf-8';
                        $config['wordwrap'] = TRUE;
                        $config['mailtype'] = 'html';
                        $this->email->initialize($config);
            for($i=0; $i < count($email); $i++ ) {
                    
                    $this->email->from('contato@rbadvogadoseassociados.com.br', 'RB-Advogado');
                    $this->email->to($email[$i]['email']);
                    $this->email->cc($email[$i]['email']);
                    $this->email->bcc($email[$i]['email']);
                    
                    $this->email->subject($dados['titulo']);
                    $conteudo = $this->load->view("email_templates/email_disparo", array_merge($dados), TRUE);
                    $this->email->message($conteudo);
                    if($this->email->send()):
                        $this->session->set_flashdata('success','Email enviado com sucesso!');
                    else:
                        $this->session->set_flashdata('error',$this->email->print_debugger());
                    endif;
   
            }
                echo "Publicação efetuada !";    
    }

    public function excluir($id){
        $publicacao = $this->publicacao->find($id);
        if ($this->publicacao->delete_publicacao($id)):
           unlink("upload/publicacao/".$publicacao->images);
            echo "<script>alert('Publicação Excluida.'); window.location = 'http://rbadvogadoseassociados.com.br/administrador/publicacao';</script>";
        endif;

    }

    

}
