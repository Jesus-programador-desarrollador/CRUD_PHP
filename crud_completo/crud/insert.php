<?php 

 include "../conexion/conexion.php";
 
 if (isset($_POST['insertar'])) {
     $nombre = $_POST['nombre'];
     $apellidoP = $_POST['apellidop'];
     $apellidoM = $_POST['apellidom'];
     $email = $_POST['correo'];
     $Foto = $_POST['foto'];

     $insertando_datos = mysqli_query($conexion, "INSERT INTO Empleados(Nombre, ApellidoP, ApellidoM, Correo, Foto) VALUES ('$nombre','$apellidoP','$apellidoM','$email','$Foto')")
    or die("Problemas en el select" . mysqli_error($conexion));

     $query = mysqli_query($conexion,$insertando_datos);

     if (!isset($query)) {
         echo "No hay un query";
     }
     $_SESSION['message'] = 'Task Saved Successfully';
        $_SESSION['message_type'] = 'success';
         header("Location: ../Empleados/index.php");
     
 }
?>
