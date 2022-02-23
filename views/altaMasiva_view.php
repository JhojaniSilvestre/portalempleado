<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta empleados</title> <!--se usan las rutas como si estuviera en index-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
      
<body>

    <h1>Alta empleados</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
            <div class="card-header">Alta empleados</div>
                <div class="card-body">
                                        
                    <!--Se manda a sí mismo, en este caso altaEmp_conotroller es el que controla-->
                    <form id="" name="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="card-body">
                    
                    <div class="form-group">
                        Nombre <input type="text" name="nombre" placeholder="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        Apellido <input type="text" name="apellido" placeholder="apellido" class="form-control">
                    </div>
                    <div class="form-group">
                        Fecha nacimiento <input type="date" name="fnac" placeholder="fecha nacimiento" class="form-control">
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="genero" value="M" checked>M
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="genero" value="F">F
                    </div><br>
                    <!--hire date automatico con la fecha de hoy-->                   				
                    <B>Departamento: </B>
                    <select name="departamento" class="form-control">
                        <!--recorro el array departamentos -->
                        <?php foreach($departamentos as $dept_no => $name_dept) : ?>
                            <?php echo "<option value='".$dept_no."'>".$name_dept."</option>"; ?>
                        <?php endforeach; ?>
                    </select><br>
                    <B>Cargo: </B>
                    <select name="cargo" class="form-control">
                        <!--recorro el array titles -->
                        <?php foreach($titles as $title) : ?>
                            <?php echo "<option>".$title."</option>"; ?>
                        <?php endforeach; ?>
                    </select><br>        
                    <div class="form-group">
                        Salario <input type="number" name="salario" placeholder="salario" min="1000" class="form-control">
                    </div>
                    <div class="form-group">
                        Fecha alta <input type="date" name="hire_date" class="form-control">
                    </div>
                    <div class="form-group">
                        Fecha baja <input type="date" name="to_date" class="form-control">
                    </div>
                    <input type="submit" value="Agregar" name="agregar" class="btn btn-warning disabled">
                    <input type="submit" name="submit" value="Dar de alta" class="btn btn-warning disabled">
                    <input type="submit" value="Vaciar" name="vaciar" class="btn btn-warning disabled">                    
                    <input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>