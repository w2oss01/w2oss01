<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

        

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/w2-oss-01.css" rel="stylesheet">
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>

    <title>Đăng nhập</title>
</head>

<body>
    <div class="container-fluid d-flex">
        <div class="row font-door-content mx-auto">
            <div class="col-6 font-door-info me-5">
                <div>
                    <h1 class="primary-text">Welcome to <br> W2-OSS-01</h1>
                </div>
                <div>
                    <p class="pb-5 secondary-text">Our partners from all sectors like F&B,
                        entertainment, cosmetic, and
                        shopping are
                        generously giving thousands of free vouchers everyday. </p>
                </div>
            </div>
            <div class="col-6 font-door-form">
                <div class="d-flex">
                    <div class="d-flex align-middle mx-auto">
                        <div class="header-logo-2 my-auto me-3"></div>
                        <h2 class="text-secondary">Đăng nhập</h2>
                    </div>
                </div>

                <div style="max-width: 400px; margin-left: auto; margin-right: auto; margin-top: 30px;">
                    <form name="loginForm" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label secondary-text small-text">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="inputUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label secondary-text small-text">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                        </div>
                        <div class="mb-3">
                            <p class="text-danger"><?php 
                                echo Session::get('message');
                                ?></p>
                        </div>
                        <div class="mb-3 d-flex">
                            <button type="submit" class="normal-button mx-auto  mt-3">Đăng nhập</button>
                        </div>
                       
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>