<?php
include("../registro_vacu/select.php");

if(isset($_POST['guardar_vac'])){
    $id = $_POST['id_empleado'];
    $estatus= $_POST['estatus'];
    $observaciones= $_POST['observaciones'];
    

    $query="INSERT INTO vacunacion(id_empleado, estatus, observaciones) 
    VALUES ('$id', '$estatus', '$observaciones')";
    $result= mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message']='Empleado Registrado';
    $_SESSION['message_type']='success';

        header("Location:../registro_vacu/mostrar_vacu.php");
}
?>