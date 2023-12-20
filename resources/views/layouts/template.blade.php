<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengelola Surat App</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script 
      src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
</head>
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="sidebar col-auto col-md-4 col-lg-2 min-vh-100">
                <div class="sidebar p-2">
                    <a href="#" class="d-flex text-decoration-none mt-1 align-items-center">
                        <span class="fs-2 d-none d-sm-inline">Pengelolaan Surat</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mt-4">
    <li class="nav-item">
        <a href="{{route('dashboard')}}" class="nav-link">
            <i></i><span class="fs-5 d-none d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-5 d-none d-sm-inline">Data User</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('user.tataUsaha.index') }}">Data Staff Tata Usaha</a></li>
                <li><a class="dropdown-item" href="{{ route('user.guru.index') }}">Data Guru</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="suratDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-5 d-none d-sm-inline">Data Surat</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="suratDropdown">
                <li><a class="dropdown-item" href="{{ route('letterType.index')}}">Data Klasifikasi Surat</a></li>
                <li><a class="dropdown-item" href="{{ route('letter.index')}}">Data Surat</a></li>
            </ul>
        </div>
    </li>
</ul>
                </div>
            </div>
            <div class="col container">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('script')
</body>
<Style>
@import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&display=swap');


    .col.container {
        margin: 0;
        padding: 0;
    }

    /* .sidebar {
        background-color: #a6b1b4;
    } */

    .nav-link, .sidebar.p2 a {
        color: #3b5d66;
        font-weight: 500;
        font-family:'Work Sans', sans-serif;
    }

    .fs-2.d-none.d-sm-inline {
        color: #3b5d66;
        font-weight: 600;
    }
</Style>

</html>