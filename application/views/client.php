<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/sweetalert2.css')?>">
    <style>
        body {
            padding-top: 65px;
        }
        section {
            padding: 40px 0;
        }
        .svg-embed {
            width: 1em;
            height: 1em;
            font-size: 25px;
        }
    </style>
</head>
<body>
    
<div class="wrapper">
    <!-- NAVBAR -->
    <div class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="navbar-brand">
            <p class="h4">Restarurant Brand</p>
        </div>
        <button type="button" data-target="#navTog" data-toggle="collapse" aria-controls="navTog" aria-expanded="false" class="navbar-toggler"><img src="<?=base_url('assets/svg/list.svg')?>" class="svg-embed"></button>
        <div id="navTog" class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="#" class="nav-link text-dark">Page 1</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-dark">Page 2</a></li>
            </ul>
            <div class="navbar-text">
                <a href="#" class="btn btn-sm btn-primary text-white">Login</a>
            </div>
        </div>
    </div>
    <!-- DISOVER -->
    <section class="discover bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="order-lg-1 order-2">
                        <h2>My Restaurant</h2>
                        <p class="lead">Langsung saja, pesan sekarang !!</p>
                        <button class="btn btn-primary text-white mb-4">Pesan</button>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                     <div class="order-lg-2 order-1">
                        <img src="<?=base_url('assets/img/banner.jpg')?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SPOT -->
    <section class="spot bg-white">
        <div class="container">
            <p class="h3">SPOT</p>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot0.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 0</p>
                    <p class="text-muted">Description for Spot 0</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot0.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 0</p>
                    <p class="text-muted">Description for Spot 0</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot0.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 0</p>
                    <p class="text-muted">Description for Spot 0</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot1.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 1</p>
                    <p class="text-muted">Description for Spot 1</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot1.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 1</p>
                    <p class="text-muted">Description for Spot 1</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <img src="<?=base_url('assets/img/spot1.jpg')?>" class="img-fluid">
                    <p class="h6">Spot 1</p>
                    <p class="text-muted">Description for Spot 1</p>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU -->
    <section class="menu bg-light">
        <div class="container">
            <p class="h3">MENU</p>
            <div class="row">
            <?php
            for ($i=0; $i<6; $i++) {
                echo '
                <div class="col-lg-4 mb-3">
                <img src="'.base_url('assets/img/menu0.jpg').'" class="img-fluid">
                <p class="h6">Menu 0</p>
                <p class="text-muted">Description for Menu 0</p>
                </div>
                ';
            }
            ?>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <section class="footer bg-white">
        <div class="container">
            <!-- QUOTE -->
            <div class="row mb-2">
                <div class="col-lg-8 col-sm-12">
                    <p class="h4">Thanks For All, Please Give Me High Rate</p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <blockquote class="blockquote-footer">
                        <img src="<?=base_url('assets/svg/heart.svg')?>" class="svg-embed">
                        I Love You
                    </blockquote>
                </div>
            </div>
            <!-- PAGE -->
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <p class="h5">Pages</p>
                    <ul class="list-unstyled">
                        <li class=""><a class="text-muted">Page 1</a></li>
                        <li class=""><a class="text-muted">Page 2</a></li>
                        <li class=""><a class="text-muted">Page 3</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <p class="h5">Community</p>
                    <ul class="list-unstyled">
                        <li class=""><a class="text-muted">Blog</a></li>
                        <li class=""><a class="text-muted">Newsroom</a></li>
                        <li class=""><a class="text-muted">Forum</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <p class="h5">Contact</p>
                    <ul class="list-unstyled">
                        <li class=""><a class="text-muted">HP : 081285091879</a></li>
                        <li class=""><a class="text-muted">Gmail : rafifmreswara@gmail.com</a></li>
                        <li class=""><a class="text-muted">IG : @muliareswara</a></li>
                        <li class=""><a class="text-muted">FB : Rafif Mulia Reswara</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- COPYRIGHT -->
    <footer class="copyright bg-dark text-white text-center">
        &copy; Copyright My Restaurant Reservation 2019
    </footer>
</div>

<script src="<?=base_url('assets/js/jquery-3.3.1.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.js')?>"></script>
<script src="<?=base_url('assets/js/sweetalert2.all.js')?>"></script>
</body>
</html>