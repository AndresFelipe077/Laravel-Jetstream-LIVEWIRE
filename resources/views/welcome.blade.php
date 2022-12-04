<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    @php
        $color = 'yellow';
    @endphp
    
    <body>

        <div class="container mx-auto">
            <x-alert :color="$color" class="mb-4"{{--color="red"--}}>

                <x-slot name="title">
                    Titulo 1
                </x-slot>

                Que mas yo soy el mejor
            </x-alert>

            <x-alert>

                <x-slot name="title">
                    Titulo 2
                </x-slot>

                Hey whats up?
            </x-alert>
            
            <x-alert class="mt-5">

                <x-slot name="title">
                    Titulo 2
                </x-slot>

                Hey whats up?
            </x-alert>

        </div>

    </body>
</html>
