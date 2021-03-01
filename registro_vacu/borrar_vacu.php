<?php
    include("../registro_personal/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM vacunacion WHERE id_empleado= $id";
        $result= mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message']='Registro eliminado';
        $_SESSION['message_type']='danger';
        header("Location:../registro_vacu/mostrar_vacu.php");
    }
?>