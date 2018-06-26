<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not found</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <style>
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        body {
            font-family: Roboto, sans-serif;
            color: #484848;
            margin: 0;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        .header {
            margin: 20px auto 0;
            padding: 0 5%;
            position: absolute;
            width: 100%;
        }

        .title {
            color: rgba(0, 0, 0, 0.35);
            font-size: 30px;
            font-weight: bold;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
            padding: 0 5%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container img {
            height: 150px;
            margin-bottom: 10px;
        }

        .container h1 {
            font-weight: 700;
            font-size: 60px;
            margin: 0 0 0.3em;
        }

        .container p {
            font-size: 19px;
            max-width: 400px;
            line-height: 1.5em;
            margin: 0 0 40px;
        }

        .container a {
            color: #484848;
        }

        @media screen and (min-width: 768px) {
            .header {
                padding: 0 40px;
            }

            .container img {
                height: 170px;
            }

            .container h1 {
                font-size: 80px;
            }

            .container p {
                font-size: 21px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <span class="title">lg.im</span>
        </header>
        <div class="container">
            <div>
                <img src="http://lg.test/robot.png" alt="Robot" />
                <h1>Oops!</h1>
                <p>We couldn't find a link for the URL you clicked. <a href="/">Homepage</a></p>
            </div>
        </div>
    </div>
</body>
</html>