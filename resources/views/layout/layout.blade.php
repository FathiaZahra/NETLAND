<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <script src="https://kit.fontawesome.com/3b3dff70a2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>NETLAND</title>

    <style></style>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h6><a href="#" class="logo"><img src="/../foto/logo.png"
                        style="width: 90px; height: 90px; padding-left: -10px">NETLAND</a></h6>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="/dashboard"><span class="fa fa-home"></span> Beranda</a>
                </li>
                @if (Auth::user()->role == 'pengelola')
                    <li>
                        <a href="http://127.0.0.1:8000/dashboard/informasi"><span
                                class="fa-solid fa-circle-info"></span>Informasi</a>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/dashboard/akomodasi"><span class="fa-solid fa-map-pin"
                                style="color: #ffffff;"></span>Akomodasi</a>
                    </li>
                @endif
                @if (Auth::user()->role == 'staff_ticketing')
                    <li>
                        <a href="http://127.0.0.1:8000/dashboard/ticket"><span class="fa-solid fa-ticket"
                                style="color: #ffffff;"></span>Tiket</a>
                    </li>
                @endif
                @if (Auth::user()->role == 'staff_penyewaan')
                    <li>
                        <a href="http://127.0.0.1:8000/dashboard/peminjaman"><span class="fa-solid fa-campground"
                                style="color: #ffffff;"></span>Peminjaman</a>
                    </li>
                @endif
                <li class="active">
                    <a href="/logs"><span class="fa-regular fa-clock"></span> Log Activity</a>
                </li>
                <li>
                    <a href="http://127.0.0.1:8000"><span class="fa-solid fa-right-from-bracket"
                            style="color: #ffffff;" class="mb-100"></span>LogOut</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" style="background:#fff">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-strip">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>  --}}
                </div>
            </nav>
            @yield('content')
        </div>
    </div>


    @include('layout.flash-message')



    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            // Your existing script for handling sidebar toggle
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

            // Bootstrap native collapse handling
            $('[data-toggle="collapse"]').on('click', function() {
                var target = $(this).data('target');
                $(target).toggleClass('show');
            });
        });
    </script>

</body>
<script>
    const container = document.querySelector(".container");
    const primaryNav = document.querySelector(".nav__list");
    const toggleButton = document.querySelector(".nav-toggle");

    toggleButton.addEventListener("click", () => {
        const isExpanded = primaryNav.getAttribute("aria-expanded");
        primaryNav.setAttribute(
            "aria-expanded",
            isExpanded === "false" ? "true" : "false"
        );
    });

    container.addEventListener("click", (e) => {
        if (!primaryNav.contains(e.target) && !toggleButton.contains(e.target)) {
            primaryNav.setAttribute("aria-expanded", "false");
        }
    });
</script>
</head>

</html>
