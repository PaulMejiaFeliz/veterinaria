<?php

  session_start();
  if(!isset($_SESSION['usuario']) && !defined('LOGIN')){
    redirect('Login');
  }
