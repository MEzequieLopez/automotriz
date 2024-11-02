<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Formulario</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Formulario</h1>
    <form>
      <div class="form-group">
        <label for="cliente">Cliente:</label>
        <select id="cliente" class="form-control">
          <?php
          $query = "SELECT * FROM clientes";
          $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
            echo "<option value='". $row["id_cliente"]. "'>". $row["nombre_cliente"]. "</option>";
          }
        ?>
        </select>
      </div>
      <div class="form-group">
        <label for="marca">Marca:</label>
        <select id="marca" class="form-control">
          <?php
          $query = "SELECT * FROM marcas WHERE id_cliente = 1";
          $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
            echo "<option value='". $row["id_marca"]. "'>". $row["nombre_marca"]. "</option>";
          }
        ?>
        </select>
      </div>
    </form>
  </div>
  <script>
    $(document).ready(function() {
      $("#cliente").change(function() {
        var clienteId = $(this).val();
        $.ajax({
          type: "POST",
          url: "obtenerMarcas.php",
          data: { clienteId: clienteId },
          success: function(data) {
            $("#marca").html(data);
          }
        });
      });
    });
  </script>
</body>
</html>