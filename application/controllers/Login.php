<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    define('LOGIN', true);
    parent::__construct();
    $this->load->model('modelo');

  }

  function index()
  {
    $this->load->view('usuario/login');
  }

function entrar()
  {
    $usuarios=$this->modelo->mostrar('usuario2');
    $usuario=$this->modelo->mostrarUno('usuario2', $_POST['nombre'], "nombre=");
    if(count($usuarios)>0){
      if(isset($usuario->nombre) && isset($usuario->clave)){
        if ($usuario->clave===md5($_POST['clave'])) {
          $_SESSION['usuario']=1;
          redirect('Accion');
        }else{
          $datos['err']="<script> window.alert(\"Error con los datos.\");</script>";
          $this->load->view('usuario/login',$datos);
        }
      }else{
        $datos['err']="<script> window.alert(\"No se ha encontrado este usuario.\");</script>";
        $this->load->view('usuario/login',$datos);
      }
    }else if ($_POST['nombre']=='admin' && $_POST['clave']=='1tl4w3b'){
      $_SESSION['usuario']=1;
      redirect('Accion');
    }else{
      $datos['err']="<script> window.alert(\"Error con los datos.\");</script>";
      $this->load->view('usuario/login',$datos);
    }
  }

  function salir()
  {
    session_destroy();
    redirect('login');
  }

}
