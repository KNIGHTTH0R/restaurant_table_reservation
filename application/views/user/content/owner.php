<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Owner</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white mt-3 shadow-sm">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Lap Transaksi</p>
        <table id="lap_transaksi" class="table table-striped table-hover table-bordered responsive">
            <thead>
                <th>Id Transaksi</th>
                <th>Id Pemesanan</th>
                <th>Id User</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Kembali</th>
            </thead>
            <tbody>
            <?php
            foreach ($lap_transaksi as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['id_transaksi']."</td>";
                echo "<td>".$data['id_pemesanan']."</td>";
                echo "<td>".$data['id_user']."</td>";
                echo "<td>".$data['total_bayar']."</td>";
                echo "<td>".$data['bayar']."</td>";
                echo "<td>".$data['kembali']."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="">
            Export To <a href="<?=base_url('user_request/laporan_kasir?ext=excel')?>"><img src="<?=base_url('assets/svg/excel.svg')?>" class="svg-embed" id="export-excel"></a> OR
            Export To <a href="<?=base_url('user_request/laporan_kasir?ext=pdf')?>"><img src="<?=base_url('assets/svg/pdf.svg')?>" class="svg-embed" id="export-pdf"> </a>
        </div>
    </div>
</div>

<div class="row bg-white my-5 shadow-sm">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Lap Pemesanan</p>
        <table id="lap_pemesanan" class="table table-striped table-hover table-bordered responsive">
            <thead>
                <th>Id Pemesanan</th>
                <th>Id Pelanggan</th>
                <th>Kode Meja</th>
                <th>Id Menu</th>
                <th>Id User</th>
                <th>Total</th>
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