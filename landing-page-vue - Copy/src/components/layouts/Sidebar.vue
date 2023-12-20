<template>
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
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fs-5 d-none d-sm-inline">Data User</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('user.tataUsaha.index') }}">Data Staff Tata
                                            Usaha</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.guru.index') }}">Data Guru</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="suratDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fs-5 d-none d-sm-inline">Data Surat</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="suratDropdown">
                                    <li><a class="dropdown-item" href="{{ route('letterType.index')}}">Data Klasifikasi
                                            Surat</a></li>
                                    <li><a class="dropdown-item" href="{{ route('letter.index')}}">Data Surat</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col container">
                @yield('content')
            </div> -->
        </div>
    </div>

</template>

<style>
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
</style>