<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <?= (!empty($auto['main_css'])) ? $auto['main_css'] : null ?>
</head>
<body class="bg-danger">
    
<div class="wrapper">
    <!-- SIDEBAR SECTION -->
    <section class="sidebar bg-danger text-white pb-5 shadow-sm">
        <?= (!empty($auto['sidebar'])) ? $auto['sidebar'] : null ?>
    </section>

    <!-- CONTENT SECTION -->
    <section class="content bg-white">
        <div class="container">
            <?= (!empty($content)) ? $content : null ?>
        </div>
    </section>
</div>

<?= (!empty($auto['main_js'])) ? $auto['main_js'] : null ?>

<script>
<?= (!empty($second_js)) ? $second_js : null ?>

</script>
</body>
</html>