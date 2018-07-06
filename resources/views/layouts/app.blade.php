<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link href="{{ mix('/dist/app.css') }}" rel="stylesheet" />

        @section('head')

        @show
    </head>
    <body class="bg-grey-lightest antialiased font-sans text-grey-darker leading-tight">
        <div class="max-w-spacing xl:max-w-3xl mx-auto">
            <header class="header mt-5 flex justify-between items-center">
                <a href="/" class="page-title text-grey-darker font-bold text-3xl no-underline">lg.im</a>
                @section('navigation')
                <nav class="nav">
                    <ul class="list-reset">
                        <li class="inline">
                            <a href="/login" class="no-underline rounded border-2 py-2 px-3 text-grey border-grey font-bold">Login</a>
                        </li>
                        <li class="inline ml-5">
                            <a class="no-underline rounded border-2 py-2 px-3 text-white bg-grey border-grey font-bold" href="/signup">Sign up</a>
                        </li>
                    </ul>
                </nav>
                @show
            </header>
            <main class="content">
                @yield('content')
            </main>
            <footer class="footer">
                @section('footer-navigation')
                    <nav class="footer-nav mb-5 text-center text-sm">
                        <ul class="list-reset">
                            <li class="inline mx-5">
                                <a href="/legal" class="no-underline text-grey-dark font-semibold">Legal Notice</a>
                            </li>
                            <li class="inline mx-5">
                                <a href="/privacy" class="no-underline text-grey-dark font-semibold">Privacy</a>
                            </li>
                        </ul>
                    </nav>
                @show
            </footer>
        </div>
        @section('scripts')

        @show
    </body>
</html>
