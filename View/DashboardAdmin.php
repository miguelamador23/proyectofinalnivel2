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
            </nav>
        </div>
        <container class="container mx-auto max-w-4xl">
            <div class="flex justify-center items-center">
                <div class="ml-5 inline-block p-4 h-20 mt-2 shadow-md rounded-md">
                    <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
                    <p class="text-gray-600">Selecciona la acción que quieras realizar en el panel de la parte de abajo</p>
                </div>
            </div>

            <div class="container mx-auto max-w-4xl">
                <div class="flex items-center justify-center">
                    <div class="w-full lg:w-6/12 p-5 mt-10 lg:mt-0">
                        <div class="bg-white shadow-md p-6 rounded-lg w-full">
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
            </div>

            <div class="table grid grid-rows-4 grid-cols-2 gap-4">
                <div class="cell aspect-ratio-16/9 bg-white shadow-md p-6 rounded-lg">Comentarios</div>
                <div class="cell aspect-ratio-16/9 bg-white shadow-md p-6 rounded-lg">Maestros</div>
                <div class="cell aspect-ratio-16/9 bg-white shadow-md p-6 rounded-lg">Alumnos</div>
                <div class="cell aspect-ratio-16/9 bg-white shadow-md p-6 rounded-lg">Clases</div>
            </div>
        </container>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Dashboard</h2>
             
            </div>
        </div>
        <script>
      
            let btn = document.querySelector(".bg-blue-500");
            let modal = document.getElementById("myModal");

          
            btn.addEventListener("click", function() {
                modal.style.display = "block";
            });

          
            let close = document.querySelector(".close");
            close.addEventListener("click", function() {
                modal.style.display = "none";
            });
        </script>
</body>

</html>