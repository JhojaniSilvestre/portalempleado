<?php
session_start(); //se inicia la sesión

//cerrar sesión si actualmente hay una activa
if(isset($_SESSION['usuario'])){
    session_unset();
    session_destroy();
    echo "<br> sesión cerrada";
}

//Llamada a la vista login para recoger datos del formulario-- Intermediario entre vista y modelo !!!
require_once("views/login_view.php");

//si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = limpiar($_POST["empno"]);
    $clave = ucfirst(strtolower((limpiar($_POST["password"]))));

    //var_dump($_POST);
    //echo "<br>".$clave;


    //abro conexion, viene de index
    $conn = crear_conexion();

    //Llamada al modelo para hacer la select que comprueba el login-- Intermediario entre vista y modelo !!!
    require_once("models/login_model.php");
    //fecha actual
    date_default_timezone_set('Europe/Madrid');
    $fechaActu = date("Y-m-d");

    $resultado = loginUsuario($conn,$usuario,$clave);

    //variable que contendra el mensaje de error
    $mensaje = "";
    //se comprueba que la select devolvió resultados
    if (empty($resultado)) {//sino los datos son error - mensaje
        echo "Usuario o contraseña incorrectos !!!";
    }//sino comprobar que  el emp está actualmente en un puesto
    elseif ($fechaActu < $resultado["to_date"]) {
            // Se crea sesión y variables de sesión
            
            $_SESSION['usuario'] = $resultado["emp_no"]; //num emp
            $_SESSION['clave'] = $resultado["last_name"]; //apellido
            $_SESSION['dept'] = $resultado["dept_no"]; //guardo el dept en el que está
            /*este header funciona ya que realmente estoy en index y 
            allí no he llamado a ninguna vista antes que al controller*/
            header("location: views/inicio_view.php");
            /*
            var_dump($resultado);
            echo "<br>".$fechaActu."<br>";
            */
    }
    else {
        echo "el empleado ya no trabaja actualmente en la empresa";
    }

    //cierro conexion bbdd 
    cerrar_conexion($conn);

}//fin if post


?>