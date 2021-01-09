<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

session_start();
require_once "../models/UsuarioModel.php";

class LoginController
{
  public $rut;
  public $clave;

  public function __construct()
  {
    $this->rut = $_POST["rut"];
    $this->clave = $_POST["clave"];
  }

  public function iniciarSesion()
  {
    if ($this->rut == "" || $this->clave == "") {
      $_SESSION["error"] = "<></i> Porfavor completa todos los campos";
      header("Location: ../index.php");
      return;
    }

    $model = new UsuarioModel();
    $array = $model->buscarUsuarioVendedor($this->rut, $this->clave);

    if (count($array) == 0) {
      $_SESSION["error"] = "<></i> Usuario No a sido encontrado";
      header("Location: ../index.php");
      return;
    }

    $_SESSION["user"] = $array[0];

    header("Location: ../views/clientes.php");
  }
}

$obj = new LoginController();
$obj->iniciarSesion();
