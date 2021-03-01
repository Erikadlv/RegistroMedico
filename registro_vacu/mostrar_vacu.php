<?php include("../registro_personal/conexion.php") ?>
<?php include("../includes/header.php")?>
  
    <div class="container p-5">

      <div class="row align-items-start">

        <div class="col-md-4">

          <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 
            </div>
            
          <?php session_unset(); } ?>

          <div class="card card-body">
              

             <form action="../registro_vacu/agregar_vacu.php" method="POST">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="id_empleado" id="" required>
                    <option value="">Empleados</option>
                    <?php
                     $query="SELECT*FROM personal";
                     $resultado_vacu=mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($resultado_vacu)){ ?>
                      <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                    <?php } ?>
              </select>

                <div class="form-group mb-3">
                  <input type="text" name="estatus" class="form-control"
                  placeholder="Estatus" autofocus>
                </div>

                <div class="form-group mb-3">
                  <input type="text" name="observaciones" class="form-control"
                  placeholder="Observaciones" autofocus>
                </div>

                <input type="submit" class="btn btn-success btn-block" name="guardar_vac" value="Guardar registro">
                
             </form> 
          </div>
        </div>

        <div class="col-md-8">
            <table class="table table-success table-striped">
            <div class="table-responsive">
              <thead>
                <tr>
                    <th>Id Empleado</th>
                    <th>Estatus</th>
                    <th>Fecha de vacunación</th>
                    <th>Observaciones</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query="SELECT*FROM vacunacion";
                  $resultado_vacu=mysqli_query($conn, $query);

                  while($row=mysqli_fetch_array($resultado_vacu)){ ?>
                      <tr>
                        <td><?php echo $row['id_empleado']; ?></td>
                        <td><?php echo $row['estatus']; ?></td>
                        <td><?php echo $row['fecha_vacunacion']; ?></td>
                        <td><?php echo $row['observaciones']; ?></td>
                        <td>
                          <a href="../registro_vacu/editar_vacu.php?id=<?php echo $row['id_empleado']?>" class="btn btn-secondary">
                          <i class="fas fa-marker"></i>
                          </a>
                        </td>
                        <td>
                          <a href="../registro_vacu/borrar_vacu.php?id=<?php echo $row['id_empleado']?>" class="btn btn-danger">
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
