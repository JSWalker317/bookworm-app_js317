<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Worm JS</title>
      
    </head>
    <body class="antialiased">
        {{--  --}}
        {{-- <img src="assets/clients/images/bookcover/book1.jpg" alt=""> --}}
        <div id="root"></div>
        <script src="{{mix('/js/app.js')}}"></script>

    </body>
</html>
