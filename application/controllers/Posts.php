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

###################################################################################################

    public function editar(int $id) {

        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('post');

        $post = $this->post->getById($id);

        if($this->post->validar()) {
            $data = $this->input->post();
            $update = $this->post->update($data, $id);

            if($update) {
                $this->session->set_flashdata(
                    'atualizado', 
                    'Sua postagem foi atualizada com sucesso!'
                );
                redirect('/perfil');
            }
        }

        $this->load->view('/posts/editar', [
            'post' => $post[0]
        ]);
    }

###################################################################################################

    public function deletar(int $id) {

        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('post');

        $delete = $this->post->delete($id);

        if($delete) {
            $this->session->set_flashdata(
                'deletado',
                'Seu post foi deletado com sucesso!'
            );
            redirect('/perfil');
        }
    }
}