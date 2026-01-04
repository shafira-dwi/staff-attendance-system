<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Staff -->
        <div
            class="bg-white p-5 rounded shadow hover:shadow-lg transition-shadow duration-200 flex items-center space-x-4">
            <div class="p-3 rounded-full bg-blue-500 text-white text-xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-gray-500">Total Staff</p>
                <p class="text-3xl font-bold text-blue-600">15</p>
            </div>
        </div>

        <!-- Hadir Hari Ini -->
        <div
            class="bg-white p-5 rounded shadow hover:shadow-lg transition-shadow duration-200 flex items-center space-x-4">
            <div class="p-3 rounded-full bg-green-500 text-white text-xl">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <p class="text-gray-500">Hadir Hari Ini</p>
                <p class="text-3xl font-bold text-green-600">10</p>
            </div>
        </div>

        <!-- Pending Leave -->
        <div
            class="bg-white p-5 rounded shadow hover:shadow-lg transition-shadow duration-200 flex items-center space-x-4">
            <div class="p-3 rounded-full bg-yellow-500 text-white text-xl">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div>
                <p class="text-gray-500">Pending Leave</p>
                <p class="text-3xl font-bold text-yellow-600">3</p>
            </div>
        </div>

    </div>

</body>

</html>
