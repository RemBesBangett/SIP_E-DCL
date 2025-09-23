<?php
$baseUrl = '/E-DCL/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-DCL TMMIN</title>
    <link rel="icon" type="image/x-icon" href="<?= $baseUrl ?>asset/Image/png-transparent-star-symbol-fivepointed-star-logo-red-line-wing-angle-symmetry.png">
    <link rel="stylesheet" href="<?= $baseUrl; ?>src/Output.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>asset/fontawesome/css/all.min.css">
</head>
<style>
    .custom-dropdown-menu-general {
        z-index: 9999 !important;
        position: absolute;
    }
</style>

<body class="font-sans bg-gray-100 transition-all p-1">
    <div id="sidebar-general" class="fixed top-0 left-0 w-72 h-full z-[1000] bg-slate-800 pt-16 transition-all duration-300 -translate-x-full shadow-lg">
        <a href="javascript:void(0)" class="absolute top-4 right-4 text-gray-300 text-3xl hover:text-white" onclick="closeSidebar()">&times;</a>
        <a href="index.php?page=dashboard" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-home mr-3"></i> Dashboard
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-boxes-stacked mr-3"></i> Staging Visualization
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-truck-fast mr-3"></i> Shipping Visualization
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-industry mr-3"></i> Master Customer
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-route mr-3"></i> Master Route
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-box-open mr-3"></i> Master Product
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-cart-shopping mr-3"></i> Master Order
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-repeat mr-3"></i> Flow Repeat
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-calendar mr-3"></i> Schedule
        </a>
        <a href="index.php?page=user" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-user mr-3"></i> User Management
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-print mr-3"></i> Printer
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-mobile-screen mr-3"></i> BHT Device
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-qrcode mr-3"></i> Scan BHT
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-truck mr-3"></i> Delivery
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-user-lock mr-3"></i> Interlock
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-file mr-3"></i> Summary Cycle
        </a>
        <a href="#" class="sidebar-link flex items-center px-6 py-3 text-base text-gray-100 hover:bg-slate-700 hover:border-l-4 hover:border-blue-500 transition-all">
            <i class="fas fa-file-invoice mr-3"></i> Skid Label
        </a>
    </div>

    <!-- Navbar -->
    <nav class="navbar-general w-full bg-white shadow flex items-center px-6 py-2 z-10">
        <div class="menu-toggle-btn text-blue-500 text-2xl cursor-pointer mr-4" onclick="openSidebar()">
            &#9776;
        </div>
        <a class="navbar-brand-general flex items-center mr-6">
            <img src="<?= $baseUrl; ?>asset/Image/DENSO_ smalltagline_2lines_Red_Pantone1_dl_1280.jpg" alt="Logo" class="h-10 w-auto">
        </a>
        <div class="navbar-title-general flex-grow text-center">
            <h3 id="titlePage" class="font-semibold text-xl text-slate-800 m-0">Page Title</h3>
        </div>
        <div class="user-menu-general flex items-center ml-auto relative">
            <div class="custom-dropdown-general relative">
                <a class="custom-dropdown-toggle-general flex items-center cursor-pointer" href="#">
                    <i class="fas fa-user-circle user-icon-general text-green-500 text-2xl"></i>
                </a>
                <div class="custom-dropdown-menu-general absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-lg py-2 hidden">
                    <div class="user-info-general flex items-center px-5 py-3 border-b border-gray-200">
                        <i class="fas fa-user-circle user-icon-large-general text-green-500 text-4xl mr-3"></i>
                        <span class="font-bold text-slate-700" id="userLogin">username</span>
                    </div>
                    <div class="custom-dropdown-divider-general h-px my-2 bg-gray-200"></div>
                    <a class="custom-dropdown-item-general px-5 py-2 text-slate-700 hover:bg-gray-100 flex items-center" href="#">
                        <i class="fas fa-user mr-3"></i>Profile
                    </a>
                    <a class="custom-dropdown-item-general px-5 py-2 text-slate-700 hover:bg-gray-100 flex items-center" href="index.php?page=logout">
                        <i class="fas fa-sign-out-alt mr-3"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div id="main-content" class="transition-all duration-300">
    </div>

    <script>
        function openSidebar() {
            document.getElementById("sidebar-general").classList.remove("-translate-x-full");
            document.getElementById("main-content").classList.add("ml-72");
        }

        function closeSidebar() {
            document.getElementById("sidebar-general").classList.add("-translate-x-full");
            document.getElementById("main-content").classList.remove("ml-72");
        }

        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.querySelector('.custom-dropdown-toggle-general');
            var dropdownMenu = document.querySelector('.custom-dropdown-menu-general');
            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>