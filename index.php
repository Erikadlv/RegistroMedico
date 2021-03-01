
<?php include("registro_personal/conexion.php")?>
    
    <?php include("includes/header.php")?>
    
    
    <div class="conteiner p-3 ">
        <div class="jumbotron mb-4 bg-info text-dark">
            <div class="container" >
            <img src="personal.jpg" class="rounded float-start" height="130px" width="180px">
                <h1 class="text-center">Registro del Personal Medico</h1>
                <p class="text-center">En esta seccion podras registrar al personal medico, actualizar sus datos personales o eliminarlo si la persona se encuentra inactiva</p>
                <form action="registro_personal/index.php">
                <div class="row justify-content-center">
                <input type="submit" class="btn btn-success btn-block"
                name="boton_personal" value="Registro Personal" onclick="location = 'registro_personal/index.php' " >
                </div>
                </form> 
            </div>   
        </div>
        <div class="jumbotron mb-4 bg-danger text-white">
            <div class="container">
            <img src="vacu.jfif" class="rounded float-start" height="130px" width="180px">
                <h1 class="text-center">Registro de Vacunacion</h1>
                
                <p class="text-center">En esta sección podras registrar al personal medico que ya ha sido vacunado</p>
                <form action="registro_vacu/mostrar_vacu.php">
                <div class="row justify-content-center">
                <input type="submit" class="btn btn-success btn-block"
                name="boton_vacunacion" value="Registro vacunacion" onclick="location = 'registro_vacu/mostrar_vacu.php'" >
                </div>
                </form>
            </div>
            
        </div>
    </div>
    
    <?php include("includes/footer.php")?>