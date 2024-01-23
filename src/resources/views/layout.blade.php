<!doctype html>

<html lang="lv">

<head>
    <meta charset="utf-8">
    <title>Project 2 - {{ $title }}</title>
    <meta name="description" content="Tīmekļa Tehnoloģiju 2. praktiskais darbs">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
    >

    <style>
        body {
            background-color: #dcd5b4; /* Yellow background */
            color: #800000; /* Dark red text */
        }
        .navbar {
            background-color: #800000 !important; /* dark red navbar background color */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important; /* white text color for navbar brand and links */
        }
        footer {
            color: #ffffff; /* Set your desired footer text color */
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-md bg-primary mb-3" data-bs-theme="dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Book house</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"  href="/">Home</a>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/authors">Book authors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/genres">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/books">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">End</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <main class="container">
        <div class="row">
            <div class="col">

                @yield('content')

            </div>
        </div>
    </main>

    <footer class="text-light mt-4" style="background-color: #020048 !important;">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    Kintija Mūrniece, 2024
                </div>
            </div>
        </div>

    </footer>

    <script src="/js/admin.js"></script>

    </body>

</html>
