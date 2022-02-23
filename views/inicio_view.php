<?php
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
		session_unset();
		session_destroy();
		header("location: ../index.php");
	}
?>
<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>PORTAL EMPLEADO</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
   
 <body>
        <h1>PORTAL EMPLEADO</h1> 

        <div class="container ">
            <!--Aplicacion-->
            <div class="card border-success mb-3" style="max-width: 30rem;">
            <div class="card-header">Menú Usuario - OPERACIONES </div>
            <div class="card-body">


            <B>Bienvenido/a: </B><?php echo $_SESSION['clave'];?><BR><BR>
            <B>Identificador empleado: </B><?php echo $_SESSION['usuario'];?><BR><BR>
            <B>departamento empleado: </B><?php echo $_SESSION['dept'];?><BR><BR>
        
            <div class="list-group">
                <!--Si el empleado es de RRHH se mostraran las operaciones adicionales-->
                <?php if ($_SESSION['dept'] == "d003") { ?>
                    <a href="../controllers/altaEmp_controller.php" class="list-group-item list-group-item-action">Alta empleado</a>
                    <a href="../controllers/altaMasiva_controller.php" class="list-group-item list-group-item-action">Alta masiva empleados</a>
                    <a href="../controllers/modSalario_controller.php" class="list-group-item list-group-item-action">Modificar salario</a>
                    <a href="../controllers/vidaLab_controller.php" class="list-group-item list-group-item-action">Vida laboral</a>
                    <a href="#" class="list-group-item list-group-item-action">Info departamento</a>
                    <a href="#" class="list-group-item list-group-item-action">Cambio departamento</a>
                    <a href="#" class="list-group-item list-group-item-action">Nuevo jefe departamento</a>
                    <a href="#" class="list-group-item list-group-item-action">Baja empleado</a>
                <?php } //fin if ?>
                <!--operaciones para todos los empleados-->
                <a href="#" class="list-group-item list-group-item-action">Mi nómina</a>
                <a href="#" class="list-group-item list-group-item-action">Historial laboral</a>
            </div>
            
            <BR><a href="../index.php">Cerrar Sesión</a>
        </div>    
   </body>
   
</html>