<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

    <body>

        <div class="tm-header">
            <div class="container-fluid">
                <div class="tm-header-inner">
                    <a href="{{ route('home') }}" class="navbar-brand tm-site-name">Classic</a>

                    <!-- navbar -->
                    <nav class="navbar tm-main-nav">

                        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                            &#9776;
                        </button>

                        <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>

                    </nav>

                </div>
            </div>
        </div>

        @yield('content')



        <footer class="tm-footer">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="tm-footer-content-box">
                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">Proin eu posuere felis</h3>
                            <div class="tm-gray-bg">
                                <p>Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.</p>
                                <p>Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.</p>
                                <p><strong>Danny Egg (Executive)</strong></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="tm-footer-content-box tm-footer-links-container">

                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">Nulla tortor dolor</h3>
                            <nav>
                                <ul class="nav">
                                    <li><a href="#" class="tm-footer-link">Tincidunt non faucibus</a></li>
                                    <li><a href="#" class="tm-footer-link">Vestibulum tempor</a></li>
                                    <li><a href="#" class="tm-footer-link">Fusce non turpis euismod</a></li>
                                    <li><a href="#" class="tm-footer-link">Lorem ipsum dolor sit</a></li>
                                    <li><a href="#" class="tm-footer-link">Nam in augue consectetur</a></li>
                                    <li><a href="#" class="tm-footer-link">Text Link Color #CCCC66</a></li>
                                </ul>
                            </nav>

                        </div>

                    </div>

                    <!-- Add the extra clearfix for only the required viewport
                        http://stackoverflow.com/questions/24590222/bootstrap-3-grid-with-different-height-in-each-item-is-it-solvable-using-only
                    -->
                    <div class="clearfix hidden-lg-up"></div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="tm-footer-content-box">

                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">Etiam mollis ornare</h3>
                            <p class="tm-margin-b-30">Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.</p><hr class="tm-margin-b-30">
                            <p class="tm-margin-b-30">Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.</p><hr class="tm-margin-b-30">
                            <p class="tm-margin-b-30">Aenean cursus tellus mauris, quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.</p>
                            <a href="#" class="tm-btn tm-btn-gray text-uppercase">Read More</a>

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="tm-footer-content-box">

                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">Fusce non turpis</h3>
                            <div class="tm-margin-b-30">
                                <img src="img/tm-img-100x100-1.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-2.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-3.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-4.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-5.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-6.jpg" alt="Image" class="tm-footer-thumbnail">
                            </div>
                            <p class="tm-margin-b-20">Curabitur dui massa, aliquam quis mi sed, tempor vulputate tellus. Sed vestibulum non neque.</p>
                            <a href="#" class="tm-btn tm-btn-gray text-uppercase">Browse</a>

                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-xs-12 tm-copyright-col">
                        <p class="tm-copyright-text">Copyright 2016 Your Company Name</p>
                    </div>
                </div>
            </div>
        </footer>
        @flasher_render
        <!-- load JS files -->
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
