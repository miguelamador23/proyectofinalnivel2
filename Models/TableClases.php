<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">

<div class="bg-white rounded-lg p-4" style="margin-top: 10px;">
    <table class='display mx-auto' style="margin-top: 10px;">
        <tr>
            <th class='w-1/6 text-left'>#</th>
            <th class='w-1/6 text-left'>Clase</th>
            <th class='w-1/6 text-left'>Maestro</th>
            <th class='w-1/6 text-left'>Alumnos Inscritos</th>
            <th class='w-1/6 text-left'>Acciones</th>
        </tr>
        <?php
        include('../Models/Database.php');
        $query = "SELECT * FROM clases";
        $result = $mysqli->query($query);
        if ($result) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                $count++;
                echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['ID'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['CLASE'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['MAESTRO'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'>" . $row['ALUMNOS_INSCRITOS'] . "</td>";
                echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>