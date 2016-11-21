<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->helper('url');
    $this->load->model('modelo');
  }

  function index()
  {
    $this->animal();
  }

  function guardar($tabla, $accion, $accion2)
  {
    if ($_POST) {
      $this->modelo->guardar($tabla, $_POST);
      $this->load->view($accion);
    } else {
      $this->load->view($accion2);
    }
  }

  function guardarA()
  {
    if ($_POST) {
      if($_POST['tipo']!=0){
        if (strcmp($_FILES['foto']["name"],"") && strcmp($_FILES["foto"]["tmp_name"],'')) {
          $foto = $_FILES["foto"]["name"];
          $url = $_FILES["foto"]["tmp_name"];
          $carpeta = "imgs/".$foto;
          $_POST['foto']=$carpeta;
          copy($url,$carpeta);
          $this->guardar('animal', 'animal/mensaje', 'animal/index');
        } else{
          $this->guardar('animal', 'animal/mensaje', 'animal/index');
        }
      }else{
        $err="<script> window.alert(\"Debe ingresar almenos un tipo.\");</script>";
        $this->tipo($err);
      }
    }
  }

  function guardarT()
  {
    $this->guardar('tipo', 'tipo/mensaje', 'tipo/index');
  }

  function guardarU()
  {
    if ($_POST) {
      if($_POST['clave']===$_POST['clave2']){
        unset($_POST['clave2']);
        $err='';
        $usuarios=$this->modelo->mostrar('usuario2');
        if($_POST['id']=="0"){
          foreach ($usuarios as $usuario) {
            if ($_POST['nombre']==$usuario->nombre) {
              $err="<script> window.alert(\"El nombre de usuario no esta disponible.\");</script>";
              $this->usuario($err);
            } else if($_POST['email']==$usuario->email){
              $err="<script> window.alert(\"El E-Mail de usuario no esta disponible.\");</script>";
              $this->usuario($err);
            }
          }
        }
        if ($err=='') {
          $_POST['clave']= md5($_POST['clave']);
          $this->guardar('usuario2', 'usuario/mensaje', 'usuario/index');
        }
      }else{
        $err="<script> window.alert(\"Las contraseñas no coincides.\");</script>";
        $this->usuario($err);
      }
    }
  }

  function borrar($tabla, $id, $accion)
  {
    $this->modelo->borrar($tabla, $id);
    $this->load->view($accion);
  }

  function borrarA(){
    $id = isset($_GET['del']) ? (int) $_GET['del'] : 0;
    $this->borrar('animal', $id, 'animal/mensaje');
  }

  function borrarT(){
    $id = isset($_GET['del']) ? (int) $_GET['del'] : 0;
    $this->borrar('tipo', $id, 'tipo/mensaje');
  }

  function borrarU(){
    $id = isset($_GET['del']) ? (int) $_GET['del'] : 0;
    $this->borrar('usuario2', $id, 'usuario/mensaje');
  }

  function tipo($err=null)
  {
    $data= array();
    $data['err']=$err;
    $data['tipo']=$this->modelo->mostrar('tipo');
    $id = isset($_GET['edit']) ? (int) $_GET['edit'] : 0;
    $data['edittipo'] = $this->modelo->mostrarUno('tipo', $id);
    $this->load->view("tipo/index", $data);
  }

  function usuario($err=null)
  {
    $data= array();
    $data['err']=$err;
    if ($err!=null && $_POST) {
      $data['editusuario']= new stdclass();
      foreach ($_POST as $key => $value) {
        $data['editusuario']->$key=$value;
      }
    } else {
      $id = isset($_GET['edit']) ? (int) $_GET['edit'] : 0;
      $data['editusuario'] = new stdclass();
      $data['editusuario'] = $this->modelo->mostrarUno('usuario2', $id);
    }
    $data['usuario']=$this->modelo->mostrar('usuario2');
    $this->load->view("usuario/index", $data);
  }

  function animal()
  {
    $data= array();
    $data['animal'] = $this->modelo->mostrar('animal');
    $id = isset($_GET['edit']) ? (int) $_GET['edit'] : 0;
    $data['editanimal'] = $this->modelo->mostrarUno('animal', $id);
    $data['tipo'] = $this->modelo->mostrar('tipo');
    if(count($data['tipo'])!=0){
      $this->load->view("animal/index", $data);
    }else {
      $err="<script> window.alert(\"Debe ingresar almenos un tipo.\");</script>";
      $this->tipo($err);
    }
  }

}
