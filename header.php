<?php

$timeOfDay = time();
$dayTimeCutoff = strtotime('06:00:00');
$nightTimeCutoff = strtotime('18:00:00');

$GLOBALS['timeOfDay'] = $timeOfDay;
$GLOBALS['dayTimeCutoff'] = $dayTimeCutoff;
$GLOBALS['nightTimeCutoff'] = $nightTimeCutoff;

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="static/css/app<?= $GLOBALS['timeOfDay'] > $GLOBALS['dayTimeCutoff'] && $GLOBALS['timeOfDay'] < $GLOBALS['nightTimeCutoff'] ? '_day' : '_night'?>.css">
    <script src="static/js/app.js"></script>
    <title>Kevin Robertson Resume</title>

</head>
<body>

    <div class="container">

        <div class="header-background">
            <div class="header">
                <div class="page-date"><?= date('d/m/Y H:i:s') ?></div>
                <h1>Kevin Robertson</h1>
                <h4>Software Engineer / Machine Learning Engineer</h4>

            </div>
        </div>
        <?php include('menu.php') ?>
        <div class="main-column">
