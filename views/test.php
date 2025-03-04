<table>
    <thead>
        <tr>
            <th>Ciclo Escolar</th>
            <th>Materia</th>
            <th>Profesor</th>
            <th>Objetivo</th>
            <th>Contenido</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["descripcion_ciclo"] . "</td>";
            echo "<td>" . $row["descripcion_materia"] . "</td>";
            echo "<td>" . $row["nombre_profesor"] . "</td>";
            echo "<td>" . $row["descripcion_objetivo"] . "</td>";
            echo "<td>" . $row["descripcion_contenido"] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>