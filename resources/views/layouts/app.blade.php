<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700" rel="stylesheet">

        <style>
            html {
                box-sizing: border-box;
            }

            *, *:before, *:after {
                box-sizing: inherit;
            }

            body {
                font-family: Roboto, sans-serif;
                color: #686868;
                margin: 0;
                -webkit-font-smoothing: antialiased;
                text-rendering: optimizeLegibility;
                background-color: #fcfcfc;
            }

            .wrapper {
                padding: 0 5%;
            }

            .header {
                margin: 20px auto 0;
                max-width: 1400px;
                line-height: 35px;
            }

            .page-title {
                color: rgba(0, 0, 0, 0.35);
                font-size: 30px;
                font-weight: bold;
                text-decoration: none;
            }

            .nav {
                float: right;
            }

            .nav ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .nav li {
                display: inline;
            }

            .nav li:not(:last-child) {
                margin-right: 20px;
            }

            .nav a {
                color: rgba(0, 0, 0, 0.35);
                display: inline-block;
                border: 1px solid rgba(0, 0, 0, 0.25);
                border-radius: 3px;
                padding: 0 15px;
                font-weight: 700;
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 0.05em;
                text-decoration: none;
                width: 90px;
                text-align: center;
                transition: transform 100ms ease-in;
            }

            .nav a:hover {
                transform: translateY(2px);
            }

            a.signup {
                background-color: rgba(0, 0, 0, 0.7);
                color: #fff;
                border: 0;
            }

            .container {
                margin: 50px 0 70px;
            }

            .box {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.18);
                background-color: #fff;
                border-radius: 5px;
                width: 540px;
                max-width: 100%;
                display: block;
                position: relative;
                overflow: hidden;
                min-height: 180px;
                margin: 15px auto;
            }

            .chart {
                background-color: #fa8231;
                height: 250px;
                padding: 20px;
                position: relative;
            }

            #chart {
                position: absolute;
                bottom: 0;
                left: 0;
            }

            #chart .line {
                fill: none;
                stroke: rgba(255, 255, 255, 0.9);
                stroke-width: 2;
            }

            #chart .area {
                fill: rgba(255, 255, 255, 0.25);
                stroke: none;
            }

            .chart__label {
                font-size: 16px;
                color: #fdd1b4;
            }

            .chart__value {
                display: block;
                color: #fff;
                font-size: 34px;
                line-height: 1.1em;
                text-transform: none;
                letter-spacing: 0;
                font-weight: 400;
            }

            .bottom {
                padding: 25px 20px;
            }

            .bottom .created {
                text-transform: uppercase;
                font-size: 11px;
                letter-spacing: 0.075em;
                margin-bottom: 0.6em;
                color: rgba(0, 0, 0, 0.4);
            }

            .bottom .title {
                color: #484848;
                font-size: 22px;
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }

            .bottom .url {
                font-size: 14px;
                display: block;
                text-decoration: none;
                color: rgba(0, 0, 0, 0.45);
                margin-top: 0.2em;
            }

            .content p {
                font-size: 16px;
                line-height: 1.5em;
                margin: 0;
            }

            .content p a {
                color: #686868;
            }

            .content-404 {
                text-align: center;
                max-width: 400px;
                margin: 0 auto;
            }

            .content-404 img {
                height: 150px;
                margin-bottom: 10px;
            }

            .content-404 h1 {
                font-weight: 700;
                font-size: 60px;
                margin: 0 0 0.3em;
                color: #484848;
            }

            .content-404 p {
                font-size: 19px;
                max-width: 400px;
                margin: 0 0 40px;
            }

            .footer {
                margin: 20px auto 0;
                max-width: 1400px;
                line-height: 35px;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .footer li {
                display: inline;
                margin: 0 20px;
            }

            .footer a {
                color: rgba(0, 0, 0, 0.3);
                text-decoration: none;
                font-size: 14px;
                font-weight: bold;
            }

            @media screen and (min-width: 768px) {
                .container {
                    margin: 120px 0 140px;
                }

                .wrapper {
                    padding: 0 40px;
                }

                .content-404 {
                    padding: 0;
                }

                .content-404 img {
                    height: 170px;
                }

                .content-404 h1 {
                    font-size: 80px;
                }

                .content-404 p {
                    font-size: 21px;
                }
            }
        </style>
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