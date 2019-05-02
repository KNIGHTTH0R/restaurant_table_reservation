<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <title>Restaurant Reservation</title>
    <?= (!empty($auto['main_css'])) ? $auto['main_css'] : null ?>

    <style>
        <?= (!empty($css_nd)) ? $css_nd : null ?>
    </style>
</head>
<body>

<div class="wrapper">
    
    <!-- NAVBAR -->
    <?= (!empty($auto['navbar'])) ? $auto['navbar'] : null ?>

    <!-- DYNAMIC CONTENT -->
    <?= (!empty($content)) ? $content : null ?>

    <!-- FOOTER -->
    <?= (!empty($auto['footer'])) ? $auto['footer'] : null ?>
</div>

<?= (!empty($auto['main_js'])) ? $auto['main_js'] : null ?>

<script>
<?= (!empty($js_nd)) ? $js_nd : null ?>

</script>
</body>
</html>