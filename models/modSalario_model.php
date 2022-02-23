<?php

function buscarEmpleado($conn,$emp_no,$last_name){
    try {
        $stmt = $conn->prepare("SELECT emp_no, last_name FROM employees
        WHERE emp_no = '$emp_no' AND  last_name = '$last_name'");
        $stmt->execute(); //ejecuta la select
        $emp_existe = false;
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $emp_existe = true;
        }
        return $emp_existe;
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function modificarSalario($conn,$emp_no,$salary){
    try {
        $update = "UPDATE salaries SET salary = $salary 
        WHERE emp_no= $emp_no";
        $conn->exec($update);

    }catch(PDOException $e){
        echo "No se ha podido actualizar el salario", $e-> getMessage();
    }
}
?>