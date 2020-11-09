
	<?php
		require_once('../modelo/Usuario.php');

		$data = new Mysql();
		$query = "SELECT * FROM documento";
		$querySexo = "SELECT * FROM sexo";
		$queryCuenta = "SELECT * FROM cuenta";
		$resDocumento =  $data->select_all($query);
		$resSexo = $data->select_all($querySexo);
		$resCuenta = $data->select_all($queryCuenta);
	 ?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="../css/style.css">
	<title>Registrar Usuario</title>
</head>
<body>

	<section>
		<h1>Crear Usuario</h1>
		<div class="formulario">
		<a href="index.php" class="regresar">Regresar</a>
			<form action="" method="POST" accept-charset="utf-8">
				<label>Nombres:</label>
				<input type="text" name="nombres">
				<label for="">Apellidos</label>
				<input type="text" name="apellidos">
				<label for="">Tipo de identificacion</label>
				<select  name="tipoId">
					<option value=""> SELECCIONE</option>
					<?php
						foreach ($resDocumento as $documento) {
							echo'<option value="'.$documento['id_tipodocumento'].'">'.strtoupper($documento['nombre_tipodocumento']).'</option>';
						}
					 ?>
				</select>
				<label for="">Identificacion</label>
				<input type="text" name="identificacion">
				<label for="">Sexo</label>
				<select name="sexo">
					<option value="">SELECCIONE</option>
					<?php
						foreach ($resSexo as $sexo) {
						echo'<option value="'.$sexo['id_sexo'].'">'.strtoupper($sexo['nombre_tiposexo']).'</option>';
						}
					 ?>
				</select>
				<label for="">Tipo de cuenta</label>
				<select name="tipo_cuenta">
					<option value="">SELECCIONE</option>
					<?php
						foreach ($resCuenta as $cuenta) {
						echo'<option value="'.$cuenta['id_cuenta'].'">'.strtoupper($cuenta['nombre_cuenta']).'</option>';
						}
					 ?>
				</select>
				<label for="">Saldo Inicial</label>
				<input type="text" name="saldo">

				<div class="submit">
				<input type="submit" value="Guardar" class="guardar" name="enviar">
				<input type="submit" value="Limpiar" class="limpiar">
				</div>
			</form>
		</div>
	</section>
</body>
</html>


<?php

	if (isset($_POST['enviar'])) {

		$nombre = $_POST['nombres'];
		$apellido = $_POST['apellidos'];
		$tipoId = $_POST['tipoId'];
		$identificacion = $_POST['identificacion'];
		$sexo = $_POST['sexo'];
		$tcuenta = $_POST['tipo_cuenta'];
		$saldo = $_POST['saldo'];
		if(ctype_digit($sexo)&& ctype_digit($tcuenta) && ctype_digit($identificacion) && ctype_digit($identificacion)){

			if ($nombre != '' && $apellido != '' && $tipoId != '' && $identificacion != '' && $sexo != '' && $tcuenta != ''&& $saldo != '') {

				$usuario = new Usuario();
				$usuario->insertUser($nombre,$apellido,$tipoId,$identificacion,$sexo ,$saldo ,$tcuenta);
				echo "Usuario insertado";
		}else{
			echo 'datos vacios';
			}
		}else{
			echo "datos vacios";
		}

	}else{
		echo 'no';
	}


	 ?>
