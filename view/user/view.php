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
    <title>User Management</title>
    <link rel="stylesheet" href="<?= $baseUrl; ?>src/Output.css">
    <script src="<?= $baseUrl; ?>node_modules/flowbite/dist/flowbite.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</head>
<style>
</style>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-indigo-700">User Management</h1>
            <button class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 transition" data-modal-target="static-modal" data-modal-toggle="static-modal" type="button">
                + Add User
            </button>
        </div>
        <div class="relative overflow-x-auto shadow-lg rounded-lg bg-white">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="uppercase bg-indigo-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Access</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $index => $user): ?>
                        <tr class="border-b hover:bg-indigo-50 transition <?php echo $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; ?>">
                            <th scope="row" class="px-6 py-4 font-semibold text-indigo-700">
                                <?= $index + 1 ?>
                            </th>
                            <td class="px-6 py-4"><?= $user['NAMA'] ?></td>
                            <td class="px-6 py-4"><?= $user['ACCESS'] ?></td>
                            <td class="px-6 py-4">
                                <?php if (strtolower($user['STATUS']) == 'active'): ?>
                                    <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Active</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold"><?= $user['STATUS'] ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-indigo-600 hover:underline transition">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        ADD USER
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="">

                        <div class="mb-6">
                            <label for="NPK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan NPK</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan Nama</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan Password</label>
                            <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 max-w-sm mx-auto">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose Authority</option>
                                <option value="admin">Admin</option>
                                <option value="leader">Leader</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                            <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('titlePage').textContent = 'User Management';
                document.getElementById('userLogin').textContent = '<?= $namaLogin; ?>';
            });
        </script>
</body>

</html>