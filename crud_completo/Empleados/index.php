<?php include "../conexion/conexion.php" ?>

<?php include('../includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD CON PHP </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>


    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>

   

    
    <div class="container">
        <form action="../crud/insert.php" method="post" enctype="multipart/form-data">
            <label for="" class="display-6">Organizemos los empleados</label>
            <hr>
            <label for="">ID:</label>
            <input type="text" class="form-control" name="ID" placeholder="" id="txtID" require="">
            <br>
            
            <label for="">Nombre(s):</label>
            <input type="text" class="form-control" name="nombre"  placeholder="" id="txtNombre" require="">
            <br>

            <label for="">Apellido Paterno:</label>
            <input type="text" class="form-control" name="apellidop"  placeholder="" id="txtApellidoP" require="">
            <br>

            <label for="">Apellido Materno:</label>
            <input type="text" class="form-control" name="apellidom"  placeholder="" id="txtApellidoM" require="">
            <br>

            <label for="">Correo:</label>
            <input type="text" class="form-control" name="correo"  placeholder="" id="txtCorreo" require="">
            <br>

            <label for="">Foto:</label>
            <input type="file" class="form-control" name="foto"  placeholder="" id="txtFoto" require=""><br>
            <br>

            <!--Primer boton-->
            <!-- Button trigger modal -->
            <input type="submit" class="btn btn-primary" value="Agregar Empleado" name="insertar" id="enviar" style="margin-top:25px;margin-left:25px;">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar empleados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <script>
                    const enviar_datos = document.getElementById('enviar');
                    alertify.confirm("Todo se ha realizado correctamente :D",
                    function(enviar_datos){
                        alertify.success('Ok');
                    },
                    function(){
                        //nulo
                    });
                </script>
        </form>
                <!--Agregar-->
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Apellido P</label>
                            <input type="text" class="form-control" id="recipient-name" name="apellidop">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Apellido M</label>
                            <input type="text" class="form-control" id="recipient-name" name="apellidom">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Correo</label>
                            <input type="text" class="form-control" id="recipient-name" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Foto</label>
                            <input type="file" class="form-control" id="recipient-name" name="foto">
                        </div>

                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </form>
                </div>
            <!--Agregar-->
              
                </div>
            </div>
            </div>
            <!--Fin button-->


            <!--Primer boton-->
            <!-- Button trigger modal -->
           

            



    

<table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido P</th>
                    <th>Apellido M</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
          $query = "SELECT * FROM empleados";
          $result_tasks = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['ApellidoP']; ?></td>
            <td><?php echo $row['ApellidoM']; ?></td>
            <td><?php echo $row['Correo']; ?></td>
            <td><?php echo $row['Foto']; ?></td>
            <td>
              <a href="../crud/edit.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="../crud/delete.php?id=<?php echo $row['ID']?>" class="btn btn-danger" id="eliminar">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
          <script>
                    const enviar_datos = document.getElementById('eliminar');
                    alertify.confirm("Todos tus datos se ha realizado correctamente :D",
                    function(enviar_datos){
                        alertify.success('Ok');
                    },
                    function(){
                        //nulo
                    });
                </script>
            </tbody>
        </table>
        <?php include('../includes/footer.php'); ?>
</body>
</html>