<?php
session_start();
//compruebo que entre con la sesión iniciada
if (!isset($_SESSION['usuario'])) {
    session_unset();
    session_destroy();
    header("location: ../index.php");
}

require_once '../db/db.php';
$conn = crear_conexion();

require_once '../models/altaMasiva_model.php';
$departamentos = obtenerDepartamentos($conn);
$titles = obtenerTitles($conn);

//compruebo si la sesion de grupo existe, sino la inicializo
if (!isset($_SESSION['grupo'])) {
    $_SESSION['grupo'] = array(); //sesión declarada e iniciada
    $grupoEmpleados = $_SESSION['grupo']; //array que contendra a los empleados de la sesion grupo
    $_SESSION['emp_no'] = generarNumEmp($conn); //obtengo el ult num de empleado
    $emp_no = $_SESSION['emp_no'];
} else {
	$grupoEmpleados = $_SESSION['grupo']; //si ya hay empleados añadidos para dar de alta se mantienen en el array
    $emp_no = $_SESSION['emp_no'];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = limpiar($_POST["nombre"]);
        $last_name = limpiar($_POST["apellido"]);
        $birth_date = limpiar($_POST["fnac"]);
        $gender = limpiar($_POST["genero"]);
        $dept_no = limpiar($_POST["departamento"]);
        $title = limpiar($_POST["cargo"]);
        $salary = intval(limpiar($_POST["salario"]));
        $hire_date = limpiar($_POST["hire_date"]);
        $to_date = limpiar($_POST["to_date"]);

        /* funcion para obtener la fecha actual */
        date_default_timezone_set('Europe/Madrid');
        $fechaActu = date("Y-m-d");        

        //var_dump($_POST);
        if (isset($_POST['volver'])) {
            header("location: ../views/inicio_view.php");
            //var_dump($_POST);
        }
        //vacio el grupo de empleados a dar de alta
        if (isset($_POST['vaciar'])) {
            $grupoEmpleados = array();
            $_SESSION['grupo'] = $grupoEmpleados;
            //dejamos el num de empleado al inicial disponible
            $_SESSION['emp_no'] = generarNumEmp($conn);
            $emp_no = $_SESSION['emp_no'];
            echo "grupo empleados vaciado";
        } 
               
        if (isset($_POST['agregar'])) {//si el num emp no existe en el grupo
            
                if ($hire_date < $fechaActu || $to_date <= $fechaActu) {
                    echo "Introduzca bien las fechas de alta y/o baja";
                }//sino, compruebo que el numero de empleado no existe en el array de empleados            
                elseif (!array_key_exists($emp_no, $grupoEmpleados)) {
                    //añado el numero de empleado al array de empleados como clave 
                    $grupoEmpleados[$emp_no]= array("emp_no"=>$emp_no,"first_name"=>$first_name,
                "last_name"=>$last_name,"birth_date"=>$birth_date,"gender"=>$gender,"dept_no"=>$dept_no,
            "title"=>$title,"salary"=>$salary,"hire_date"=>$hire_date,"to_date"=>$to_date); 
                    echo "empleado añadido correctamente";
                    //incremento el num de empleado para que no se repita 
                    $emp_no ++;
                }
                else {//Si el producto está en el carro de la compra, se avisa al usuario.
                    echo "el empleado ya está añadido";
                }//fin else
        }
        /* guardo el array de empleados en la sesion grupo y su num emp*/
        $_SESSION['grupo'] = $grupoEmpleados;
        $_SESSION['emp_no'] = $emp_no;
        //var_dump($_SESSION['grupo']);
        
        if (isset($_POST['alta'])) {

            alta_empleado($conn,$grupoEmpleados);

            alta_dept_emp($conn,$grupoEmpleados);
        
            alta_salaries_emp($conn,$grupoEmpleados);
        
            alta_titles_emp($conn,$grupoEmpleados);
    
            echo "Empleados dados de alta correctamente";

            //una vez acabadas las inserciones, vaciamos el array e inicializamos el num emp
            $grupoEmpleados = array();
            $_SESSION['grupo'] = $grupoEmpleados;
            //dejamos el num de empleado al inicial disponible
            $_SESSION['emp_no'] = generarNumEmp($conn);
            $emp_no = $_SESSION['emp_no'];            
            
        }
        
}

//llamo a la vista del alta de empleados - contiene el form 
require_once '../views/altaMasiva_view.php';



cerrar_conexion($conn);

?>