<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Kasir</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white my-3 shadow-sm">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Pesanan Belum Bayar</p>
        <table id="pemesanan" class="table table-striped table-hover table-bordered responsive">
        <thead>
                <th>Id Pemesanan</th>
                <th>Id Pelanggan</th>
                <th>Kode Meja</th>
                <th>Id Menu</th>
                <th>Id User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
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
                echo "<td class='bayar'><img src='".base_url('assets/svg/transaction.svg')."' class='svg-embed'></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($this->input->get('id_pemesanan-bayar')): ?>
<div class="bg-light my-3">
    <div class="card">
        <div class="card-header">
            Form Pembayaran Untuk Id Pelanggan : <?= $this->input->get('id_pemesanan-bayar', TRUE); ?>
        </div>
        <div class="card-body">
            <form id="bayar" class="row">
                <div class="col-lg-12">
                    <input type="number" name="id_pemesanan" class="form-control" value="<?=$this->input->get('id_pemesanan-bayar', TRUE);?>" style="visibility:hidden;">
                    <div class="form-group">
                        <label for="Menu">Menu | Harga | Total Yang Dipesan</label>
                        <select id="Menu" class="form-control">
                        <?php
                        for ($i=0; $i<1; $i++)
                        {
                            echo '<option value="'.$menu['id_menu'].'">'.$menu['nama_menu'].' | Rp.'.$menu['harga'].' | '.$menu['total'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="totalBayar">Total Bayar : </label>
                        <input type="number" id="totalBayar" name="total_bayar" class="form-control" value="<?=$menu['harga']*$menu['total']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="uangBayar">Uang Pembayaran : </label>
                        <input type="number" id="uangBayar" name="uang_bayar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>