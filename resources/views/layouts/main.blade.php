<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LotemX') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet" >     <!-- NEW (*) --> 
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="bg-gray-800 min-h-screen flex items-center justify-center">
          <div>
            <img src="{{ asset('img/floating.svg') }}" />
          </div>
          <h1 class="p-20 text-3xl lg:text-5xl text-white font-bold mx-auto max-w-6xl">
              <span class="text-transparent bg-gradient-to-r bg-clip-text from-blue-500 to-green-500">
                Ми любимо Youtube,</span>
          <br />
            бо зоровий нерв у мозку у 90 разів товстіший за слуховий.
          </h1>
          <div>@yield('todo')</div>

</div>
</body>
</html>