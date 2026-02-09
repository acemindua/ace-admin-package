<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ace Admin Panel</title>

    @routes

    @vite(['resources/js/app.js'], 'vendor/ace-admin')

    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>