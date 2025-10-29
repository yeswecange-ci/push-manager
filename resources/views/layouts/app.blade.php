<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WhatsApp Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Build assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'], build: true)

    <!-- Force le HTTPS même si l’utilisateur entre en HTTP -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<body class="font-sans antialiased bg-gray-50">
    {{ $slot }}
</body>
</html>
