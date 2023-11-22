<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="icons/box-seam.svg" type="image/x-icon">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <title>Projek PWEB | {{ $title }}</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(ellipse at center, rgba(255, 254, 234, 1) 0%, rgba(255, 254, 234, 1) 35%, #B7E8EB 100%);
            overflow-x: hidden;
        }

        .ocean {
            height: 5%;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            background: #015871;
            z-index: -1;
        }

        .wave {
            background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x;
            position: absolute;
            top: -198px;
            width: 6400px;
            height: 198px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            transform: translate3d(0, 0, 0);
        }

        .wave:nth-of-type(2) {
            top: -175px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
            opacity: 1;
        }

        @keyframes wave {
            0% {
                margin-left: 0;
            }

            100% {
                margin-left: -1600px;
            }
        }

        @keyframes swell {

            0%,
            100% {
                transform: translate3d(0, -25px, 0);
            }

            50% {
                transform: translate3d(0, 5px, 0);
            }
        }
    </style>
</head>

<body>
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show w-25 m-3" role="alert"
            style="position: fixed; z-index: 1; top: 0; right: 0;">
            <strong>Berhasil!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show w-25 m-3" role="alert"
            style="position: fixed; z-index: 1; top: 0; right: 0;">
            <strong>Gagal!</strong> {{ session('errors') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @include('templates.navbar')

    @yield('content')
    <script src="/bootstrap/js/bootstrap.js"></script>
</body>

</html>
