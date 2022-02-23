<?php
session_start();
require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/modSalario_model.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emp_no = limpiar($_POST["emp_no"]);
    $last_name = limpiar($_POST["last_name"]);
    $salary = intval(limpiar($_POST["salary"]));
    $emp_existe = false;

    if (isset($_POST["volver"])) {
        header('location: ../views/inicio_view.php');
    }

    $emp_existe = buscarEmpleado($conn,$emp_no,$last_name);

    if ($emp_existe){
        modificarSalario($conn,$emp_no,$salary);
        echo "salario modificado correctamente";
    }
    else {
        echo "el empleado inctroducido no existe";
    }
}

require_once '../views/modSalario_view.php';



?>