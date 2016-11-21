<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function guardar($tabla, $contenido)
  {
    if($contenido['id']>0){
      $query = $this->db->where('id=',$contenido['id']);
      unset($contenido['id']);
      $this->db->update($tabla, $contenido);
    } else {
      $this->db->insert($tabla, $contenido);
    }
  }

  public function mostrar($tabla)
  {
    return $this->db->get($tabla)->result();
  }

  public function mostrarUno($tabla, $id, $campo='id='){
    $resultado = new stdclass();
    $query = $this->db->where($campo, $id);
    $query = $this->db->get($tabla);
    $rs = $query->result();
    if(count($rs) > 0){
      $resultado= $rs[0];
    }
    return $resultado;
  }

  public function borrar($tabla, $id)
  {
    $query = $this->db->where('id=',$id);
    $query = $this->db->delete($tabla);
  }

}
