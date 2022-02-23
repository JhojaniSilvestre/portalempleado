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

function obtenerTitles($conn){
    try {
        $stmt = $conn->prepare("SELECT DISTINCT title FROM titles");
        $stmt->execute(); //ejecuta la select

        //modo de obtención -> array indexado
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //obtiene todas las filas del array
        foreach($stmt->fetchAll() as $row) {
            //guardo los nombres obtenidos en un array
            $titles[] = $row["title"]; 
        }
        return $titles; //devuelvo el array
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function generarNumEmp($conn){
    $tiempoTotMin=0;
    try {
        $stmt = $conn->prepare("SELECT max(emp_no) FROM employees");
        $stmt->execute();
        
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            $maxcod = $stmt->fetchColumn();
        }
        $emp_no = $maxcod + 1;
        return $emp_no;
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function alta_empleado($conn,$grupoEmpleados){
    try {
        foreach ($grupoEmpleados as $numEmp => $empleado) {
                //obtengo de cada empleado la clave de la posicion que quiero obtener 
                $emp_no = $empleado['emp_no']; //las comillas simples sino salta error
                $birth_date = $empleado['birth_date'];
                $first_name = $empleado['first_name'];
                $last_name = $empleado['last_name'];
                $gender = $empleado['gender'];
                $hire_date = $empleado['hire_date'];

                $insert = "INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) 
                VALUES ($emp_no,'$birth_date','$first_name','$last_name','$gender','$hire_date')";
                $conn->exec($insert);
        }

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_dept_emp($conn,$grupoEmpleados){
    try {
        foreach ($grupoEmpleados as $numEmp => $empleado) {
            //obtengo de cada empleado la clave de la posicion que quiero obtener 
            $emp_no = $empleado['emp_no']; 
            $dept_no = $empleado['dept_no'];
            $from_date = $empleado['hire_date'];
            $to_date = $empleado['to_date'];

            $insert = "INSERT INTO dept_emp (emp_no,dept_no,from_date,to_date) 
            VALUES ($emp_no,'$dept_no','$from_date','$to_date')";
            $conn->exec($insert);
        }

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_salaries_emp($conn,$grupoEmpleados){
    try {
        foreach ($grupoEmpleados as $numEmp => $empleado) {
            //obtengo de cada empleado la clave de la posicion que quiero obtener 
            $emp_no = $empleado['emp_no']; 
            $salary= $empleado['salary'];
            $from_date = $empleado['hire_date'];
            $to_date = $empleado['to_date'];

            $insert = "INSERT INTO salaries (emp_no,salary,from_date,to_date) 
            VALUES ($emp_no,$salary,'$from_date','$to_date')";
            $conn->exec($insert);
        }
    

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_titles_emp($conn,$grupoEmpleados){
    try {
        foreach ($grupoEmpleados as $numEmp => $empleado) {
            //obtengo de cada empleado la clave de la posicion que quiero obtener 
            $emp_no = $empleado['emp_no']; 
            $title= $empleado['title'];
            $from_date = $empleado['hire_date'];
            $to_date = $empleado['to_date'];

            $insert = "INSERT INTO titles (emp_no,title,from_date,to_date) 
            VALUES ($emp_no,'$title','$from_date','$to_date')";
            $conn->exec($insert);
        }

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

?>