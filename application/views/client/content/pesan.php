<section class="pesan bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 order-lg-1 order-2">
                <h3>Silahkan Pilih Meja</h3>
                <button type="button" id="pesan" class="btn btn-primary">Pilih</button>
            </div>
            <div class="col-lg-6 col-sm-12 order-lg-2 order-1">
            <table>
            <?php
            $meja = array_chunk($meja, 5);
            foreach ($meja as $row)
            {
                echo "<tr>";
                foreach ($row as $cell)
                {
                    if ($cell['status'] === 'terpakai')
                    {
                        echo "<td class='unselectable border p-4'>".$cell['kode_meja']."</td>";
                        continue;
                    }
                    echo "<td class='border p-4 select'>".$cell['kode_meja']."</td>";
                }
                echo "</tr>";
            }
            ?>
            </table>
            </div>
        </div>
    </div>
</section>