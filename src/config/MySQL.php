<?php

class MySQL{
  private $dbHost = "localhost";
  //Sonradan sorun Çıkarsa Diye port ekleyebiliriz
  private $port = "3306";
  private $dbUser = "root";
  private $dbPass = "mysql";
  private $dbName = "restfulDeneme";

  public function Connect(){
    $mysqlCon = "mysql:host=$this->dbHost;dbname=$this->dbName;charset=utf8";
    $db = new PDO($mysqlCon, $this->dbUser,$this->dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
}

 ?>
