$(document).ready(function () {
    var base_url = "<?= base_url() ?>";

    $('#meja').DataTable({});

    $('#newMeja').submit(function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);

        $.ajax({
            contentType: false,
            url: base_url+'user_request/add_meja',
            method: 'post',
            cache: false,
            processData: false,
            data: data,
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
                        window.location.href = '';
                    }, 1000);
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

    $('.del').click(function () {
        var row = $(this).closest('tr');
        var text = row.find('.near').text();

        $.ajax({
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8;',
            url: base_url+'user_request/del_meja',
            method: 'post',
            cache: false,
            data: {kode_meja:text},
            success: function (res)
            {
                var obj = JSON.parse(res);
                if (obj.info === true)
                {
                    Swal.fire({
                        'title': 'Berhasil',
                        'text': obj.message,
                        'type': 'success'
                    });
                    setTimeout(function () {
                        window.location.href = '';
                    }, 1000);
                }
                else
                {
                    Swal.fire({
                        'title': 'Gagal',
                        'text': obj.message,
                        'type': 'warning'
                    });
                }
            },
            error: function ()
            {
                Swal.fire({
                    'title': 'Error',
                    'text': 'Kesalahan Sistem',
                    'type': 'error'
                });
            }
        });
    });
});