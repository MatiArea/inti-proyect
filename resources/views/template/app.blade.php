<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INTI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="/public/assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 15px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #00b9e4;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 10px 0px;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: black;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 1rem !important;
            padding-left: 40px !important;
            margin-top: 5px !important;
        }

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        @media(maz-width:768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0px;
            }

            #sidebarCollapse span {
                display: none;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="min-vh-100">
            <div style="border-bottom: 3px solid #47748b;">
                <img src="/public/assets/brand/inti_logo_byn.png" width="250px" height="155px" />
            </div>
            <div class="mt-2">
                <ul class="components">
                    <li class="m-2 list-unstyled d-flex flex-column">
                        <a class="btn btn-toggle align-items-center rounded collapsed text-start"
                            data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            Stock
                        </a>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/" class=" rounded">Inicio</a></li>
                                <li><a href="/stock/entradas" class=" rounded">Entradas</a></li>
                                <li><a href="/stock/salidas" class=" rounded">Salidas</a></li>
                                <li class="m-2 list-unstyled d-flex flex-column">
                                    <a class="btn btn-toggle align-items-center rounded collapsed text-start"
                                        data-bs-toggle="collapse" data-bs-target="#config-collapse"
                                        aria-expanded="true">
                                        Configuracion
                                    </a>
                                    <div class="collapse" id="config-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                            <li><a href="/ubicacion" class=" rounded">Ubicaciones</a></li>
                                            <li><a href="/responsable" class=" rounded">Responsable</a></li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <a class="btn btn-toggle align-items-center rounded collapsed text-start">
                            Inventario
                        </a>
                    </li>
                </ul>
            </div>


        </nav>

        <div class="content min-vh-100 vw-100">
            <!-- Header -->
            <div class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
                <button type="button" id="sidebarCollapse" class="navbar-toggler collapsed mx-2">
                    <i class="fa-solid fa-bars " style="color: black;"></i>
                </button>
                <div class="navbar-nav d-flex flex-row aling-items-center">
                    <a href="/">
                        <img src="/public/assets/brand/logo.png" />
                    </a>
                </div>

                <div class="navbar-nav">

                </div>
            </div>
            <!-- Fin Header -->

            @yield('content')
        </div>
    </div>

    <script src="/public/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script> -->
    <script src="/public/js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/70dab0e261.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        < /> <
        script >
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active')
                })
            })
    </script>
</body>

</html>
