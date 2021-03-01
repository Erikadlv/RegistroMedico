<?php include("../registro_personal/conexion.php") ?>
<?php include("../includes/header.php")?>
  
    <div class="container p-5">

      <div class="row align-items-start">

        <div class="col-md-4">

          <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 
            </div>
            
          <?php session_unset(); } ?>

          <div class="card card-body">

             <form action="agregar_personal.php" method="POST">

                <div class="form-group mb-3">
                  <input type="text" name="id" class="form-control"
                  placeholder="Clave" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="nombre" class="form-control"
                  placeholder="Nombre del empleado" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="edad" class="form-control"
                  placeholder="Edad" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="depto" class="form-control"
                  placeholder="Departamento" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="cargo" class="form-control"
                  placeholder="Cargo que ocupa" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="sueldo" class="form-control"
                  placeholder="Sueldo" autofocus>
                </div>

                <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar registro">
                
             </form> 
          </div>
        </div>

        <div class="col-md-8">
            <table class="table table-success table-striped" style="width:100%">
            <div class="table-responsive">
              <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre del empleado</th>
                    <th>Edad</th>
                    <th>Departamento</th>
                    <th>Puesto</th>
                    <th>Sueldo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query="SELECT*FROM personal";
                  $resultado_perso=mysqli_query($conn, $query);

                  while($row=mysqli_fetch_array($resultado_perso)){ ?>
                      <tr>
                        <td><?php echo $row['id_empleado']; ?></td>
                        <td><?php echo $row['nombre_empleado']; ?></td>
                        <td><?php echo $row['edad']; ?></td>
                        <td><?php echo $row['departamento']; ?></td>
                        <td><?php echo $row['cargo']; ?></td>
                        <td><?php echo $row['sueldo']; ?></td>
                        <td>
                          <a href="../registro_personal/editar_personal.php?id=<?php echo $row['id_empleado']?>" class="btn btn-secondary">
                          <i class="fas fa-marker"></i>
                          </a>
                        </td>
                        <td>
                          <a href="../registro_personal/borrar_personal.php?id=<?php echo $row['id_empleado']?>" class="btn btn-danger">
                          <i class="fa fa-times"></i>
                          </a>
                        </td>
                      </tr>
                  <?php } ?>
              </tbody>
            </div>
            </table>
        </div>
      </div>
    </div>
    <?php include("../includes/footer.php");?>
