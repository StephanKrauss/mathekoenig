<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="" />

    <title>Mathekönig, das kleine Ein mal Eins</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Featherlight -->
    <link type="text/css" rel="stylesheet" href="/featherlight/featherlight.min.css" />

    <!-- eigene CSS -->
    <link href="/bootstrap/css/main.css" rel="stylesheet">
</head>
<body>

<div class="row view1">
    <div class="anzeige col-lg-11 col-md-11 col-sm-11 hidden-xs col-md-offset-1 col-sm-offset-1 mark">
        <img src="/images/krone_mini.png">
    </div>
    <div class="col-lg11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 mark abstand">
        <span>&nbsp;</span>
        <span class="anzeige" id="faktor1">  </span>
        <span class="anzeige"> * </span>
        <span class="anzeige" id="faktor2">  </span>
        <span class="anzeige"> = </span>
        <span class="anzeige" id="ergebnis"> ? </span>
    </div>
</div>

<div class="row view1">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-md-offset-1 col-sm-offset-1">
        <img src="/images/7-64.gif" class="ziffer" id="7">
        <img src="/images/8-64.gif" class="ziffer" id="8">
        <img src="/images/9-64.gif" class="ziffer" id="9"> <br>

        <img src="/images/4-64.gif" class="ziffer" id="4">
        <img src="/images/5-64.gif" class="ziffer" id="5">
        <img src="/images/6-64.gif" class="ziffer" id="6"> <br>

        <img src="/images/1-64.gif" class="ziffer" id="1">
        <img src="/images/2-64.gif" class="ziffer" id="2">
        <img src="/images/3-64.gif" class="ziffer" id="3"> <br>

        <img src="/images/0-64.gif" class="ziffer" id="0">
        <img src="/images/coin.png">
        <span id="coins" class="anzeige">0</span><span class="anzeige" id="anzeigeX">x</span> <br>

        <a class="btn btn-success col-md-7 col-sm-7 col-xs-7 col-lg-7"  id="speichern1">weiter</a>
        <a class="btn btn-info col-md-4 col-sm-4 col-xs-4 col-lg-4 infoView" href="#" data-featherlight="#infoView1">Info</a>
    </div>
</div>

<div class="lightbox col-lg-6 col-md-6 col-sm-6 col-xs-12" id="infoView1">
    <h3 class="purpur">Mathekönig</h3>
    <img class="zufall" style="float: left;">
    <p>
        Jede richtig gelöste Aufgabe bringt dir ein Goldstück.
        Ab 10 Goldstücke kannst du deine Goldstücke zu deinem Schatz hinzufügen.
        <p>
            <button class="btn btn-warning closeButton" type="submit">schliessen</button>
        </p>
    </p>
</div>

<div class="row view2">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-md-offset-1 col-sm-offset-1">
        <img src="/images/coin.png" id="speichern2"> <br>
        <a class="btn btn-info col-md-4 col-sm-4 col-xs-4 col-lg-4 infoView" href="#" data-featherlight="#infoView2" onload="function(){alert('Load')}">Info</a>
    </div>
</div>

<div class="lightbox col-lg-6 col-md-6 col-sm-6 col-xs-12" id="infoView2">
    <h3 class="purpur">Mathekönig</h3>
    <img class="zufall" style="float: left;">
    <p>
        Bitte melde dich mit Benutzernamen und Passwort an. Hast du noch keinen Goldschatz angelegt,
        so gib einfach einen Spielernamen und ein Passwort ein. Merke dir <u>unbedingt</u> deinen
        Spielernamen und dein Passwort.
        <p>
            <button class="btn btn-warning closeButton" type="submit">schliessen</button>
        </p>
    </p>
</div>

<script src="/jquery/jquery-3.2.1.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/featherlight/featherlight.js" type="text/javascript" charset="utf-8"></script>

<script src="/template/start.js" type="text/javascript"></script>
</body>
</html>