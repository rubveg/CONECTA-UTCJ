<?php
require "conexion.php";

$grupo = $_GET["grupo"] ?? "";
$turno = $_GET["turno"] ?? "";

if ($grupo === "" || $turno === "") {
    echo "<p style='padding:20px;'>Ingrese grupo y turno.</p>";
    exit;
}

$consulta = $conexion->prepare("
    SELECT hora, lunes, martes, miercoles, jueves, viernes
    FROM horarios
    WHERE grupo = ? AND turno = ?
    ORDER BY hora ASC
");

$consulta->bind_param("ss", $grupo, $turno);
$consulta->execute();
$resultado = $consulta->get_result();

echo "
<table class='tabla-horario'>
<thead>
    <tr>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
</thead>
<tbody>
";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$fila['hora']}</td>";
    echo "<td>{$fila['lunes']}</td>";
    echo "<td>{$fila['martes']}</td>";
    echo "<td>{$fila['miercoles']}</td>";
    echo "<td>{$fila['jueves']}</td>";
    echo "<td>{$fila['viernes']}</td>";
    echo "</tr>";
}

echo "</tbody></table>";
?>
