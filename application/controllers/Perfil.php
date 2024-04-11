<?php

class Perfil extends CI_Controller {

    public function index() {

        $this->load->model('usuario');
        $this->load->model('post');

        $perfil = $this->usuario->getSession();
        $posts = $this->post->getByUserId($perfil['id']);

        $this->load->view('/perfil/meu_perfil', [
            'perfil' => $perfil,
            'posts' => $posts
        ]);
    }

###################################################################################################

    public function editar() {

        $this->load->helper('url');
        $this->load->model('usuario');
        
        $usuario = $this->usuario->getSession();
        $data = $this->input->post();

        if($this->usuario->validar()) {
            $update = $this->usuario->update($data, $usuario['id']);

            if($update) {
                $this->session->set_flashdata(
                    'atualizado', 
                    'Seu perfil foi atualizado com sucesso!'
                );
                redirect('/perfil');
            }   
        } else {
            $this->load->view('/perfil/editar', [
                'perfil' => $usuario
            ]);
        }
    }

###################################################################################################

    public function usuario(int $id) {

        $this->load->helper('url');

        $this->load->model('usuario');
        $this->load->model('post');

        $perfil = $this->usuario->getById($id);
        $posts = $this->post->getByUserId($id);

        $sessao = $this->usuario->getSession();
        if($sessao['id'] == $id) {
            redirect('/perfil');
        }

        $this->load->view('/perfil/perfil', [
            'perfil' => $perfil[0],
            'posts' => $posts
        ]);
    }
}