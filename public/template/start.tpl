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

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="/">Anmelden</a></li>
            <li><a href="/">Rechnen</a></li>
            <li><a href="/">Übersicht</a></li>
            <li><a href="/">Abmelden</a></li>
        </ul>
    </div>
</nav>

<div class="row view1">
    <div class="anzeige col-lg-12 col-md-12 col-sm-12 hidden-xs mark">
        <img src="/images/krone_mini.png">
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mark abstand">
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

<script src="/jquery/jquery-3.2.1.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/featherlight/featherlight.js" type="text/javascript" charset="utf-8"></script>
<script src="/cookie/js.cookie.js" type="text/javascript"></script>

<script src="/template/start.js" type="text/javascript"></script>
</body>
</html>