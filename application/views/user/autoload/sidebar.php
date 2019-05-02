        <!-- PROFILE -->
        <div class="row mt-4">
            <div class="col-lg-12 col-sm-12">
                <img src="<?=base_url('assets/img/webmaster.png')?>" class="rounded d-block mx-auto w-50 img-fluid">
                <p class="mt-2 text-white text-center"><?= $this->session->username ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user_view/')?>" class="nav-link text-white">Dashboard</a>
            </div>

            <?php if ($this->session->level === 'administrator'): ?>
            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user_view/meja')?>" class="nav-link text-white">Meja</a>
            </div>
            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user_view/menu')?>" class="nav-link text-white">Menu</a>
            </div>
            <?php endif; ?>

            <?php if ($this->session->level === 'waiter'): ?>
            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user_view/data_pemesanan')?>" class="nav-link text-white">Data Pemesanan</a>
            </div>
            <?php endif; ?>

            <?php if ($this->session->level === 'kasir'): ?>
            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user_view/data_transaksi')?>" class="nav-link text-white">Data Transaksi</a>
            </div>
            <?php endif; ?>

            <div class="col-lg-12 col-sm-12">
                <a href="<?=base_url('user/logout')?>" class="nav-link text-white">Logout</a>
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