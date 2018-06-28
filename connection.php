<?php
  require_once 'mysql_login.php';
  $servername=HOSTNAME;
  $database=DATABASE;
  $username=USERNAME;
  $password=PASSWORD;
  $conexion = mysqli_connect($servername,$username,$password,$database);
  if (!$conexion) {
   die('Error de conexión: ' . mysqli_connect_error());
  }
    $name = $_POST['name'];
    $salario = $_POST['salario'];
    $image = $_FILES['image']['name'];
    $imagetype =  $_FILES['image']['type'];
    if ($imagetype == "image/png") {
      $string ="insert into empleados (nombre,salario,url_foto) values ('$name','$salario','$image')";
      if($resultado = mysqli_query($conexion,$string)){
        $result = move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $image);
        echo '
         <table style="width:100%">
          <tr>
          <th>Nombre</th>
    <th>Salario</th>
    <th>Imagen</th>
  </tr>
  <tr>
    <td>'.$name.'</td>
    <td>'.$salario.'</td>
    <td><img src="img/'.$image.' "></td>
  </tr>
</table> 
        ';
      }else{
        echo "Error". mysqli_connect_error();
      }
    }else{
      header("Location: index.html");
    }
?>
