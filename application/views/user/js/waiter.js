$(document).ready(function () {
    var base_url = "<?= base_url() ?>";
    $('#pending').dataTable({});

    $('.serve').on('click', function () {
        window.location.href = '?id_pemesanan-menu='+$(this).closest('tr').find('.near').text();
    });

    $('#pesanMenu').submit(function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);

        $.ajax({
            contentType: false,
            url: base_url+'user_request/pesan_menu',
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
                        window.location.href = base_url+'user_view/waiter';
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

    // PR
    $('#pesanMenu-pr').submit(function (e) {
        e.preventDefault();
        var val = [];
        $(':checkbox:checked').each(function (i) {
            var check = $(this).val();
            val[i] = [];
            val[i][0] = check;
            val[i][1] = $(this).closest('div').find('input:last-child').val();
        });
        $.ajax({
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8;',
            url: base_url+'user_request/serve',
            method: 'post',
            cache: false,
            data: {serve:val, id_pemesanan:""},
            success: function (res)
            {
                console.log(res);
            },
            error: function ()
            {
                console.log('error');
            }
        });
    });
});