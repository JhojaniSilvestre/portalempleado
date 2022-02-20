<?php
//la conexion viene ya dada desde index y pasada por controller

function loginUsuario($conn,$usuario,$clave){
    try {
        $stmt = $conn->prepare("SELECT dept_emp.emp_no, dept_no, last_name, to_date FROM employees, dept_emp
        WHERE dept_emp.emp_no = employees.emp_no AND dept_emp.emp_no='$usuario' AND last_name='$clave'");
        $stmt->execute();

        $resultado = array();
        if ($stmt->rowCount() > 0) {

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $resultado;
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}

?>