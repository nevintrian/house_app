<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CMS</title>
    <link href="templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="templates/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="templates/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
    .table {
        text-align: center;
    }

    .table th {
        background-color: rgb(237, 237, 237)
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #1bc88a;
        border-color: #1bc88a;
    }
</style>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-text mx-3">CMS</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item  {{ Request::is('event') ? 'active' : '' }}">
                <a class="nav-link" href="/event">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Acara</span></a>
            </li>
            <li class="nav-item  {{ Request::is('documentation') ? 'active' : '' }}">
                <a class="nav-link" href="/documentation">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Dokumentasi</span></a>
            </li>
            <li class="nav-item  {{ Request::is('mitra') ? 'active' : '' }}">
                <a class="nav-link" href="/mitra">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Mitra</span></a>
            </li>
            @if (auth()->user()->role == 'user')
            <li class="nav-item  {{ Request::is('feedback') ? 'active' : '' }}">
                <a class="nav-link" href="/feedback">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Saran</span></a>
            </li>
            @endif
            @if (auth()->user()->role == 'admin')
            <li class="nav-item  {{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            @endif
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-fw fa-user"></i> &nbsp;
                                     {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @yield('container')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Content Management System</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa anda yakin?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="user/{{ auth()->user()->id }}">
    @csrf
    @method('put')
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control name" name="name" placeholder="Nama" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control email" name="email" placeholder="Email" value="{{ auth()->user()->email }}"  required>
                        </div>
                        <br>
                        <small><b>Abaikan jika tidak ingin mengubah password : </b></small>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control password" name="password" placeholder="Password">
                        </div>
                        <input type="hidden" name="status" value="{{ auth()->user()->status }}">
                        <input type="hidden" name="role" value="{{ auth()->user()->role }}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    @yield("modal")

    <script src="templates/vendor/jquery/jquery.min.js"></script>
    <script src="templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="templates/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="templates/js/sb-admin-2.min.js"></script>
    <script src="templates/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="templates/js/demo/datatables-demo.js"></script>

    @yield('script')
</body>

</html>
