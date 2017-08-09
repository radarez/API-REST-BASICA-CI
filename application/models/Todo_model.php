<?php
class Todo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
   public function index(){/*...*/}

    public function list()
    {
        $query = $this->db->select('id, nombre_usuario, nombre_tarea, descripcion_tarea, creada_en')
        ->from('todo')
        ->get();
        // echo $this->db->last_query();
        $num_rows = sizeof($query->result());

        if($num_rows > 0){
            return $query->result();
        }else{
            return $query->row();
        }
    }

    public function add(string $nombre_usuario, string $nombre_tarea, string $descripcion_tarea)
    {
        $data = array(
            'nombre_usuario' => $nombre_usuario,
            'nombre_tarea' => $nombre_tarea,
            'descripcion_tarea' => $descripcion_tarea,
        );

        //Inserción de tarea
        $this->db->insert('todo', $data);
        if($this->db->affected_rows() === 1)
        {
            return $this->db->insert_id();
        }
        return false;
    }

    public function update(int $id, string $nombre_usuario, string $nombre_tarea, string $descripcion_tarea)
    {
        $this->db->set('nombre_usuario', $nombre_usuario);
        $this->db->set('nombre_tarea', $nombre_tarea);
        $this->db->set('descripcion_tarea', $descripcion_tarea);

        $this->db->where('id', $id);
        $this->db->update('todo');
        //echo $this->db->last_query();

        if($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('todo');

        if($this->db->affected_rows() === 1)
        {
            return true;
        }
        return false;
    }
}