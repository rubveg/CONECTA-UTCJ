<?php
include("conexion.php");

$dia = $_GET['dia'];
$turno = $_GET['turno'];

$sql = "SELECT * FROM menu_cafeteria WHERE dia = '$dia' AND turno = '$turno'";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Menú del día</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Menú de cafetería – <?php echo $dia . " (" . $turno . ")"; ?></h2>

<div class="tabla-menu">
<table>
<thead>
<tr>
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
                <td>{$fila['platillo1']}</td>
                <td>{$fila['platillo2']}</td>
                <td>{$fila['bebida']}</td>
                <td>\${$fila['precio']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay menú registrado para este día y turno.</td></tr>";
}
?>

</tbody>
</table>
</div>

</body>
</html>
