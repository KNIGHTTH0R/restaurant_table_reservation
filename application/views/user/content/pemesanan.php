<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Data Pemesanan</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white mt-3 shadow-sm">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Pesanan Aktif</p>
        <table id="pemesananAktif" class="table table-striped table-hover table-bordered responsive">
            <thead>
                <th>Id Pemesanan</th>
                <th>Id Pelanggan</th>
                <th>Kode Meja</th>
                <th>Id Menu</th>
                <th>Id User</th>
                <th>Total</th>
                <th>Status</th>
            </thead>
            <tbody>
            <?php
            foreach ($pemesanan as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['id_pemesanan']."</td>";
                echo "<td>".$data['id_pelanggan']."</td>";
                echo "<td>".$data['kode_meja']."</td>";
                echo "<td>".$data['id_menu']."</td>";
                echo "<td>".$data['id_user']."</td>";
                echo "<td>".$data['total']."</td>";
                echo "<td>".$data['status']."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row bg-white mt-3 mb-5 shadow-sm">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Laporan Pemesanan</p>
        <table id="lap_pemesanan" class="table table-striped table-hover table-bordered responsive">
            <thead>
                <th>Id Pemesanan</th>
                <th>Id Pelanggan</th>
                <th>Kode Meja</th>
                <th>Id Menu</th>
                <th>Id User</th>
                <th>Total</th>
                <th>Status</th>
            </thead>
            <tbody>
            <?php
            foreach ($lap_pemesanan as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['id_pemesanan']."</td>";
                echo "<td>".$data['id_pelanggan']."</td>";
                echo "<td>".$data['kode_meja']."</td>";
                echo "<td>".$data['id_menu']."</td>";
                echo "<td>".$data['id_user']."</td>";
                echo "<td>".$data['total']."</td>";
                echo "<td>".$data['status']."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="">
            Export To <a href="<?=base_url('user_request/laporan_waiter?ext=excel')?>"><img src="<?=base_url('assets/svg/excel.svg')?>" class="svg-embed" id="export-excel"></a> OR
            Export To <a href="<?=base_url('user_request/laporan_waiter?ext=pdf')?>"><img src="<?=base_url('assets/svg/pdf.svg')?>" class="svg-embed" id="export-pdf"> </a>
        </div>
    </div>
</div>