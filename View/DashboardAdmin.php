<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <style>
        .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline;
            margin-right: 10px;
        }

        .boton1 {
            width: 100px;
            height: 30px;
            font-size: 60%;
            margin-left: 750px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .material-icons-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            display: inline-block;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-somoothing: grayscale;
        }

        .boton1 {
            width: 100px;
            height: 30px;
            font-size: 55%;
            margin-left: 750px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row ">
        <div class="bg-white md:w-64 min-h-screen shadow bg-blue-800">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-white"> <img src="../assets/logo.jpg" alt="" class="logo">Universidad
                    </div>
                    <hr>
                </div>
            </div>
            <nav class="p-6 space-y-4">
                <hr>
                <h2 href="#" class="block text-white">admin <br>
                    Administrador</h2>
                <hr>
                <h2 class="text-center text-white">Menu Administrador</h2>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-permisos')">Permisos</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-maestros')">Maestros</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-alumnos')">Alumnos</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-clases')">Clases</a>
            </nav>
        </div>
        <container>
            <div class="ml-5 inline-block p-4 h-20 mt-2 shadow-md rounded-md">
                <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
                <p class="text-gray-600">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda
                </p>
            </div>

            <div class="container mx-auto max-w-3xl">
                <div class="w-full lg:w-6/12 p-5 mt-10 lg:mt-0">
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <h2 class="text-2xl font-bold mb-5">Admin Panel</h2>
                        <ul class="space-y-3">
                            <li class="bg-gray-100 p-2 rounded-lg">Admin</li>
                            <li class="bg-gray-100 p-2 rounded-lg">Administrador</li>
                        </ul>
                        <p class="text-gray-600 mt-5">Email: admin@admin </p>
                        <div class="mt-10 space-y-3">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Dashboard</a>
                           <a href="../index.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </container>
</body>

</html>