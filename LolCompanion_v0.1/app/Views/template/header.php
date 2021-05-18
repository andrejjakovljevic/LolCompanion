<!DOCTYPE html>
<html>
    <head>
        <!--Autor: Dragan Milovancevic 18/0153-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href=" <?= base_url('stil.css')?>">
        <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
        <title>LolCompanion</title>
    </head>
    <body>
        <div class="container-fluid font text-center">
            <div class="row header">
                <div class="col-lg-3">
                    <img src=" <?= base_url('slike/lolporo.png')?>" style="width: 20%;">
                    <a href="<?= site_url("Guest") ?>" class="basic">LoLCompanion</a>
                </div>
                <div class="col-lg-6 header">
                    &nbsp;
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="<?= site_url("Guest/Champions") ?>" class="basic">Champions</a>  
                </div>
                <div class="col-lg-1">
                    &nbsp;
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="<?= site_url("Guest/Login") ?>" class="basic">Login</a>
                </div>
            </div>