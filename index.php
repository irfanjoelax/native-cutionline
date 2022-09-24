<?php include 'config/library.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $title ?></title>

    <!-- Styles -->
    <link rel="shortcut icon" href="asset/img/logo.svg" type="image/x-icon">
    <link href="asset/css/styles.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-3">
                            <img src="asset/img/login.svg" class="img-fluid">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow border-0 rounded-4 mt-5">
                                <div class="card-header">
                                    <h6 class="text-center fw-bold my-2">
                                        Sign in untuk menggunakan aplikasi
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form class="px-4 pb-2">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                            Sign in
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/scripts.js"></script>
</body>

</html>