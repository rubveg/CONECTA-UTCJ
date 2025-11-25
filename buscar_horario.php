<?php
$host = "localhost";
$usuario = "conecta";
$clave = "";
$bd = "kiosco_utcj";

$conn = new mysqli($host, $usuario, $clave, $bd);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$grupo = $_GET["grupo"];
$turno = $_GET["turno"];

$sql = "SELECT dia, hora, materia FROM horarios 
        WHERE grupo = '$grupo' AND turno = '$turno'
        ORDER BY FIELD(dia,'Lunes','Martes','Miércoles','Jueves','Viernes'), hora";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p>No se encontró horario para este grupo.</p>";
    exit;
}

echo "<table class='tabla-horario'>
        <thead>
            <tr>
                <th>Día</th>
                <th>Hora</th>
                <th>Materia</th>
            </tr>
        </thead>
        <tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['dia']}</td>
            <td>{$row['hora']}</td>
            <td>{$row['materia']}</td>
          </tr>";
}

echo "</tbody></table>";

$conn->close();
?>