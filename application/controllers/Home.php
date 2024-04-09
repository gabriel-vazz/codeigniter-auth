<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {

        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        $this->load->model('usuario');

        if(!$this->session->has_userdata('usuario')) {
            redirect('/login');
        }

        $sessao = $this->usuario->getSession();
        $usuarios = $this->usuario->getAll();

        $this->load->view('home', [
            'sessao' => $sessao,
            'usuarios' => $usuarios
        ]);
    }

###################################################################################################

    public function pesquisa(string $data) {
        
        $this->load->library('session');
        $this->load->model('usuario');

        $pesquisa = $this->usuario->pesquisar($data);

        $this->load->view('/components/tabela', [
            'sessao' => $this->session->userdata('usuario'),
            'usuarios' => $pesquisa,
        ]);
    }
}