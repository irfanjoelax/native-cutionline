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
                    <div class="mt-5 text-center">
                        <img src="asset/img/logo.svg" class="img-fluid" width="75">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow border-0 rounded-4 mt-5">
                                <div class="card-header">
                                    <h5 class="text-center fw-bold my-2">
                                        <?= $title ?>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <form class="px-4 pb-2" action="app/login.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="name_user" type="text" placeholder="Username" required />
                                            <label for="name_user">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="pass_user" type="password" placeholder="Password" required />
                                            <label for="pass_user">Password</label>
                                        </div>
                                        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
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