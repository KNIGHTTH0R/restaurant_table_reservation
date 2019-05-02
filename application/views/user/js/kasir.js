$(document).ready(function () {
    var base_url = "<?= base_url() ?>";
    $('#pemesanan').dataTable({});

    $('.bayar').on('click', function () {
        window.location.href = '?id_pemesanan-bayar='+$(this).closest('tr').find('.near').text();
    });

    $('#bayar').submit(function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);

        $.ajax({
            contentType: false,
            url: base_url+'user_request/bayar',
            method: 'post',
            cache: false,
            data: data,
            processData: false,
            success: function (res)
            {
                var obj = JSON.parse(res);
                if (obj.info === true)
                {
                    Swal.fire({
                        title : 'Berhasil',
                        text : obj.message,
                        type : 'success',
                        confirmButtonText : 'Tutup'
                    });
                    setTimeout(function () {
                        window.location.href = base_url+'user_request/struk';
                    }, 1000);
                }
                else
                {
                    Swal.fire({
                        title : 'Gagal',
                        text : obj.message,
                        type : 'warning',
                        confirmButtonText : 'Tutup'
                    });
                }
            },
            error: function ()
            {
                Swal.fire({
                    title : 'Error',
                    text : 'Sistem Bermasalah, Silahkan Refresh',
                    type : 'error',
                    confirmButtonText : 'Tutup'
                });
            }
        });
    });

});