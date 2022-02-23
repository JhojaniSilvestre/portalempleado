<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info departamentos</title> <!--se usan las rutas como si estuviera en index-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 </head>
      
<body>

    <h1>Info departamentos</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
            <div class="card-header">Info departamentos</div>
                <div class="card-body">
                  				
                    <B>Departamento: </B>
                    <select name="departamento" class="form-control">
                        <!--recorro el array departamentos -->
                        <?php foreach($departamentos as $dept_no => $name_dept) : ?>
                            <?php echo "<option value='".$dept_no."'>".$name_dept."</option>"; ?>
                        <?php endforeach; ?>
                    </select><br>
                    <input type="submit" name="submit" value="consultar" class="btn btn-warning disabled">
                    <input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>