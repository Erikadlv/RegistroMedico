<?php 
    include("../registro_personal/conexion.php");

    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        $query = "SELECT * FROM vacunacion WHERE id_empleado= $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $id = $row['id_empleado'];
            $estatus = $row['estatus'];
            $observaciones = $row['observaciones'];
        } 
    }
    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $estatus = $_POST['estatus'];
        $observaciones = $_POST['observaciones'];

        echo $id;
        echo $estatus;
        echo $observaciones;
        $query = "UPDATE vacunacion SET estatus = '$estatus', observaciones = '$observaciones' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("query fallido");}
            $_SESSION['message'] = 'Registo Actualizado';
            $_SESSION['message_type'] = 'warning';
            header("Location:../registo_vacu/mostrar_vacu.php");
    }
?>
<?php include('../includes/header.php'); ?>
        <div class="container p-4">
          <div class="row">
            <div class="col-md-4 mx-auto">
              <div class="card card-body">
              <form method="post" action="editar_vacu.php?id=<?php echo $id ?>">
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="id_empleado" id="" required>
                    <option value="">Empleados</option>
                    <?php
                     $query="SELECT*FROM personal";
                     $resultado_vacu=mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($resultado_vacu)){ ?>
                      <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                    <?php } ?>
              </select>
                <div class="form-group">
                  <input name="estatus" type="text" class="form-control mb-3" value="<?php echo $estatus; ?>" placeholder="Actualizar estatus">
                </div>
                <div class="form-group">
                  <input name="observaciones" type="text" class="form-control mb-3" value="<?php echo $observaciones; ?>" placeholder="Actualizar observaciones">
                </div>
                
                <button class="btn-success" name="update">
                  Actualizar informacion
              </button>
              </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('../includes/footer.php'); ?>
