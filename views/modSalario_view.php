<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar salario</title> <!--se usan las rutas como si estuviera en index-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
      
<body>

    <h1>Modificar salario</h1>

<!--     <?php //if (!empty($mensaje)): ?>
        <br><p><?php// echo $mensaje; ?></p>
    <?php //endif; ?> -->

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
            <div class="card-header">Modificar salario</div>
                <div class="card-body">
                    <!--Se manda a sí mismo, en este caso index la raiz, este lo redijirá a controller-->
                    <form id="" name="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="card-body">
                    
                    <div class="form-group">
                        No.Empleado <input type="text" name="emp_no" placeholder="número empleado" class="form-control">
                    </div>
                    <div class="form-group">
                        Apellido Empleado <input type="text" name="last_name" placeholder="apellido" class="form-control">
                    </div>	
                    <div class="form-group">
                        Nuevo Salario <input type="number" name="salary" placeholder="salario" class="form-control">
                    </div>				
                    
                    <input type="submit" name="submit" value="actualizar salario" class="btn btn-warning disabled">
                    <input type="submit" name="volver" value="volver" class="btn btn-warning disabled">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>