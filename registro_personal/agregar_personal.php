<?php
include("../registro_personal/conexion.php");

if(isset($_POST['guardar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad= $_POST['edad'];
    $depto= $_POST['depto'];
    $cargo= $_POST['cargo'];
    $sueldo=$_POST['sueldo'];

    $query="INSERT INTO personal(id_empleado, nombre_empleado, edad, departamento, cargo, sueldo) 
    VALUES ('$id', '$nombre', '$edad', '$depto', '$cargo', '$sueldo')";
    $result= mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message']='Empleado Registrado';
    $_SESSION['message_type']='success';

        header("Location:../registro_personal/index.php");
}
?>