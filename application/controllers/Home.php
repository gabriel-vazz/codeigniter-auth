<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {

        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        $this->load->model('usuario');
        $this->load->model('post');

        if(!$this->session->has_userdata('usuario')) {
            redirect('/login');
        }

        $sessao = $this->usuario->getSession();
        $posts = $this->post->getAllPosts();

        $this->load->view('home', [
            'sessao' => $sessao,
            'posts' => $posts
        ]);
    }

###################################################################################################

    public function pesquisa(string $pesquisa) {

        $this->load->model('usuario');
        $resultados = $this->usuario->pesquisar($pesquisa);

        $this->load->view('/components/perfis', [
            'usuarios' => $resultados
        ]);

    }
}