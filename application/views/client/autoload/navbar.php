<!-- NAVBAR -->
<div class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm">
    <div class="navbar-brand">
        <a href="#home" class="h4 text-dark">Restaurant Reservation</a>
    </div>
    <button type="button" data-target="#navTog" data-toggle="collapse" aria-controls="navTog" aria-expanded="false" class="navbar-toggler">
        <img src="<?=base_url('assets/svg/list.svg')?>" alt="menu" class="svg-embed">
    </button>
    <div id="navTog" class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="<?=base_url('client/pesan')?>" class="nav-link text-dark">Pesan</a></li>
            <li class="nav-item"><a href="#2" class="nav-link text-dark">Page 2</a></li>
            <li class="nav-item"><a href="#3" class="nav-link text-dark">Page 3</a></li>
        </ul>
        <div class="navbar-text">
            <a href="<?=base_url('user')?>" class="btn btn-primary btn-sm text-white">Login</a>
        </div>
    </div>
</div>
