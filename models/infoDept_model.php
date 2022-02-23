<?php

function obtenerDepartamentos($conn){
    try {
        $stmt = $conn->prepare("SELECT dept_no, dept_name FROM departments");
        $stmt->execute(); //ejecuta la select

        //modo de obtención -> array indexado
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //obtiene todas las filas del array
        foreach($stmt->fetchAll() as $row) {
            //guardo los nombres obtenidos en un array
            $dept_no = $row["dept_no"];
            $departments["$dept_no"] = $row["dept_name"]; 
        }
        return $departments; //devuelvo el array
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function consultarInfoDept($conn,$dept_no){
    try {
        $stmt = $conn->prepare("SELECT dept_name, employees.emp_no, birth_date, first_name, last_name, gender, from_date, to_date
        FROM employees, dept_manager, departments
        WHERE employees.emp_no = dept_manager.emp_no AND departments.dept_no = dept_manager.dept_no 
        AND dept_manager.dept_no = '$dept_no'");
        $stmt->execute(); //ejecuta la select

        //modo de obtención -> array indexado
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //obtiene todas las filas del array
        foreach($stmt->fetchAll() as $row) {
            //guardo los nombres obtenidos en un array 
        }
        return $departments; //devuelvo el array
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>