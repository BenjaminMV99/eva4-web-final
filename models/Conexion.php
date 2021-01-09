<?php

namespace models;

class Conexion
{
  //public static $user = "uszcfwlnyj4kx83o";
  //public static $pass = "3YYNo72sWCQ4QMDtTdXL";
  //public static $URL = "mysql:host=bgmykwwo2imhrgeas5hm-mysql.services.clever-cloud.com;dbname=bgmykwwo2imhrgeas5hm";

  public static $user = "u5jpiuqu2grudqnq";
  public static $pass = "WTlh3eHFtFfSjVHmiXHD";
  public static $URL = "mysql:host=bm8zus3nc1qisz2xfkkb-mysql.services.clever-cloud.com;dbname=bm8zus3nc1qisz2xfkkb";

  public static function conector()
  {
    try {
      return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
    } catch (\PDOException $e) {
      return null;
    }
  }
}
