<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/side_bar_menu.blade.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.blade.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/index_buttons.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/index.blade.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/create.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}">
                
    </head>
    <body>
        @include('components.side_bar_menu')
        <script src="{{asset('js/pages/navbar.js')}}"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </body>

