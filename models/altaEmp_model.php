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

function alta_empleado($conn,$emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date){
    try {
        $insert = "INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) 
        VALUES ($emp_no,'$birth_date','$first_name','$last_name','$gender','$hire_date')";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_dept_emp($conn,$emp_no,$dept_no,$hire_date,$to_date){
    try {
        $insert = "INSERT INTO dept_emp (emp_no,dept_no,from_date,to_date) 
        VALUES ($emp_no,'$dept_no','$hire_date','$to_date')";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_salaries_emp($conn,$emp_no,$salary,$hire_date,$to_date){
    try {
        $insert = "INSERT INTO salaries (emp_no,salary,from_date,to_date) 
        VALUES ($emp_no,$salary,'$hire_date','$to_date')";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

function alta_titles_emp($conn,$emp_no,$title,$hire_date,$to_date){
    try {
        $insert = "INSERT INTO titles (emp_no,title,from_date,to_date) 
        VALUES ($emp_no,'$title','$hire_date','$to_date')";
        $conn->exec($insert);

	}catch(PDOException $e){
		 echo "Error: ", $e-> getMessage();
	}
}

?>