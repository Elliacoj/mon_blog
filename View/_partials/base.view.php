<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<?php
    if(isset($_SESSION['id'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/View/_partials/menuLog.view.php";
    }
    else {
        include $_SERVER['DOCUMENT_ROOT'] . "/View/_partials/menuUnlog.view.php";
    }
?>
    <?= $html ?>

    <script src="/assets/js/script.js"></script>
</body>
</html>

