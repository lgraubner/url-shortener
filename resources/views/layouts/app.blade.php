<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link href="{{ mix('/dist/app.css') }}" rel="stylesheet" />

        @section('head')

        @endsection
    </head>
    <body>
        <main class="content">
           @yield('content')
         </main>
    </body>
</html>
