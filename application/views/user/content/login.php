<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/sweetalert2.css')?>">
    <style>
        @media (min-width: 320px) {
            
        }
        @media (min-width: 480px) {
            
        }
        @media (min-width: 720px) {
            
        }
        @media (min-width: 1024px) {
            
        }
    </style>
</head>
<body class="bg-danger">
    
<div class="container">
    <div class="row mt-5 pt-5">
        <div class="col-lg-4 col-sm-4">
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="card">
                <div class="card-header bg-danger text-center text-white">Form Login</div>
                <form id="frmLogin" class="card-body">
                    <div class="form-group">
                        <label for="username">Username : </label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" id="btnLogin" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
        </div>
    </div>
</div>

<script src="<?=base_url('assets/js/jquery-3.3.1.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.js')?>"></script>
<script src="<?=base_url('assets/js/sweetalert2.all.js')?>"></script>
<script type="text/javascript">
var base_url = "<?= base_url() ?>";
$(document).ready(function () {
    $('#frmLogin').submit(function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);

        $.ajax({
            contentType: false,
            url: base_url+'user/auth_login',
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
                        'title': 'success',
                        'text': obj.message,
                        'type': 'success'
                    });
                    setTimeout(function () {
                        window.location.href = base_url+'user_view';
                    }, 2000);
                }
                else
                {
                    Swal.fire({
                        'title': 'warning',
                        'text': obj.message,
                        'type': 'warning'
                    });
                }
            },
            error: function (res)
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
</script>
</body>
</html>