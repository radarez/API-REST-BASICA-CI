<?php
defined('BASEPATH') or exit('No direct script access allowed');
//Load libruary for API
require APPPATH . '/libraries/REST_Controller.php';
class Todo extends REST_Controller
{
   function __construct() {
        parent::__construct();
    }
    /** listar
     * @author Adrian
     */
    public function todo_get()
    {
        $rows = $this->Todo_model->list();
        if (!is_null($rows)) {
            $this->response(array('response' => $rows), 200);
        } else {
            return $this->response(array('response' => 'No records found :('), 200);
        }
    }

    /** Guardar
     * @author Adrian
     */
    public function todo_post()
    {
        $rows = $this->Todo_model->add($this->post('nombre_usuario'), $this->post('nombre_tarea'), $this->post('descripcion_tarea'));
        if(!is_null($rows))
        {
            $this->response(array('response' => $rows), 200);
        }else{
            $this->response(array('response' => 'La tarea no se guardo :('), 400);
        }
    }

    /** Update
     * @author Adrian
     */
    public function todo_put($id, $nombre_usuario, $nombre_tarea, $descripcion_tarea) {

        $update = $this->Todo_model->update($id, $nombre_usuario, $nombre_tarea, $descripcion_tarea);

        if(!is_null($update)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('response' => 'No fue posible actualizar la ubicación'), 400);
        }
    }

    public function todo_delete($id)
    {
        if (!$id)
        {
            $this->response(null, 400);
        }
        $delete = $this->Todo_model->delete($id);

        if(!is_null($delete))
        {
            $this->response(array('response' => 'Tarea eliminada correctamente'), 200);
        }else{
            $this->response(array('response' => 'La tarea fue eliminada'), 400);
        }
    }
}
