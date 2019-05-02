$(document).ready(function () {
    var base_url = "<?= base_url() ?>";
    var val = null;

    $('.select').on('click', function () {
        var near = $(this).closest('.select');

        $('.select').removeClass('td-active');
        near.addClass('td-active');

        val = near.text();
    });

    $('#pesan').on('click', function () {
        if (val === null)
        {
            alert('Silahkan Pilih Meja Terlebih Dahulu');
            return null;
        }

        $.ajax({
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8;',
            url: base_url+'client/new_pesanan',
            method: 'post',
            cache: false,
            data: {kode_meja:val},
            success: function (res)
            {
                var obj = JSON.parse(res);
                if (obj.info === true)
                {
                    Swal.fire({
                        'title': 'Berhasil',
                        'text': obj.message,
                        'type': 'success',
                        'confirmButtonType': 'Tutup'
                    });
                    setTimeout(function () {
                        window.location.href = base_url+'client';
                    }, 2000);
                }
                else
                {
                    Swal.fire({
                        'title': 'Gagal',
                        'text': obj.message,
                        'type': 'warning',
                        'confirmButtonType': 'Tutup'
                    });
                }
            },
            error: function ()
            {
                Swal.fire({
                    'title': 'Error',
                    'text': 'Kesalahan Sistem',
                    'type': 'error',
                    'confirmButtonType': 'Tutup'
                });
            }
        });
    });
})