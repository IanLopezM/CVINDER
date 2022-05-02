<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CVINDER</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <style>
        .gradient {
            background: linear-gradient(90deg, rgba(51, 213, 162, 1) 0%, rgba(81, 134, 218, 1) 100%);
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;" cz-shortcut-listen="true">
    <div class="w-60 h-full shadow-md bg-white px-1 absolute">
        <ul class="relative">
            <li class="relative">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark">Sidenav link 1</a>
            </li>
            <li class="relative">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark">Sidenav link 2</a>
            </li>
            <li class="relative">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark">Sidenav link 2</a>
            </li>
        </ul>
    </div>
</body>

</html>