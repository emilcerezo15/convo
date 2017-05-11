<!DOCTYPE html>

<html lang="<?php echo e(config('app.locale')); ?>">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <title>Convo - <?php echo $__env->yieldContent('title'); ?></title>

    <script>

        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
             ]); ?>

    </script>

    <script src="<?php echo e(asset('/js/jquery.js')); ?>"></script>

    <script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>

    <script src="<?php echo e(asset('/js/materialize.js')); ?>"></script>

    <script src="<?php echo e(asset('/js/jquery.slimscroll.js')); ?>"></script>

    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>

    <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset('/css/materialize.css')); ?>" rel="stylesheet" />

    <script src="<?php echo e(asset('/js/socket.io.js')); ?>"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>

<body>

<input id="BASE_URL" type="hidden" value="<?php echo e(URL::to('/')); ?>"/>

<div class="container">

    <?php echo $__env->yieldContent('content'); ?>

</div>

</body>

</html>