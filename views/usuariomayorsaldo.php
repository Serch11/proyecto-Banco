<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 

        require_once('../modelo/Usuario.php');

        $usuario = new Usuario();

        $data = $usuario->mayorSaldo();

        print_r('<pre>');
        print_r($data);
        print_r('</pre>'); 

    ?>



            <div class="card">

                    <div class="card-body">

                        <table border="1">
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>IDENTIFICACION</th>
                                        <th>SALDO INICIAL</th>
                                        
                                    </tr>
                                    <tbody>
                                       
                                            <?php foreach ($data as $value) {
                                                echo '<tr>';
                                                 echo '<td>'.$value['nombre'].'</td>';
                                                 echo '<td>'.$value['apellidos'].'</td>';
                                                 echo '<td>'.$value['identificacion'].'</td>';
                                                 echo '<td>'.$value['saldoinicial'].'</td>';
                                                 echo '</tr>';
                                            }
                                             ?>
                                            
                                    </tbody>
                                </thead>
                        </table>
                    </div>
            </div>

</body>
</html>