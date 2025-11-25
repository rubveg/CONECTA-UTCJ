<?php
// CONEXIÓN A BASE DE DATOS
$conexion = new mysqli("localhost", "conectautcj", "", "Conectautcj12!");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$turno = $_GET["turno"];

// CONSULTAR MENÚ DEL TURNO SELECCIONADO
$sql = "SELECT * FROM menu_cafeteria WHERE turno = '$turno' ORDER BY id ASC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Cafetería</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="cafeteria-container">
  <h2>Menú del turno: <?php echo $turno; ?></h2>

  <table class="tabla-menu">
      <thead>
          <tr>
              <th>Día</th>
              <th>Platillo 1</th>
              <th>Platillo 2</th>
              <th>Bebida</th>
              <th>Precio</th>
          </tr>
      </thead>
      <tbody>

      <?php
      if ($resultado->num_rows > 0) {
          while ($fila = $resultado->fetch_assoc()) {
              echo "<tr>
                      <td>{$fila['dia']}</td>
                      <td>{$fila['platillo1']}</td>
                      <td>{$fila['platillo2']}</td>
                      <td>{$fila['bebida']}</td>
                      <td>$" . number_format($fila['precio'], 2) . "</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No hay menú registrado para este turno.</td></tr>";
      }
      ?>

      </tbody>
  </table>

</section>

</body>
</html>
