<?php
session_start();
require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/altaEmp_model.php';
$departamentos = obtenerDepartamentos($conn);
$titles = obtenerTitles($conn);
//llamo a la vista del alta de empleados - contiene el form 
require_once '../views/altaEmp_view.php';

/* funcion para obtener la fecha actual */
date_default_timezone_set('Europe/Madrid');
$fechaActu = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = limpiar($_POST["nombre"]);
    $last_name = limpiar($_POST["apellido"]);
    $birth_date = limpiar($_POST["fnac"]);
    $gender = limpiar($_POST["genero"]);
    $dept_no = limpiar($_POST["departamento"]);
    $title = limpiar($_POST["cargo"]);
    $salary = limpiar($_POST["salario"]);
    $hire_date = limpiar($_POST["hire_date"]);
    $to_date = limpiar($_POST["to_date"]);

    var_dump($_POST);


}

cerrar_conexion($conn);

?>