<?php 

class Posts extends CI_Controller {

    public function index() {

        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('post');
        $this->load->model('usuario');

        $session = $this->usuario->getSession();

        if($this->post->validar()) {
            $texto = $this->input->post('texto');

            $insert = $this->post->insert([
                'idpostou' => $session['id'],
                'texto' => $texto,
            ]);

            if($insert) {
                $this->session->set_flashdata(
                    'publicado',
                    'Sua postagem foi publicada com sucesso!'
                );
            }
            redirect('/perfil');
        }

        $this->load->view('/posts/novo');
    }
}