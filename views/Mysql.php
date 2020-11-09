<?php

require_once("../conexion.php");

class Mysql extends Conexion
{
    private $strsql;
    private $arrayValue;
    private $conexion;

    function __construct(){

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    //insertar datos
    public function insert(string $sql , array $array){

        $this->strsql = $sql;
        $this->arrayValue = $array;
        $insert = $this->conexion->prepare($this->strsql);
        $resquery = $insert->execute($this->arrayValue);
        if($resquery){
            return $resquery;
        }else{
            return $resquery = 0;
        }
    }
    //seleccionar mas de eun registro
    public function select_all($sql){

        $this->strsql = $sql;
        $query = $this->conexion->prepare($this->strsql);
        $query->execute();
        $data = $query->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }
    //seleccionar un registro
    public function select ($sql){

      $this->strsql  = $sql;
      $query = $this->conexion->prepare($this->strsql);
      $query->execute();
      $data  = $query->fetch(PDO::FETCH_ASSOC);
      return $data;
    }
    //actualizar usuarios
    public function update($sql , $array){

      $this->strsql = $sql;
      $this->arrayValue = $array;
      $update = $this->conexion->prepare($this->strsql);
      $resUpdate = $update->execute($this->arrayValue);
      return $resUpdate;

    }

   
  
}


?>
