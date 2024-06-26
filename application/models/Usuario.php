<?php

class Usuario extends CI_Model {

    public $table = 'usuarios';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getByCredentials(array $data) {
        $query = $this->db->get_where($this->table, $data);
        return $query->result_array();
    }

    public function getById(int $id) {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->result_array();
    }

    public function insert(array $data) {
        return $this->db->insert($this->table, $data);
    }

    public function update(array $data, $id) {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function validar() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nome', 'Nome',
            'required|min_length[3]|max_length[20]',
            [
                'required' => 'O campo %s não pode estar em branco.',
                'min_length' => 'Campo %s deve ter no mínimo 3 caracteres.',
                'max_length' => 'Campo %s deve ter no máximo 20 caracteres.'
            ]
        );
        
        $this->form_validation->set_rules(
            'email', 'E-Mail', 
            'required|valid_email',
            [
                'required' => 'O campo %s não pode estar em branco.',
                'valid_email' => 'Seu E-Mail é inválido.'
            ]
        );

        $this->form_validation->set_rules(
            'senha', 'Senha',
            'required|min_length[7]|max_length[20]',
            [
                'required' => 'O campo %s não pode estar em branco.',
                'min_length' => 'Campo %s deve ter no mínimo 7 caracteres.',
                'max_length' => 'Campo %s deve ter no máximo 20 caracteres.'
            ]
        );

        return $this->form_validation->run();
    }

    public function pesquisar(string $pesquisa) {
        $this->db->like('nome', $pesquisa);
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }

    public function getSession() {
        $this->load->library('session');

        $session = $this->session->userdata('usuario');
        $query = $this->db->get_where($this->table, ['id' => $session['id']]);

        return $query->result_array()[0];
    }
}