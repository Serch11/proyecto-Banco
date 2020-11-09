<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      require_once('../modelo/Usuario.php');
      $usuario = new Usuario();
       $data = $usuario->selectUsers();
      print_r('<pre>');
      //print_r($data);
      print_r('</pre>');
     ?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <section>
      <div class="">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                 <th>NOMBRE</th>
                 <th>APELLIDOS</th>
                 <th>TIPO DE DOCUMENTO</th>
                 <th>ID</th>
                 <th>SEXO</th>
                 <th>SALDO</th>
                 <th>TIPO DE CUENTA</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                  foreach ($data as  $value) {
                    echo '<tr>';
                    echo '<td> '.ucwords($value['nombre']).'</td>';
                    echo '<td> '.ucwords($value['apellidos']).'</td>';
                    echo '<td> '.ucwords($value['nombre_tipodocumento']).'</td>';
                    echo '<td> '.ucwords($value['identificacion']).'</td>';
                    echo '<td> '.ucwords($value['nombre_tiposexo']).'</td>';
                    echo '<td> '.ucwords($value['saldoinicial']).'</td>';
                    echo '<td> '.ucwords($value['nombre_cuenta']).'</td>';
                    echo '</tr>';
                  }
                 ?>
              </tbody>
            </table>
      </div>
    </section>
  </body>
</html>
