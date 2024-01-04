<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <table class='display bg-white rounded-lg' style='margin-left: auto; margin-right: auto; text-align: center; margin-top: 10px;'>
        <tr>
            <th class='w-1/6 text-left'>Dni</th>
            <th class='w-1/6 text-left'>Nombre</th>
            <th class='w-1/6 text-left'>Correo</th>
            <th class='w-1/6 text-left'>Direccion</th>
            <th class='w-1/6 text-left'>Fec. Nacimiento</th>
            <th class='w-1/6 text-left'>Acciones</th>
        </tr>
        <?php
        include('../Models/Database.php');
        $query = "SELECT * FROM alumnos";
        $result = $mysqli->query($query);
        if ($result) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                $count++;
                echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['DNI'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['NOMBRE'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['CORREO'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['DIRECCION'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['FEC_NACIMIENTO'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>