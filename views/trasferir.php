<?php  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Trasferir Dinero</title>
    <?php
        require_once('../modelo/Usuario.php');
        $data = new Mysql();
        $sql = "SELECT * FROM documento";
        $resSql = $data->select_all($sql);
        //print_r($resSql);
     ?>
  </head>
  <body>
     <section class="transfer">
       <h1>Transacciones</h1>
         <a href="index.php" class="regresar">Regresar</a>
       <div class="div-transfer">
            <form class="form-transfer" action="" method="post">

                <label for="cedula">Tipo de Documento</label>
                <select class="select-transfer" name="TipoDoc">
                  <option value="">SELECCIONE</option>
                  <?php
                    foreach ($resSql as  $documento) {
                      echo '<option value="'.$documento['id_tipodocumento'].'">'.strtoupper($documento['nombre_tipodocumento']).'</option>';
                    }
                   ?>
                </select>
                <input type="text" name="identificacion" value="" placeholder="DIGITE SU ID">
                <label for="">Monto </label>
                <input type="text" name="saldoTra" value="">
                <input type="submit" name="enviar" value="Consignar">
                <input type="submit" name="retirar" value="Retirar">
            </form>
       </div>
     </section>
  </body>
</html>

<?php

    if(isset($_POST['enviar'])){
      $tipoId = $_POST['TipoDoc'];
      $id  = $_POST['identificacion'];
      $saldo = $_POST['saldoTra'];
      if ($tipoId != '' && $id != '' && $id != '' && ctype_digit($saldo)) {
            $sql = "SELECT id_usuario FROM usuario WHERE identificacion=$id and tipodocumento = $tipoId";
            $query = $data->select($sql);
            //print_r($query);
            $id_usuario =  $query['id_usuario'];
            echo $id_usuario;
            if($query['id_usuario'] != '' && ctype_digit($saldo)){
               $sqlUpdate = " UPDATE usuario SET saldoinicial = saldoinicial + ? WHERE id_usuario = $id_usuario";
               $arrayDato = array($saldo);
               $resUpdate = $data->update($sqlUpdate,$arrayDato);
               echo "Datos Actualizados";
            }else{
              echo "Fallo! Datos incorrectos";
            }

      }else{
        echo "datos vacios";
      }
    }else if (isset($_POST['retirar'])) {
      $tipoId = $_POST['TipoDoc'];
      $id  = $_POST['identificacion'];
      $saldo = $_POST['saldoTra'];
      if ($tipoId != '' && $id != '' && $id != '' && ctype_digit($saldo)) {
            $sql = "SELECT id_usuario FROM usuario WHERE identificacion=$id and tipodocumento = $tipoId";
            $query = $data->select($sql);
            //print_r($query);
            $id_usuario =  $query['id_usuario'];
            echo $id_usuario;
            if($query['id_usuario'] != '' && ctype_digit($saldo)){
               $sqlUpdate = " UPDATE usuario SET saldoinicial = saldoinicial - ? WHERE id_usuario = $id_usuario";
               $arrayDato = array($saldo);
               $resUpdate = $data->update($sqlUpdate,$arrayDato);
               echo "Datos Actualizados";
            }else{
              echo "Fallo! Datos incorrectos";
            }

      }else{
        echo "datos vacios";
      }
    }else{
      echo "No se Proceso la informacion";
    }
 ?>
