<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/sweetalert2.css')?>">
    <style>
        .wrapper {
            display: flex;
            flex-direction: row;
        }
        @media (min-width: 320px) {
            .sidebar {
                width: 40vw;
            }
            .content {
                width: 60vw;
            }
        }
        @media (min-width: 480px) {
            .sidebar {
                width: 37vw;
            }
            .content {
                width: 63vw;
            }
        }
        @media (min-width: 720px) {
            .sidebar {
                width: 30vw;
            }
            .content {
                width: 70vw;
            }
        }
        @media (min-width: 1024px) {
            .sidebar {
                width: 20vw;
            }
            .content {
                width: 80vw;
            }
        }
    </style>
</head>
<body>
    
<div class="wrapper">
    <section class="sidebar bg-danger pb-5">
        <!-- PROFILE -->
        <div class="row mt-4">
            <div class="col-lg-12 col-sm-12">
                <img src="<?=base_url('assets/img/webmaster.png')?>" class="rounded d-block mx-auto w-50 img-fluid">
                <p class="lead text-white text-center">Username</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 col-sm-12">
                <a href="#" class="nav-link text-white">Dashboard</a>
            </div>
            <div class="col-lg-12 col-sm-12">
                <button data-target="#dropdown1" data-toggle="collapse" aria-controls="dropdown1" aria-expanded="false" class="btn btn-danger">Dropdown 1</button>
                <ul id="dropdown1" class="list-unstyled collapse">
                    <li class="nav-item"><a href="#" class="nav-link text-white">Child 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Child 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Child 3</a></li>
                </ul>
            </div>
            <div class="col-lg-12 col-sm-12">
                <button data-target="#dropdown2" data-toggle="collapse" aria-controls="dropdown2" aria-expanded="false" class="btn btn-danger">Dropdown 2</button>
                <ul id="dropdown2" class="container list-unstyled collapse">
                    <li class="nav-item"><a href="#" class="nav-link text-white">Child 1</a></li>
                    <li class="nav-item">
                        <button data-target="#cucu2" data-toggle="collapse" aria-controls="cucu2" aria-expanded="false" class="btn btn-danger">Child 2</button>
                        <ul id="cucu2" class="container list-unstyled collapse">
                            <li class="nav-item"><a href="#" class="nav-link text-white">Cucu 1</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">Cucu 2</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">Cucu 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Child 3</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <!-- BREADCUMB -->
            <div class="row bg-white shadow-sm py-2">
                <div class="col-lg-12 col-sm-12">
                    <div class="float-left">URL Parent Segment</div>
                    <div class="float-right">URL Child Segment</div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?=base_url('assets/js/jquery-3.3.1.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.js')?>"></script>
<script src="<?=base_url('assets/js/sweetalert2.all.js')?>"></script>
</body>
</html>