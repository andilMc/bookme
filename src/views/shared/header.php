<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=title?></title>
    <link rel="shortcut icon" href="<?= base_url ?>/img/ico.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="<?= base_url ?>/css/style.css">
    <?php 
    if (isset($style)) {
        if ( is_array($style) ) {
            foreach ($style as $file) {
                ?>
                <link rel="stylesheet" href="<?= base_url ?>/css/<?=$file?>.css">
                <?php
            }
        } else {
            ?>
                <link rel="stylesheet" href="<?= base_url ?>/css/<?=$style?>.css">
                <?php
        }
        
    }
    ?>
    <style>

    </style>
    <script src="<?=base_url?>/js/Controllers/htmx.js" defer></script>
</head>

<body>
