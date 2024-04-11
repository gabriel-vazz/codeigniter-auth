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

    public function getAllPosts() {
        $this->db->select('
            posts.id, 
            posts.idpostou, 
            posts.texto, 
            usuarios.nome AS autor
        ');
        $this->db->from($this->table);
        $this->db->join('usuarios', 'usuarios.id = posts.idpostou');
 
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getById(int $id) {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->result_array();
    }

    public function update(array $data, int $id) {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete(int $id) {
        return $this->db->delete($this->table, ['id' => $id]);
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