<?php
session_start();
require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/altaEmp_model.php';
$departamentos = obtenerDepartamentos($conn);
$titles = obtenerTitles($conn);
/* aquí funciona el header ya que está antes que cualquier html */
if (isset($_POST['volver'])) {
    header("location: ../views/inicio_view.php");
    //echo "volverr";
    //var_dump($_POST);
}
//llamo a la vista del alta de empleados - contiene el form 
require_once '../views/altaEmp_view.php';

/* funcion para obtener la fecha actual */
date_default_timezone_set('Europe/Madrid');
$fechaActu = date("Y-m-d");

$mensajeErr = "";
$mensajeOk = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    /*aquí no funcionaría un header ya que antes he llamado a una vista 
    por lo que ya habria html antes del header*/
        $first_name = limpiar($_POST["nombre"]);
        $last_name = limpiar($_POST["apellido"]);
        $birth_date = limpiar($_POST["fnac"]);
        $gender = limpiar($_POST["genero"]);
        $dept_no = limpiar($_POST["departamento"]);
        $title = limpiar($_POST["cargo"]);
        $salary = limpiar($_POST["salario"]);
        $hire_date = limpiar($_POST["hire_date"]);
        $to_date = limpiar($_POST["to_date"]);
        $emp_no = generarNumEmp($conn);
        //var_dump($_POST);
        
        if ($hire_date < $fechaActu || $to_date <= $fechaActu) {
            echo "Introduzca bien las fechas de alta y/o baja";
        }
        else{
            alta_empleado($conn,$emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date);
    
            alta_dept_emp($conn,$emp_no,$dept_no,$hire_date,$to_date);
        
            alta_salaries_emp($conn,$emp_no,$salary,$hire_date,$to_date);
        
            alta_titles_emp($conn,$emp_no,$title,$hire_date,$to_date);
    
            echo "Empleado dado de alta correctamente";
        }
}

cerrar_conexion($conn);

?>