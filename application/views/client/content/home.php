<!-- DISOVER -->
<section class="discover bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="order-lg-1 order-2">
                        <h2>My Restaurant</h2>
                        <p class="lead">Langsung saja, pesan sekarang !!</p>
                        <a href="<?=base_url('client/pesan')?>" class="btn btn-primary text-white mb-4">Pesan</a>
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