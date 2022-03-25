<?php
include("../conexion/conexion.php");
     $nombre = '';
     $apellidoP = '';
     $apellidoM = '';
     $email = '';
     $Foto = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM empleados WHERE id=$id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['Nombre'];
    $apellidoP = $row['ApellidoP'];
    $apellidoM = $row['ApellidoM'];
    $email = $row['Correo'];
    $Foto = $row['Foto'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
    $nombre = $_POST['Nombre'];
    $apellidoP = $_POST['ApellidoP'];
    $apellidoM = $_POST['ApellidoM'];
    $email = $_POST['Correo'];
    $Foto = $_POST['Foto'];

    $query = "UPDATE empleados SET Nombre = '$nombre', ApellidoP = '$apellido',ApellidoM = '$apellidoM',Correo = '$email',Foto = '$Foto' WHERE id=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../Empleados/index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="ApellidoP" type="text" class="form-control" value="<?php echo $apellidoP; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="ApellidoM" type="text" class="form-control" value="<?php echo $apellidoM; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="Correo" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="Foto" type="file" class="form-control" value="<?php echo $Foto; ?>" placeholder="Update Title">
        </div>
       
        <button class="btn-success" name="update">
          Actualizar datos
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>
