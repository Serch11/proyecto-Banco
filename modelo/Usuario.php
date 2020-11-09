<?php
require_once("../views/Mysql.php");

class Usuario  extends Mysql{


    private $strnombres;
    private $strapellidos;
    private $strtipoId;
    private $stridentificacion;
    private $strsexo;
    private $strtipoCuenta;
    private $strsaldo;

    function __construct(){

        parent::__construct();
    }

    public function insertUser(string $nombre , string $apellidos , int $tipoId , int $identificacion ,int $sexo, int $saldo, int $tipoCuenta){

    	$this->strnombres = $nombre;
    	$this->strapellidos = $apellidos;
    	$this->strtipoId = $tipoId;
    	$this->stridentificacion = $identificacion;
    	$this->strsexo = $sexo;
    	$this->strsaldo = $saldo;
    	$this->strtipoCuenta = $tipoCuenta;

    	$sql = "INSERT INTO  usuario(nombre,apellidos,tipodocumento,identificacion,sexo,saldoinicial,tipocuenta) VALUES(?,?,?,?,?,?,?)";
    	$array = array($this->strnombres,$this->strapellidos,$this->strtipoId,$this->stridentificacion,$this->strsexo,$this->strsaldo,$this->strtipoCuenta);
    	$resInsert = $this->insert($sql , $array);
    	return $resInsert;

    }

    public function selectUsers(){

      $sql = "SELECT u.nombre , u.apellidos , d.nombre_tipodocumento , u.identificacion , s.nombre_tiposexo ,
              u.saldoinicial , c.nombre_cuenta
              FROM usuario u inner JOIN documento d  on u.tipodocumento = d.id_tipodocumento INNER JOIN sexo s on
              u.sexo = s.id_sexo INNER JOIN cuenta c on u.tipocuenta = c.id_cuenta";
      $resquery = $this->select_all($sql);
      return $resquery;
    }

    public function mayorSaldo(){
     $sql = "SELECT  u.nombre , u.apellidos , u.identificacion , u.saldoinicial 
     FROM usuario u HAVING MAX(u.saldoinicial)";
      $resquery = $this->select_all($sql);
      return $resquery;
    }




}

?>
