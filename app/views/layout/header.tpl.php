<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BewVeD</title>
    <style>
        <?php include __DIR__ . '/../../../public/assets/css/style.css' ?>
    </style>
    <link rel="stylesheet" href="./public/assets/css/style.css">
</head>
<body>
    
<header>

<?php d(get_defined_vars()); 
    //   d($_SESSION);?>

<?php
// On inclut des sous-vues => "partials"
include __DIR__ . '/../partials/nav.tpl.php';
?>

</header>