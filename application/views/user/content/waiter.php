<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Waiter</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white mt-3">
    <div class="col-lg-12 col-sm-12">
        <p class="h5">Pesanan Pending</p>
        <table id="pending" class="table table-striped table-hover table-bordered responsive">
            <thead>
                <th>Id Pemesanan</th>
                <th>Kode Meja</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
            foreach ($pemesanan as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['id_pemesanan']."</td>";
                echo "<td>".$data['kode_meja']."</td>";
                echo "<td>".$data['status']."</td>";
                echo "<td>
                    <img src='".base_url('assets/svg/menu.svg')."' class='svg-embed serve'>
                </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($this->input->get('id_pemesanan-menu')): ?>
<div class="bg-light my-3">
    <div class="card">
        <div class="card-header">
            Form Pesan Menu Untuk Id Pelanggan : <?= $this->input->get('id_pemesanan-menu', TRUE); ?>
        </div>
        <div class="card-body">
            <form id="pesanMenu" class="row">
                <div class="col-lg-12">
                    <input type="number" name="id_pemesanan" class="form-control" value="<?=$this->input->get('id_pemesanan-menu', TRUE);?>" style="visibility:hidden;">
                    <div class="form-group">
                        <label for="Menu">Menu : </label>
                        <select name="menu" id="Menu" class="form-control">
                        <?php
                        foreach ($menu as $data)
                        {
                            echo '<option value="'.$data['id_menu'].'">'.$data['nama_menu'].' | Rp.'.$data['harga'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah : </label>
                        <input type="number" id="Jumlah" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan : </label>
                        <input type="text" id="namaPelanggan" name="nama_pelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="JenisKelamin">Jenis Kelamin : </label>
                        <select id="JenisKelamin" name="jenis_kelamin" class="form-control">
                            <option>laki-laki</option>
                            <option>perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NoHp">No Hp : </label>
                        <input type="number" id="NoHp" name="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat : </label>
                        <input type="text" id="Alamat" name="alamat" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- PR -->
<?php if ($this->input->get('id_pemesanan-menu-pr')): ?>
<div class="bg-light my-3">
    <div class="card">
        <div class="card-header">
            Form Pesan Menu Untuk Id Pelanggan : <?= $this->input->get('id_pemesanan-menu', TRUE); ?>
        </div>
        <div class="card-body">
            <form id="pesanMenu-pr" class="row">
                <?php 
                $menu = array_chunk($menu, 6);
                $i = 1;
                foreach ($menu as $row):
                    foreach ($row as $cell):
                ?>
                <div class="col-lg-2 col-sm-2">
                    <div class="custom-control custom-checkbox d-inline">
                        <input type="checkbox" class="custom-control-input" name="menu[]" id="Menu<?=$i?>" value="<?= $cell['id_menu'] ?>" onclick="var input = $('#Jumlah<?=$i?>'); if(this.checked){input.removeAttr('disabled'); input.focus();}else{input.attr('disabled', '');}">
                        <label for="Menu<?=$i?>" class="custom-control-label"><?= $cell['nama_menu'].' | Rp.'.$cell['harga'] ?></label>
                        <input type="number" id="Jumlah<?=$i?>" class="form-control" name="jumlah[]" placeholder="jumlah" disabled="true">
                    </div>
                </div>
                <?php
                        $i++;
                    endforeach;
                endforeach;
                ?>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary float-right">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>