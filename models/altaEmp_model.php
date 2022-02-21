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

?>