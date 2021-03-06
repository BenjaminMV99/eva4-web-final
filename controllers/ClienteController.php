<?php

namespace controllers;

use models\ClienteModel as ClienteModel;

session_start();
require_once "../models/ClienteModel.php";

class ClienteController
{
  public $clirut;
  public $cliname;
  public $clifono;
  public $clidir;
  public $clifecha;
  public $cliemail;

  public function __construct()
  {
    $this->clirut = $_POST["clirut"];
    $this->cliname = $_POST["cliname"];
    $this->clidir = $_POST["clidir"];
    $this->clifono = $_POST["clifono"];
    $this->clifecha = $_POST["clifecha"];
    $this->cliemail = $_POST["cliemail"];
  }

  public function crearCliente()
  {
    if ($this->clirut == "" || $this->cliname == "" || $this->clidir == "" || $this->clifono == "" || $this->clifecha == "" || $this->cliemail == "") {
      $_SESSION["errorCli"] = "<i></i> Porfavor relle todos los campos";
      header("Location: ../views/vistaClientes.php");
      return;
    }

    $model = new ClienteModel();
    $dataCli = [
      "clirut" => $this->clirut,
      "cliname" => $this->cliname,
      "clidir" => $this->clidir,
      "clifono" => $this->clifono,
      "clifecha" => $this->clifecha,
      "cliemail" => $this->cliemail,
    ];

    $count = $model->insertarCliente($dataCli);
    if ($count == 1) {
      $_SESSION["respuestaCli"] = "<></i> El cliente fue creado";
    } else {
      $_SESSION["errorCli"] = "<></i> Los datos generan un error en la base de datos";
    }
    header("Location: ../views/vistaClientes.php");
  }
}

$obj = new ClienteController();
$obj->crearCliente();
