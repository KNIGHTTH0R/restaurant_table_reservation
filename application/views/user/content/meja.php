<!-- BREADCUMB -->
<div class="row bg-white shadow-sm py-2">
    <div class="col-lg-12 col-sm-12">
        <div class="float-left">Meja</div>
        <div class="float-right">index</div>
    </div>
</div>

<div class="row bg-white mt-3">
    <div class="col-lg-12 col-sm-12">
        <table id="meja" class="table responsive table-striped table-hover table-bordered">
            <thead>
                <th>Kode Meja</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
            foreach ($meja as $data)
            {
                echo "<tr>";
                echo "<td class='near'>".$data['kode_meja']."</td>";
                echo "<td>".$data['status']."</td>";
                echo "<td><img src='".base_url('assets/svg/trash.svg')."' class='svg-embed del'></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row bg-light mt-3 py-4">
    <div class="col-lg-4 col-sm-4">
        <div class="card">
            <div class="card-header">
                <p class="h5">Tambah Meja Baru</p>
            </div>
            <form id="newMeja" class="card-body">
                <div class="form-group">
                    <label for="kodeMeja">Kode Meja :</label>
                    <input type="text" id="kodeMeja" name="kode_meja" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>