<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Berbagi</title>

    <!-- Custom fonts for this template-->
    <link href="templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="templates/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .bg-login-image-new {
        background: url("templates/library.jpg");
        background-position: center;
        background-size: cover;
    }
</style>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image-new">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Rumah Berbagi</h1>
                                        <h1 class="h4 text-gray-900 mb-4">Content Management System</h1>
                                    </div>
                                    <form class="user" method="POST" action="login_auth">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password" required>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-user btn-block" style="background-color: rgb(132, 210, 72); border:none">
                                            LOGIN
                                        </button>
                                        {{-- <hr> --}}

                                    </form>
                                    {{-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="templates/vendor/jquery/jquery.min.js"></script>
    <script src="templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="templates/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="templates/js/sb-admin-2.min.js"></script>

</body>

</html>
