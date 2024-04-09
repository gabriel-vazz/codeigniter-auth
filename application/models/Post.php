<?php 

class Post extends CI_Model {

    public $table = 'posts';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert(array $data) {
        return $this->db->insert($this->table, $data);
    }

    public function getAll() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function getByUserId(int $id) {
        $query = $this->db->get_where($this->table, ['idpostou' => $id]);
        return $query->result_array();    
    }

    public function validar() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'texto', 'Texto', 'required', 
            ['required' => 'Escreva sua postagem!',]
        );

        return $this->form_validation->run();
    }
}