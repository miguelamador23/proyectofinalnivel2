<!DOCTYPE html>
<html x-data="data('bienvenido')" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!--CSS TailWindcss CLI-->
    <link href="../css/output.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body>
    <?php
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Model.php";

    // Variables de calculo para colocar en CARDS del DashBoard
    $totalUser = $this->model->all_users_count();
    //var_dump($totalUser[0]["count(*)"]);
    $totalAdmin = $this->model->all_users_admin();
    $totalTeacher = $this->model->all_users_teacher();
    $totalStudent = $this->model->all_users_student();

    $pors_TotalUser = 100;
    $pors_Admin = round((floatval(strval($totalAdmin[0]["count(*)"]))  /  floatval(strval($totalUser[0]["count(*)"])))  *  100, 1);
    $pors_Teacher = round((floatval(strval($totalTeacher[0]["count(*)"]))  /  floatval(strval($totalUser[0]["count(*)"])))  *  100, 1);
    $pors_Student = round((floatval(strval($totalStudent[0]["count(*)"]))  /  floatval(strval($totalUser[0]["count(*)"])))  *  100, 1);

    $ocultar_div_permisos = 'hidden';

    //var_dump((floatval(strval($totalStudent[0]["count(*)"]))  /  floatval(strval($totalUser[0]["count(*)"])))  *  100);
    //var_dump($pors_Admin * 1000);
    $rol = $_SESSION["user"]["Rol"];
    $usuarios = $_SESSION["user"];
    //var_dump($usuarios["Rol"]);
    $user = $_SESSION["user"]["nombre"];
    ?>


    <div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
            <div>
                <div class="text-white">
                    <div class="flex p-2  bg-gray-800">
                        <div class="flex py-3 px-2 items-center">
                            <p class="text-2xl text-green-500 font-semibold">University</p <p class="ml-2 font-semibold italic">
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="">
                            <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 border-green-400" src="../assets/logo.jpg" alt="">
                            <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?php echo $rol ?></p>
                        </div>
                    </div>
                    <div>
                        <ul class="mt-6 leading-10">
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-4">HOME</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href='/permisos'>

                                    <svg width="24px" height="24px" viewBox="0 0 48.00 48.00" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff" stroke-width="0.00048000000000000007">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="Layer_2" data-name="Layer 2">
                                                <g id="invisible_box" data-name="invisible box">
                                                    <rect width="48" height="48" fill="none"></rect>
                                                </g>
                                                <g id="Layer_7" data-name="Layer 7">
                                                    <g>
                                                        <path d="M25.1,41H4a2,2,0,0,1-2-2V31.1l1-.6A25.6,25.6,0,0,1,16,27a26.7,26.7,0,0,1,7.5,1.1,21.2,21.2,0,0,0-.5,4.4A18.4,18.4,0,0,0,25.1,41Z"></path>
                                                        <path d="M16,23a9,9,0,1,0-9-9A9,9,0,0,0,16,23Z"></path>
                                                        <path d="M46,34.1V31.9L42.4,31l-.5-1.1,2-3.2-1.6-1.6-3.2,2L38,26.6,37.1,23H34.9L34,26.6l-1.1.5-3.2-2-1.6,1.6,2,3.2L29.6,31l-3.6.9v2.2l3.6.9.5,1.1-2,3.2,1.6,1.6,3.2-2,1.1.5.9,3.6h2.2l.9-3.6,1.1-.5,3.2,2,1.6-1.6-2-3.2.5-1.1ZM36,36a3,3,0,1,1,3-3A2.9,2.9,0,0,1,36,36Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">PERMISOS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/maestros">
                                    <svg fill="#ffffff" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" stroke="#ffffff" stroke-width="5.1199900000000005">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M302.195,11.833H13.049C5.842,11.833,0,17.675,0,24.882v214.289c0,7.207,5.842,13.049,13.049,13.049h283.839 l-34.352-21.329c-2.247-1.396-4.282-3.002-6.109-4.768H26.097V37.93h263.049v126.703c4.01,0.847,7.943,2.39,11.625,4.677 l14.473,8.986V24.882C315.244,17.675,309.402,11.833,302.195,11.833z"></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M216.857,134.337c-4.352-3.43-10.665-2.685-14.097,1.668c-3.432,4.353-2.686,10.665,1.668,14.097l44.279,34.914 c0.63-1.371,1.34-2.719,2.156-4.034c2.883-4.643,6.649-8.401,10.94-11.206L216.857,134.337z"></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <circle cx="419.71" cy="81.405" r="37.557"></circle>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M511.33,173.609c-0.118-23.528-19.355-42.67-42.884-42.67H450.26c-17.831,46.242-11.329,29.381-22.507,58.37l4.709-23.724 c0.346-1.744,0.067-3.555-0.79-5.113l-7.381-13.424l6.551-11.914c0.454-0.826,0.438-1.829-0.041-2.64 c-0.479-0.811-1.352-1.308-2.293-1.308h-17.96c-0.942,0-1.813,0.497-2.293,1.308s-0.495,1.815-0.041,2.64l6.537,11.889 l-7.367,13.4c-0.873,1.589-1.147,3.438-0.77,5.211l5.438,23.675c-3.119-8.087-21.08-52.728-23.255-58.37h-17.83 c-23.529,0-42.766,19.141-42.884,42.67c-0.098,19.565-0.016,3.179-0.17,33.884l-36.702-22.787 c-8.501-5.28-19.674-2.667-24.953,5.836c-5.279,8.503-2.666,19.675,5.836,24.954l64.219,39.873 c12.028,7.47,27.609-1.167,27.68-15.304c0.036-7.091,0.292-57.809,0.334-66.275c0.013-2.092,1.714-3.776,3.805-3.769 c2.089,0.007,3.779,1.703,3.779,3.794c-0.018,87.323-0.394,111.735-0.394,304.606c0,12.01,9.736,21.746,21.746,21.746 s21.746-9.736,21.746-21.746V304.604h9.388v173.817c0,12.01,9.736,21.746,21.746,21.746s21.746-9.736,21.746-21.746l0.008-304.612 c0-1.981,1.604-3.589,3.586-3.595c1.981-0.006,3.595,1.594,3.605,3.577l0.669,133.132c0.05,9.977,8.154,18.03,18.119,18.03 c0.031,0,0.062,0,0.094,0c10.007-0.05,18.081-8.205,18.03-18.212L511.33,173.609z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">MAESTROS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/clases">
                                    <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 29.936 29.936" xml:space="preserve" stroke="#ffffff" stroke-width="1.4968">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M29.936,1.153H0v20.045h10.91l-3.76,7.584h2.899l1.288-2.613h6.72l1.287,2.613h2.932l-3.787-7.583h11.445V1.153H29.936z M12.292,24.234l1.496-3.035h1.819l1.496,3.035H12.292z M28.646,19.908H1.29V2.443h27.356V19.908z"></path>
                                                    <rect x="22.631" y="17.149" width="5.191" height="1.859"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">CLASES</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Mobile sidebar Cuando esta en modo responsivo Celular-->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-gray-900 dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
            <div>
                <div class="text-white">
                    <div class="flex p-2  bg-gray-800">
                        <div class="flex py-3 px-2 items-center">
                            <p class="text-2xl text-green-500 font-semibold">University</p <p class="ml-2 font-semibold italic">
                            DASHBOARD</p>
                        </div>
                    </div>
                    <div>
                        <ul class="mt-6 leading-10">
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-4">HOME</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                <a class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer" x-on:click="Open = !Open" href='/permisos'>
                                    <span class='inline-flex items-center  text-sm font-semibold text-white hover:text-green-400'>
                                        <svg width="24px" height="24px" viewBox="0 0 48.00 48.00" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff" stroke-width="0.00048000000000000007">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Layer_2" data-name="Layer 2">
                                                    <g id="invisible_box" data-name="invisible box">
                                                        <rect width="48" height="48" fill="none"></rect>
                                                    </g>
                                                    <g id="Layer_7" data-name="Layer 7">
                                                        <g>
                                                            <path d="M25.1,41H4a2,2,0,0,1-2-2V31.1l1-.6A25.6,25.6,0,0,1,16,27a26.7,26.7,0,0,1,7.5,1.1,21.2,21.2,0,0,0-.5,4.4A18.4,18.4,0,0,0,25.1,41Z"></path>
                                                            <path d="M16,23a9,9,0,1,0-9-9A9,9,0,0,0,16,23Z"></path>
                                                            <path d="M46,34.1V31.9L42.4,31l-.5-1.1,2-3.2-1.6-1.6-3.2,2L38,26.6,37.1,23H34.9L34,26.6l-1.1.5-3.2-2-1.6,1.6,2,3.2L29.6,31l-3.6.9v2.2l3.6.9.5,1.1-2,3.2,1.6,1.6,3.2-2,1.1.5.9,3.6h2.2l.9-3.6,1.1-.5,3.2,2,1.6-1.6-2-3.2.5-1.1ZM36,36a3,3,0,1,1,3-3A2.9,2.9,0,0,1,36,36Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ml-4">PERMISOS</span>
                                    </span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                <a class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer" href='/maestros' x-on:click="Open = !Open">
                                    <span class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg fill="#ffffff" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" stroke="#ffffff" stroke-width="5.1199900000000005">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path d="M302.195,11.833H13.049C5.842,11.833,0,17.675,0,24.882v214.289c0,7.207,5.842,13.049,13.049,13.049h283.839 l-34.352-21.329c-2.247-1.396-4.282-3.002-6.109-4.768H26.097V37.93h263.049v126.703c4.01,0.847,7.943,2.39,11.625,4.677 l14.473,8.986V24.882C315.244,17.675,309.402,11.833,302.195,11.833z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M216.857,134.337c-4.352-3.43-10.665-2.685-14.097,1.668c-3.432,4.353-2.686,10.665,1.668,14.097l44.279,34.914 c0.63-1.371,1.34-2.719,2.156-4.034c2.883-4.643,6.649-8.401,10.94-11.206L216.857,134.337z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <circle cx="419.71" cy="81.405" r="37.557"></circle>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M511.33,173.609c-0.118-23.528-19.355-42.67-42.884-42.67H450.26c-17.831,46.242-11.329,29.381-22.507,58.37l4.709-23.724 c0.346-1.744,0.067-3.555-0.79-5.113l-7.381-13.424l6.551-11.914c0.454-0.826,0.438-1.829-0.041-2.64 c-0.479-0.811-1.352-1.308-2.293-1.308h-17.96c-0.942,0-1.813,0.497-2.293,1.308s-0.495,1.815-0.041,2.64l6.537,11.889 l-7.367,13.4c-0.873,1.589-1.147,3.438-0.77,5.211l5.438,23.675c-3.119-8.087-21.08-52.728-23.255-58.37h-17.83 c-23.529,0-42.766,19.141-42.884,42.67c-0.098,19.565-0.016,3.179-0.17,33.884l-36.702-22.787 c-8.501-5.28-19.674-2.667-24.953,5.836c-5.279,8.503-2.666,19.675,5.836,24.954l64.219,39.873 c12.028,7.47,27.609-1.167,27.68-15.304c0.036-7.091,0.292-57.809,0.334-66.275c0.013-2.092,1.714-3.776,3.805-3.769 c2.089,0.007,3.779,1.703,3.779,3.794c-0.018,87.323-0.394,111.735-0.394,304.606c0,12.01,9.736,21.746,21.746,21.746 s21.746-9.736,21.746-21.746V304.604h9.388v173.817c0,12.01,9.736,21.746,21.746,21.746s21.746-9.736,21.746-21.746l0.008-304.612 c0-1.981,1.604-3.589,3.586-3.595c1.981-0.006,3.595,1.594,3.605,3.577l0.669,133.132c0.05,9.977,8.154,18.03,18.119,18.03 c0.031,0,0.062,0,0.094,0c10.007-0.05,18.081-8.205,18.03-18.212L511.33,173.609z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ml-4">MAESTROS</span>
                                    </span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/alumnos">
                                    <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #ffffff;
                                                }
                                            </style>
                                            <g>
                                                <path class="st0" d="M505.837,180.418L279.265,76.124c-7.349-3.385-15.177-5.093-23.265-5.093c-8.088,0-15.914,1.708-23.265,5.093 L6.163,180.418C2.418,182.149,0,185.922,0,190.045s2.418,7.896,6.163,9.627l226.572,104.294c7.349,3.385,15.177,5.101,23.265,5.101 c8.088,0,15.916-1.716,23.267-5.101l178.812-82.306v82.881c-7.096,0.8-12.63,6.84-12.63,14.138c0,6.359,4.208,11.864,10.206,13.618 l-12.092,79.791h55.676l-12.09-79.791c5.996-1.754,10.204-7.259,10.204-13.618c0-7.298-5.534-13.338-12.63-14.138v-95.148 l21.116-9.721c3.744-1.731,6.163-5.504,6.163-9.627S509.582,182.149,505.837,180.418z"></path>
                                                <path class="st0" d="M256,346.831c-11.246,0-22.143-2.391-32.386-7.104L112.793,288.71v101.638 c0,22.314,67.426,50.621,143.207,50.621c75.782,0,143.209-28.308,143.209-50.621V288.71l-110.827,51.017 C278.145,344.44,267.25,346.831,256,346.831z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">ALUMNOS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/clases">
                                    <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 29.936 29.936" xml:space="preserve" stroke="#ffffff" stroke-width="1.4968">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M29.936,1.153H0v20.045h10.91l-3.76,7.584h2.899l1.288-2.613h6.72l1.287,2.613h2.932l-3.787-7.583h11.445V1.153H29.936z M12.292,24.234l1.496-3.035h1.819l1.496,3.035H12.292z M28.646,19.908H1.29V2.443h27.356V19.908z"></path>
                                                    <rect x="22.631" y="17.149" width="5.191" height="1.859"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">CLASES</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <header class="z-40 py-4  bg-gray-800  ">
                <div class="flex items-center justify-between h-8 px-6 mx-auto">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <x-heroicon-o-menu class="w-6 h-6 text-white" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>

                    <!-- Search Input -->
                    <div class="flex justify-center  mt-2 mr-4">
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="search" placeholder="Search" {{ $attributes }} class="form-input px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                            <span class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <ul class="flex items-center flex-shrink-0 space-x-6">

                        <!-- Notifications menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-green-400 align-middle rounded-full hover:text-white hover:bg-green-400 focus:outline-none " @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                                <div class="flex items-cemter">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>
                                <!-- Notification badge -->
                                <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                            </button>
                            <template x-if="isNotificationsMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md">
                                    <li class="flex">
                                        <a class="text-white inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                                            <span>Messages</span>
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                                13
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>

                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-green-400 align-middle rounded-full hover:text-white hover:bg-green-400 focus:outline-none " @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md" aria-label="submenu">
                                    <li class="flex">
                                        <a class=" text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/index.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>

                </div>
            </header>
            <main class="">
                <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-green-400">

                    <div class="grid grid-cols-12 gap-6">
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                            <div class="col-span-12 mt-8">
                                <div class="flex items-center h-10 intro-y">
                                    <h2 class="mr-5 text-lg font-medium truncate"><?php echo $rol ?> : Hola, <?php echo $user ?></h2>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg width="50px" height="50px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.875 7.375C14.875 8.68668 13.8117 9.75 12.5 9.75C11.1883 9.75 10.125 8.68668 10.125 7.375C10.125 6.06332 11.1883 5 12.5 5C13.8117 5 14.875 6.06332 14.875 7.375Z" stroke="#63B3ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.25 15.775C17.25 17.575 15.123 19.042 12.5 19.042C9.877 19.042 7.75 17.579 7.75 15.775C7.75 13.971 9.877 12.509 12.5 12.509C15.123 12.509 17.25 13.971 17.25 15.775Z" stroke="#63B3ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9 9.55301C19.9101 10.1315 19.5695 10.6588 19.0379 10.8872C18.5063 11.1157 17.8893 11 17.4765 10.5945C17.0638 10.189 16.9372 9.57418 17.1562 9.03861C17.3753 8.50305 17.8964 8.1531 18.475 8.15301C19.255 8.14635 19.8928 8.77301 19.9 9.55301V9.55301Z" stroke="#63B3ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.10001 9.55301C5.08986 10.1315 5.43054 10.6588 5.96214 10.8872C6.49375 11.1157 7.11072 11 7.52347 10.5945C7.93621 10.189 8.06278 9.57418 7.84376 9.03861C7.62475 8.50305 7.10363 8.1531 6.52501 8.15301C5.74501 8.14635 5.10716 8.77301 5.10001 9.55301Z" stroke="#63B3ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M19.2169 17.362C18.8043 17.325 18.4399 17.6295 18.403 18.0421C18.366 18.4547 18.6705 18.8191 19.0831 18.856L19.2169 17.362ZM22 15.775L22.7455 15.8567C22.7515 15.8023 22.7515 15.7474 22.7455 15.693L22 15.775ZM19.0831 12.695C18.6705 12.7319 18.366 13.0963 18.403 13.5089C18.4399 13.9215 18.8044 14.226 19.2169 14.189L19.0831 12.695ZM5.91689 18.856C6.32945 18.8191 6.63395 18.4547 6.59701 18.0421C6.56007 17.6295 6.19567 17.325 5.78311 17.362L5.91689 18.856ZM3 15.775L2.25449 15.693C2.24851 15.7474 2.2485 15.8023 2.25446 15.8567L3 15.775ZM5.78308 14.189C6.19564 14.226 6.56005 13.9215 6.59701 13.5089C6.63397 13.0963 6.32948 12.7319 5.91692 12.695L5.78308 14.189ZM19.0831 18.856C20.9169 19.0202 22.545 17.6869 22.7455 15.8567L21.2545 15.6933C21.1429 16.7115 20.2371 17.4533 19.2169 17.362L19.0831 18.856ZM22.7455 15.693C22.5444 13.8633 20.9165 12.5307 19.0831 12.695L19.2169 14.189C20.2369 14.0976 21.1426 14.839 21.2545 15.8569L22.7455 15.693ZM5.78311 17.362C4.76287 17.4533 3.85709 16.7115 3.74554 15.6933L2.25446 15.8567C2.45496 17.6869 4.08306 19.0202 5.91689 18.856L5.78311 17.362ZM3.74551 15.8569C3.85742 14.839 4.76309 14.0976 5.78308 14.189L5.91692 12.695C4.08354 12.5307 2.45564 13.8633 2.25449 15.693L3.74551 15.8569Z" fill="#63B3ED"></path>
                                                    </g>
                                                </svg>

                                                <div class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center"><?php echo $pors_TotalUser ?>%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8"><?php echo strval($totalUser[0]["count(*)"]) ?></div>

                                                    <div class="mt-1 text-base text-gray-600">Total Usuarios</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg fill="#F6E05E" height="48px" width="48px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" stroke="#F6E05E" stroke-width="0.00024000000000000003">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="user-admin">
                                                            <path d="M22.3,16.7l1.4-1.4L20,11.6l-5.8,5.8c-0.5-0.3-1.1-0.4-1.7-0.4C10.6,17,9,18.6,9,20.5s1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5 c0-0.6-0.2-1.2-0.4-1.7l1.9-1.9l2.3,2.3l1.4-1.4l-2.3-2.3l1.1-1.1L22.3,16.7z M12.5,22c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5 s1.5,0.7,1.5,1.5S13.3,22,12.5,22z"></path>
                                                            <path d="M2,19c0-3.9,3.1-7,7-7c2,0,3.9,0.9,5.3,2.4l1.5-1.3c-0.9-1-1.9-1.8-3.1-2.3C14.1,9.7,15,7.9,15,6c0-3.3-2.7-6-6-6 S3,2.7,3,6c0,1.9,0.9,3.7,2.4,4.8C2.2,12.2,0,15.3,0,19v5h8v-2H2V19z M5,6c0-2.2,1.8-4,4-4s4,1.8,4,4s-1.8,4-4,4S5,8.2,5,6z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center"><?php echo $pors_Admin ?>%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8"><?php echo strval($totalAdmin[0]["count(*)"]) ?></div>

                                                    <div class="mt-1 text-base text-gray-600">Total Administradores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg fill="#D53F8C" version="1.1" id="XMLID_66_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" width="48px" height="48px" stroke="#D53F8C" stroke-width="0.00024000000000000003">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="workshop">
                                                            <g>
                                                                <polygon points="24,17 20,17 20,15 22,15 22,3 4,3 4,5 2,5 2,1 24,1 "></polygon>
                                                            </g>
                                                            <g>
                                                                <rect x="10" width="6" height="4"></rect>
                                                            </g>
                                                            <g>
                                                                <path d="M13,24H0v-5c0-2.3,1.3-4.4,3.3-5.4C2.5,12.8,2,11.7,2,10.5C2,8,4,6,6.5,6S11,8,11,10.5c0,0.7-0.1,1.3-0.4,1.8 c1.4-0.6,3.4-1.8,5.7-4.1l2-2l1.4,1.4L18.4,9l1.8,1.8l-0.3,0.6c-0.1,0.2-2.4,5.5-6.6,7.2C13.1,18.7,13,18.8,13,19V24z M2,22h9v-3 c0-1,0.6-1.9,1.5-2.3c2.7-1.1,4.6-4.2,5.3-5.5L17,10.4C12.1,15,8.4,15,8,15H6c-2.2,0-4,1.8-4,4V22z M6.5,13C7.9,13,9,11.9,9,10.5 S7.9,8,6.5,8S4,9.1,4,10.5S5.1,13,6.5,13z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="bg-yellow-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center"><?php echo $pors_Teacher ?>%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8"><?php echo strval($totalTeacher[0]["count(*)"]) ?></div>

                                                    <div class="mt-1 text-base text-gray-600">Total Maestros</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg fill="#68D391" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="48px" viewBox="0 0 793.945 793.945" xml:space="preserve" stroke="#68D391" stroke-width="0.00793945">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <path d="M793.945,761.744c0-51.26-8.874-88.787-26.365-111.523c-11.248-14.615-24.796-21.336-35.449-23.115l-141.333-49.869 c-51.298-17.104-67.438-30.725-72.228-36.244c42.001-40.84,52.373-99.988,54.933-127.477 c21.995-15.043,29.707-33.239,32.155-46.802c5.838-32.435-13.374-62.264-23.791-75.596c-2.523-22.968-6.546-44.05-11.717-63.534 h5.79V100.295h32.772c2.601,12.512,4.947,28.435,6.631,48.575c-7.447,10.704-16.185,32.525-19.646,79.593l-1.988,27.192h99.438 l-2.229-27.394c-2.907-35.892-15.504-60.523-24.348-73.886c-1.458-20.848-3.711-38.602-6.486-54.081h57.904V24.277h-86.388 c-11.229-13.643-23.109-17.416-32.622-17.416H422.311v17.416H75.954v76.019h142.05v127.289h5.788 c-5.169,19.483-9.191,40.566-11.715,63.534c-10.417,13.333-29.632,43.163-23.791,75.596c2.448,13.563,10.156,31.759,32.156,46.8 c2.571,27.436,12.953,86.402,54.945,127.457c-4.774,5.504-20.971,19.174-72.662,36.406L61.961,627.055 C43.947,629.779,0,648.09,0,761.744v25.34h793.945V761.744z M51.604,736.404c3.192-40.754,13.772-56.133,18.693-59.111 l148.882-51.98c68.186-22.729,102.443-47.375,107.838-77.576c3.425-19.262-6.25-34.807-14.277-41.162 c-41.6-38.119-42.463-107.383-42.463-108.014v-15.667l-14.007-6.999c-10.788-5.384-16.863-11.468-18.09-18.09 c-2.409-13.011,10.358-32.01,16.843-39.095l5.889-6.314l0.818-8.585c2.695-28.644,7.598-54.19,14.595-76.226h241.292 c7.003,22.035,11.899,47.582,14.6,76.226l0.815,8.585l5.891,6.314c6.271,6.728,19.229,25.882,16.849,39.021 c-1.187,6.645-7.283,12.755-18.1,18.162l-14.006,6.999v15.666c0,0.695-1.149,70.17-41.162,106.914 c-9.331,7.455-19.005,23-15.576,42.262c5.396,30.201,39.653,54.85,107.417,77.43l147.706,52.129h1.594 c4.93,2.994,15.508,18.357,18.697,59.111L51.604,736.404L51.604,736.404z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="bg-blue-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center"><?php echo $pors_Student ?>%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8"><?php echo strval($totalStudent[0]["count(*)"]) ?></div>

                                                    <div class="mt-1 text-base text-gray-600">Total Alumnos</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <?php echo "<div class='col-span-12 mt-5 " . $ocultar_div_permisos . "'>" ?>
                            <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                <div class="bg-white shadow-lg p-4" id="chartline"></div>
                                <div class="bg-white shadow-lg" id="chartpie"></div>
                            </div>
                        </div>
                        <div class='col-span-12 mt-5 " . $ocultar_div_permisos . "'>
                            <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                <div class="bg-white p-4 shadow-lg rounded-lg">
                                    <h1 class="font-bold text-base">Usuarios</h1>
                                    <div class="mt-4">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto">
                                                <div class="py-2 align-middle inline-block min-w-full">
                                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead>
                                                                <tr>
                                                                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Id</span>
                                                                        </div>
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Nombre</span>
                                                                        </div>
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Correo</span>
                                                                        </div>
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Rol</span>
                                                                        </div>
                                                                    </th>
                                                                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Estatus</span>
                                                                        </div>
                                                                    </th>
                                                                    <!--<th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">ACTION</span>
                                                                    </div>
                                                                </th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                                <?php
                                                                //var_dump($usuarios);
                                                                //foreach ($usuarios as $users => $value) {
                                                                //    $value=(array)$value;
                                                                ?>
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                        <p><?= $usuarios["id"] ?></p>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                        <p><?= $usuarios["nombre"] ?></p>
                                                                        <!--<p class="text-xs text-gray-400">PC & Laptop</p>-->
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                        <p><?= $usuarios["correo"] ?></p>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                        <p><?= $usuarios["Rol"] ?></p>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                        <div class="flex text-green-500">
                                                                            <?php
                                                                            $status = $usuarios["estatus"] == 1 ? "Activo" : "Inactivo";
                                                                            
                                                                            if ($usuarios["estatus"] == 1) {

                                                                            ?>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                                </svg>
                                                                                <p class="ml-2"><?= $status ?></p>

                                                                            <?php
                                                                            }
                                                                            if (($usuarios["estatus"] == 0)) {
                                                                            ?>
                                                                                <svg width="24px" height="24px" viewBox="0 0 1024.00 1024.00" fill="#ff0000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000" stroke-width="20.48">
                                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="6.144"></g>
                                                                                    <g id="SVGRepo_iconCarrier">
                                                                                        <path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill=""></path>
                                                                                        <path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill=""></path>
                                                                                        <path d="M328 340.8l32-31.2 348 348-32 32z" fill=""></path>
                                                                                    </g>
                                                                                </svg>
                                                                                <p class="ml-2 text-red-500 hover:text-red-600"><?= $status ?></p>

                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </div>
                                                                    </td>
                                                                    <!--<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    <div class="flex space-x-4">
                                                                        <a href="#" class="text-blue-500 hover:text-blue-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                            </svg>
                                                                            <p>Edit</p>
                                                                        </a>
                                                                        <a href="#" class="text-red-500 hover:text-red-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                            </svg>
                                                                            <p>Delete</p>
                                                                        </a>
                                                                    </div>
                                                                </td>-->
                                                                </tr>
                                                                <?php
                                                                //}
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script>
        function div_permisos() {
            if ($ocultar_div_permisos = "hidden") {
                $ocultar_div_permisos = "";
            } else {
                $ocultar_div_permisos = "hidden";
            }
        }
    </script>
    <script>
        function data() {

            return {

                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }
    </script>
</body>

</html>