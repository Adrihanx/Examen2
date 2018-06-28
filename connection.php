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
    $string ="insert into empleados (nombre,salario,url_foto) values ('$name','$salario','$image')";
    if($resultado = mysqli_query($conexion,$string)){
      move_uploaded_file($_FILES['image']['tmp_name'], "user/" . $_FILES['image']['name']);
      header("Location: index.php");
    }else{
      echo "Error". mysqli_connect_error();
    }
?>
