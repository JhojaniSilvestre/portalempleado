<?php 

function consultarVidaLaboral($conn,$emp_no,$last_name){
    try {
        $stmt = $conn->prepare("SELECT employees.emp_no, birth_date, first_name, last_name, gender, hire_date,
        dept_name, title, salary, dept_emp.to_date FROM employees, dept_emp, salaries, titles, departments
        WHERE employees.emp_no = dept_emp.emp_no AND employees.emp_no = salaries.emp_no AND 
        departments.dept_no = dept_emp.dept_no AND employees.emp_no = titles.emp_no 
        AND employees.emp_no = $emp_no AND  last_name = '$last_name'");
        $stmt->execute(); //ejecuta la select
        $vidaLab_emp = array();
        //compruebo si la select tiene resultados
        if ($stmt->rowCount() > 0) {
            //modo de obtención -> array indexado
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row) {
                //guardo los nombres obtenidos en un array
                $vidaLab_emp[] = array($row["emp_no"], $row["birth_date"], $row["first_name"],$row["last_name"],
                $row["gender"], $row["hire_date"], $row["dept_name"], $row["title"], $row["salary"], $row["to_date"]);
            }
        }
        return $vidaLab_emp;
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }    
}

?>