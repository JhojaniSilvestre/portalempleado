<?php
session_start();
require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/vidaLab_model.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emp_no = limpiar($_POST["emp_no"]);
    $last_name = limpiar($_POST["last_name"]);

    if (isset($_POST["volver"])) {
        header('location: ../views/inicio_view.php');
    }

    $vidaLab_emp = consultarVidaLaboral($conn,$emp_no,$last_name);

    if (empty($vidaLab_emp)){
        echo "no existen registros con los datos del empleado introducidos";
    }
        
}

require_once '../views/vidaLab_view.php';

cerrar_conexion($conn);

?>