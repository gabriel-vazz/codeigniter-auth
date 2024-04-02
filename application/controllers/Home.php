<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->has_userdata('usuario')) {
            redirect('/login');
        }

        $sessao = $this->session->userdata('usuario');

        $this->load->view('home', [
            'usuario' => $sessao
        ]);
    }
}