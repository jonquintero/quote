<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRM</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
        @routes
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @inertiaHead
        </head>
    <body class="font-sans leading-none text-gray-700 antialiased" >
        @inertia
    </body>
</html>
