<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Menu</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white mt-3">
    <div class="col-lg-12 col-sm-12">
        <table id="menu" class="table responsive table-striped table-hover table-bordered">
            <thead>
                <th>Id Menu</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
            foreach ($menu as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['id_menu']."</td>";
                echo "<td>".$data['nama_menu']."</td>";
                echo "<td>".$data['harga']."</td>";
                echo "<td>
                    <img src='".base_url('assets/svg/trash.svg')."' class='svg-embed del'>
                    <img src='".base_url('assets/svg/file.svg')."' class='svg-embed edit'>
                </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row bg-light mt-3 py-4">
    <div class="col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <p class="h5">Tambah Menu Baru</p>
            </div>
            <form id="newMenu" class="card-body">
                <div class="form-group">
                    <label for="namaMenu">Nama Menu :</label>
                    <input type="text" id="namaMenu" name="nama_menu" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga :</label>
                    <input type="number" id="harga" name="harga" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>

    <div class="col-lg-4 col-sm-12">

    </div>

    <?php if ($this->input->get('edt_id_menu', TRUE)): ?>
    <div class="col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <p class="h5">Edit Menu</p>
            </div>
            <form id="editMenu" class="card-body">
                <input type="number" name="id_menu" class="form-control" value="<?=$edit_menu['id_menu']?>" required hidden>
                <div class="form-group">
                    <label for="namaMenu">Nama Menu :</label>
                    <input type="text" id="namaMenu" name="nama_menu" class="form-control" value="<?=$edit_menu['nama_menu']?>" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga :</label>
                    <input type="number" id="harga" name="harga" class="form-control" value="<?=$edit_menu['harga']?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>