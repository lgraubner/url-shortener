<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link href="/app.css" rel="stylesheet" />

        @section('head')

        @show
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <a href="/" class="page-title">lg.im</a>
                @section('navigation')
                <nav class="nav">
                    <ul>
                        <li>
                            <a href="/login">Login</a>
                        </li>
                        <li>
                            <a class="signup" href="/signup">Sign up</a>
                        </li>
                    </ul>
                </nav>
                @show
            </header>
            <main class="content">
                <div class="container">
                    @yield('content')
                </div>
            </main>
            <footer class="footer">
                @section('footer-navigation')
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="/legal">Legal Notice</a>
                            </li>
                            <li>
                                <a href="/privacy">Privacy</a>
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