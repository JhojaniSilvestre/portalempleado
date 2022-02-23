<?php
session_start();
require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/infoDept_model.php';

$departamentos = obtenerDepartamentos($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dept_no = limpiar($_POST["departamento"]);

    if (isset($_POST["volver"])) {
        header('location: ../views/inicio_view.php');
    }

    //$infoDept = consultarInfoDept($conn,$dept_no);

    if (empty($infoDept)){
        echo "no existen registros en el departamento seleccionado";
    }
        
}

require_once '../views/vidaLab_view.php';

cerrar_conexion($conn);

?>