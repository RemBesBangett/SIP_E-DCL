<?php
session_start();
if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php?page=login');
    exit();
}
include './view/template/header.php';
$baseUrl = '/E-DCL/';
$namaLogin = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dummy</title>
    <link rel="stylesheet" href="<?= $baseUrl; ?>src/Output.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>asset/fontawesome/css/all.min.css">
    <script src="<?= $baseUrl; ?>asset/fontawesome/js/all.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
</head>

<body class="bg-gray-100">




    <!-- Main Content -->
    <div class="ml-64 pt-20 px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-700 mb-2">Selamat Datang, Username!</h1>
            <p class="text-gray-600">Ini adalah dashboard dummy. Kamu bisa menambahkan menu dan konten sesuai kebutuhan.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="font-bold text-xl mb-2">Statistik 1</h2>
                <p class="text-gray-600">Contoh data 1</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="font-bold text-xl mb-2">Statistik 2</h2>
                <p class="text-gray-600">Contoh data 2</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="font-bold text-xl mb-2">Statistik 3</h2>
                <p class="text-gray-600">Contoh data 3</p>
            </div>
        </div>
        <div class="mt-10">
            <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                + Add Something
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('titlePage').textContent = 'Dashboard';
            document.getElementById('userLogin').textContent = '<?= $namaLogin; ?>';
        });
    </script>
</body>

</html>