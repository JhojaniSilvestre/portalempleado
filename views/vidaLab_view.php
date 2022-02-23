<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vida laboral</title> <!--se usan las rutas como si estuviera en index-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
      
<body>

    <h1>Vida laboral</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
            <div class="card-header">Vida laboral</div>
                <div class="card-body">
                    <!--Se manda a sí mismo, en este caso index la raiz, este lo redijirá a controller-->
                    <form id="" name="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="card-body">
                    
                    <div class="form-group">
                        No.Empleado <input type="text" name="emp_no" placeholder="número empleado" class="form-control">
                    </div>
                    <div class="form-group">
                        Apellido Empleado <input type="text" name="last_name" placeholder="apellido" class="form-control">
                    </div>				
                    
                    <input type="submit" name="submit" value="consultar" class="btn btn-warning disabled">
                    <input type="submit" name="volver" value="volver" class="btn btn-warning disabled">

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<?php if (isset($_POST["submit"]) && !empty($vidaLab_emp)) { ?>
                            <!--var_dump($vidaLab_emp);-->
                            <table class="table table-striped w-auto">
                            <thead>
                                <tr>
                                    <th>No.Empleado</th>
                                    <th>f.nacimiento</th>
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>género</th>
                                    <th>fecha alta</th>
                                    <th>departamento</th>
                                    <th>cargo</th>
                                    <th>salario</th>
                                    <th>fecha baja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($vidaLab_emp as $fila) : ?>
                                    <tr><!--aqui va cada fila-->
                                        <?php foreach($fila as $celda) : ?>
                                            <!--aqui cada celda de la fila "cada columna de la select"-->
                                            <td><?php echo $celda; ?></td>
                                        <?php endforeach;?>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
<?php } ?>    

</body>
</html>