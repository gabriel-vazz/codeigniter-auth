<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->has_userdata('usuario')) {
            redirect('/');
        }

        $this->load->view('/auth/login');
    }

###################################################################################################

    public function registrar() {

        $this->load->model('usuario');
        $this->load->helper('url');
        $this->load->library('session');

        if($this->usuario->validar()) {
            $data = $this->input->post();

            $usuarioExiste = $this->usuario->getByCredentials([
                'email' => $data['email']
            ]);

            if(!$usuarioExiste) {
                $hash = password_hash(
                    $data['senha'], PASSWORD_DEFAULT
                );
    
                $this->usuario->insert([
                    'nome' => $data['nome'],
                    'email' => $data['email'],
                    'senha' => $hash 
                ]);

                $this->session->set_flashdata(
                    'sucesso', 
                    'Sua conta foi criada com sucesso!'
                );
                redirect('/login');
            } else {
                $this->session->set_flashdata(
                    'erro_usuario_existente', 
                    'Esse usuário já existe.'
                );
            }
        }

        $this->load->view('/auth/registrar');
    }

###################################################################################################

    public function auth() {

        $this->load->model('usuario');
        $this->load->helper(['form', 'url']);
        $this->load->library('session');

        $input = $this->input->post();

        $usuario = $this->usuario->getByCredentials([
            'nome' => $input['nome']]
        );

        $auth = password_verify(
            $input['senha'], 
            $usuario[0]['senha']
        );

        if(!$auth) {
            $this->session->set_flashdata(
                'erro_credenciais', 
                'Credenciais Incorretas.'
            );
            redirect('/login');
        } else {
            $this->session->set_userdata('usuario', $usuario[0]);
            redirect('/');
        }
    }

###################################################################################################

    public function logout() {
        
        $this->load->library('session');
        $this->load->helper('url');
        
        if($this->session->has_userdata('usuario')) {
            $this->session->sess_destroy();
        }
        redirect('/login');
    }
}