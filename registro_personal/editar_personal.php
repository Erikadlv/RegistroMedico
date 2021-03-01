<?php
    include("../registro_personal/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM personal WHERE id_empleado= $id";
        $result= mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id = $row['id_empleado'];
            $nombre = $row['nombre_empleado'];
            $edad = $row['edad'];
            $depto = $row['departamento'];
            $cargo = $row['cargo'];
            $sueldo = $row['sueldo'];
          }
    }
        
        if (isset($_POST['update'])) {
          $id = $_GET['id'];
          $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $depto = $_POST['depto'];
            $cargo = $_POST['cargo'];
            $sueldo = $_POST['sueldo'];
            //echo $nombre;
        
          $query = "UPDATE personal set nombre_empleado = '$nombre', edad = '$edad', departamento = '$depto', cargo = '$cargo', sueldo = '$sueldo' WHERE id_empleado=$id";
        mysqli_query($conn, $query);
         if(!$result){
            die("query fallido");}

          $_SESSION['message'] = 'Actualizacion guardada';
          $_SESSION['message_type'] = 'warning';
          header('Location:../registro_personal/index.php');
        }
        
        ?>
        <?php include('../includes/header.php'); ?>
        <div class="container p-4">
          <div class="row">
            <div class="col-md-4 mx-auto">
              <div class="card card-body">
              <form action="editar_personal.php?id=<?php echo $_GET['id']; ?>" method="POST">
              
                <div class="form-group">
                  <input name="nombre" type="text" class="form-control mb-3" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
                </div>
                <div class="form-group">
                  <input name="edad" type="text" class="form-control mb-3" value="<?php echo $edad; ?>" placeholder="Actualizar edad">
                </div>
                <div class="form-group">
                  <input name="depto" type="text" class="form-control mb-3" value="<?php echo $depto; ?>" placeholder="Actualizar departamento">
                </div>
                <div class="form-group">
                  <input name="cargo" type="text" class="form-control mb-3" value="<?php echo $cargo; ?>" placeholder="Actualizar cargo">
                </div>
                <div class="form-group">
                  <input name="sueldo" type="text" class="form-control mb-3" value="<?php echo $sueldo; ?>" placeholder="Actualizar sueldo">
                </div>
                <button class="btn-success" name="update">
                  Actualizar
              </button>
              </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('../includes/footer.php'); ?>