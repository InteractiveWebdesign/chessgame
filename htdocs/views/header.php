<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Add custom styles for the header */
        header {
            z-index: 1000; /* Set a higher z-index value */
        }
    </style>
    <title>Chess Game</title>
</head>
<body class="pt-9"> <!-- Add padding-top to body to prevent content from being hidden behind the fixed header -->

<header class="fixed top-0 left-0 right-0 bg-blue-900 p-4 text-white">
    <div class="container mx-auto flex justify-center items-center space-x-4">
        <h1 class="text-3xl font-bold">Chess Game</h1>
        <button id="start-button" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-blue-600">Start</button>
        <button id="end-turn-button" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">End Turn</button>
    </div>
</header>

<!-- Your content goes here -->
<div class="container mx-auto mt-8">
    <!-- Rest of your HTML content -->
</div>

</body>
</html>
