<?php
$conexion = new mysqli("localhost", "root", "", "superhero");


$consulta = $conexion->query("SELECT alignment_id,alignment, COUNT( alignment_id) 'total'
FROM superhero INNER JOIN alignment ON superhero.alignment_id=alignment.id
GROUP BY alignment_id 
ORDER BY total");



while ($datos = $consulta->fetch_object()) {
    echo "<tr>"; 
    echo "<td class='text-center'>" . $datos->alignment . "</td>";
    echo "<td>" . $datos->total . "</td>"; 
    echo "</tr>"; 
}





?>
