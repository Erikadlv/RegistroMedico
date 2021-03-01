<?php
    include("../registro_personal/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM personal WHERE id_empleado= $id";
        $result= mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message']='Registro eliminado';
        $_SESSION['message_type']='danger';
        header("Location:../registro_personal/index.php");
    }
?>