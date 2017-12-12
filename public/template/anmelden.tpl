<div class="row view1">
    <div class="anzeige col-lg-12 col-md-12 col-sm-12 hidden-xs mark">
        <img src="/images/krone_mini.png">
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-11 col-md-offset-1 col-sm-offset-1 abstand">
        &nbsp;
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-11 col-md-offset-1 col-sm-offset-1 mark">

        &nbsp; <br>
        Hast du ein Spielkonto ? <br>
        Nein <input value="0" name="vorhanden" type="radio">
        Ja <input value="1" name="vorhanden" type="radio" checked>
        <br>&nbsp;<br>

        Spielername: ( min. 8 Zeichen ) <br>
        <input class="" type="text" minlength="8" id="benutzername"> <br>&nbsp;<br>

        <div id="geschlecht">
            Junge <input value="1" name="geschlecht" type="radio">
            Mädchen <input value="2" checked="checked" name="geschlecht" type="radio"> <br>&nbsp;<br>
        </div>

        Passwort: ( min. 8 Zeichen ) <br>
        <input class="" type="password" id="passwort" minlength="8"> <br>&nbsp;<br>

        <span id="serverInfo"></span> <br><br>

        <a class="btn btn-success col-lg-3 col-md-5 col-sm-5 col-xs-4" href="#" id="anmelden">anmelden</a> <br>&nbsp;<br>

        <a class="btn btn-info col-lg-3 col-md-5 col-sm-5 col-xs-4 infoView" href="#" data-featherlight="#infoView1">Info</a>
        <p>&nbsp;</p>
    </div>
</div>

<div class="lightbox col-lg-6 col-md-6 col-sm-6 col-xs-12" id="infoView1">
    <h3 class="purpur">Mathekönig</h3>
    <img class="zufall" style="float: left;">
    <p>
        Hier kannst du dich anmelden. Gib deinen Spielernamen und dein Passwort ein.
        Wenn du noch kein Spielerkonto hasst, dann melde dich an.
        Merke dir <u>unbedingt</u> deine Anmeldedaten.
        <p>
            <button class="btn btn-warning closeButton" type="submit">schliessen</button>
        </p>
    </p>
</div>

<script type="text/javascript" src="/template/anmelden.js"></script>