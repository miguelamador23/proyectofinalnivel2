<?php
//!isset($maestros) && header("Location: /maestros");

session_start();
//$_SESSION["usuarioid_edit"] = $usuarios["id"];
//$_SESSION["usuarioid_edit"] = $maestros["id"];

//var_dump($permisos["rol_id"]);
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                <h2 class="text-2xl font-bold mb-8">Nuevos Maestros</h2>
                <form id="editPermisos" action="/maestros/create" method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                        <input type="text" id="correo" name="correo" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">DNI:</label>
                        <input type="text" id="dni" name="dni" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="DNI">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Direccion">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nac">Fecha Nacimiento:</label>
                        <input type="date" id="fecha_nac" name="fecha_nac" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                    </div>
                    <div class="hidden mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rol_id">Rol_id:</label>
                        <input type="text" id="rol_id" name="rol_id" value="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                    </div>
                    <div class="hidden mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                        <input type="text" id="estatus" name="estatus" value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                    </div>
                    <div class="hidden mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                        <input type="password" id="password" name="password" value="maestro" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="clase_id">Clase Asignada:</label>
                        <div class="flex col-span-3 sm:col-span-1">
                            <input id="clase_id" name="" disabled value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Rol del Usuario">

                            <select id="rolesUsuarios" name="clase_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value='' selected disabled>Seleccione una Clase</option>
                                <option value='NULL'>--Ninguno--</option>
                                <option value='1'>Español</option>
                                <option value='2'>Algebra</option>
                                <option value='3'>Contabilidad 1</option>
                                <option value='4'>Ecuaciones Diferenciales</option>
                                <option value='5'>PHP</option>
                                <option value='6'>Laravel</option>
                                <option value='7'>Programación de Bases de Datos</option>
                                <option value='8'>React</option>
                                <option value='9'>JavaScript</option>
                                <option value='10'>HTML CSS</option>
                                <option value='11'>Bootstrap Tailwindcss</option>
                                <option value='12'>MVC POO</option>
                                <option value='13'>Git Github</option>
                                <option value='14'>Valores</option>
                            </select>
                        </div>
                    </div>
                    <!--<div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                        <div class="flex col-span-2 sm:col-span-1">
                            <input type="text" id="estatus" disabled name="" value="<?= $maestros["estatus"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Estatus del Usuario">

                            <select id="estatusUsuarios" name="estatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value='' selected disabled>Seleccione un Estatus</option>
                                <option value='1'>Activo</option>
                                <option value='0'>Inactivo</option>
                            </select>
                        </div>
                    </div>-->

                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Guardar cambios
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                            <a href="/maestros">Cerrar</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cambiando los roles del menú desplegable -->
<script type="text/javascript">
    // Actualizar el valor del input cuando cambia el valor del select
    document.getElementById('rolesUsuarios').addEventListener('change', function() {
        var valorSeleccionadoRol = this.value;
        document.getElementById('clase_id').value = valorSeleccionadoRol;
        //$asignatura = valorSeleccionadoRol;
    });

</script>