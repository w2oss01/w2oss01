<?php 
    // if(Session::get('logged') != true){
        // header("Location: http://localhost/");
        // exit();
    // }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="1981039">
    <meta name="author" content="Thanh Le">

    <title>@yield('title')</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/w2-oss-01.css" rel="stylesheet">    
    
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/w2-oss-01.js"></script>  
    <script>
        toggleLoadingScreen(false);
    </script>
</head>



<body class="topics-listing-page" id="top"> 
    <div id="loading-div" class="d-none align-items-center justify-content-center">
        <div class="loading-text">Loading</div>
        <div id="loading-animation">
            <div class="loadingio-spinner-spinner-yc0sc2lkjq"><div class="ldio-czvls5qexpb">
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div></div>                   
        </div>
    </div> 
    <div class="toastPanel">
        <div aria-live="polite" aria-atomic="true">
            <div class="toast-container p-3">
            </div>
        </div>
    </div> 

    @if(Session::has('message'))
    @php
        $content = Session::get('message')['content'];
        $is_success = Session::get('message')['is_success'];

        echo "<script>let is_error = '!$is_success'; let content = '$content';</script>";
    @endphp

    <script>
        showToast('Thông báo', content, is_error);
    </script>

    @endif

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="bi-back"></i>
                    <span>W2-OSS-01</span>
                </a>

                {{-- <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div> --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/lophoc">Lớp học</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/hocvien">Học viên</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/monhoc">Môn học</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/dangkylophoc">Đăng ký lớp học</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/dangxuat">Đăng xuất</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12">
                        <h2 class="text-white">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </header>

        

        
        
        @yield('content')

    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <span>W2-OSS-01</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="/lophoc" class="site-footer-link">Lớp học</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="/hocvien" class="site-footer-link">Học viên</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="/monhoc" class="site-footer-link">Môn học</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="/dangkylophoc" class="site-footer-link">Đăng ký lớp học</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 305-240-9671" class="site-footer-link">
                            07650 888 79
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:vietthanh.le89@gmail.com" class="site-footer-link">
                            vietthanh.le89@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2023 W2-OSS-01. All rights reserved.
                    </p>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>