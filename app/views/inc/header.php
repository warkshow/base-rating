<!DOCTYPE html>
<html lang="<?php echo \warks\core\base\App::$app->getProperty('lang')['code']; ?>">

<head>
    <meta charset="utf-8">
    <?php

    use warks\core\base\View;
    use warks\core\DataBase;

    View::getMeta();


    ?>

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles/main.css">
</head>
<body class="bg-main">

<?php $this->getPart('inc/menu'); ?>

<?php new \warks\widgets\language\Language(); ?>
