<!DOCTYPE html>
<html lang="en">
<head>
    <!--ENCABEZADO DE LA PÁGINA-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual Neza ll</title>
    <link rel="shortcut icon" type="image/x-icon" href="..//imagenes/c_logo.png">
    <!--<link href="CSS/estilos.css" type="text/css" rel="stylesheet" >-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="biblioteca/css/estilos.css">
    
</head>
    
<body>
    <!--CUERPO DEL BUSCADOR-->
    
    <!--CÓDIGO QUE REALIZA LA CONEXIÓN A NUESTRA BASE DE DATOS-->
    <?php include("conexion.php"); ?>
    <div class="container mt-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <font size="9" color="#11521d">
        <h1 align="center">Biblioteca Virtual</h1></font>
    </div><br>
    <div align="center">
        <font face="Arial" size="2" >
                <a  href="..//index.html"><img src="..//imagenes/inicio.png" height="30px" width="30px"></a><br><br>
                <img src="..//imagenes/croquis.png" height="400px" width="800px">

    </div> 
                        <div class="card-body">
                            <form id="form2" name="form2" method="post" action="index.php">
                                <div class="col-12 row">
                                <div class="col-11">
                                    <label class="form-label">Nombre a buscar: </label>
                                    <!--class="form-control"-->
                                    <input type="text" class="form-control" id="buscar" name="buscar" value="" autocomplete="off" placeholder="Buscar">
                                    <br>
                                </div>
                                <div class="col-1">
                                    <input type="submit" class="btn btn-success" value="Ver" style="margin-top: 30px;">
                                </div>
                                </div>  
                            </form>
                            <div class="table-responsive container tex-center">
                                <table class="table container tex-center">
                                    <thead align="center">
                                        <tr style="background-color: #00695c; color:#FFFFFF;">
                                            <th style=" text-align: center;"> Genero </th>
                                            <th style=" text-align: center;"> Titulo </th>
                                            <th style=" text-align: center;"> Autor </th>
                                            <th style=" text-align: center;"> Editorial </th>
                                            <th style=" text-align: center;"> Año de Publicación</th>
                                            <th style=" text-aling: center;"> Ubicación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_POST['buscar'])){ ?>
                                            <?php $conexion = mysqli_connect('localhost', 'root', '', 'biblioteca_virtual');?>
                                            <?php $sql="SELECT * FROM biblioteca WHERE Genero LIKE'%" . $_POST['buscar']."%' OR Autor LIKE '%" . $_POST['buscar']."%' OR Titulo LIKE '%".$_POST['buscar']."%' OR Editorial LIKE '%".$_POST['buscar']."%'   ";?>
                                            <?php $consulta=mysqli_query($conexion,$sql);?>
                                            <?php $numeroSql = mysqli_num_rows($consulta);?>
                                        <p style="font-weight: bold; color:green;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                                        <?php while ($rowSql =mysqli_fetch_assoc($consulta)){ ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $rowSql["Genero"];?></td>
                                                <td style="text-align: center"><?php echo $rowSql["Titulo"];?> </td>
                                                <td style="text-align: center"><?php echo $rowSql["Autor"]; ?></td>
                                                <td style="text-align: center"><?php echo $rowSql["Editorial"];?> </td>
                                                <td style="text-align: center"><?php echo $rowSql["Fecha de publi"];?> </td>
                                                <td style="text-align: center"><?php echo $rowSql["Ubicacion"];?> </td>
                                            </tr>     
                                        <?php } ?>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>