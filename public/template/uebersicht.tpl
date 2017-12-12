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
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-11 col-md-offset-1 col-sm-offset-1 mark">
        &nbsp;<br>
        <p id="burgbewohner0"></p>
        <p id="burgbewohner1"></p>
        <p id="burgbewohner2"></p>
        <p id="burgbewohner3"></p>
        <p>
            <a class="btn btn-info col-lg-3 col-md-5 col-sm-5 col-xs-4 infoView" href="#" data-featherlight="#infoView1">Info</a>
        </p>
        <p class="mark">
            <img src="/images/truhe_mini.png" class="hidden-md hidden-lg">
            <img src="/images/truhe_midi.png" class="hidden-xs hidden-sm">
            <br> <br>
        </p>
        <p class="col-lg-4 col-md-3 col-sm-4 col-md-offset-1 hidden-xs mark">
            <table class="table table-striped table-bordered  hidden-xs mark">
                <thead>
                    <td> &nbsp; </td><td> &nbsp; </td><td> Goldstücke </td><td> Gruppe </td>
                </thead>
                <tbody>
                    {% for zeile in adel %}
                        <tr>
                            <td> {{zeile.maennlich}} </td>
                            <td> {{zeile.weiblich}} </td>
                            <td> {{zeile.punkte}} </td>
                            <td> {{zeile.gruppe}}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
       </p>
    </div>

    <div class="col-lg-6 hidden-md hidden-xs hidden-sm">
        &nbsp; <img src="/images/gruen_rahmen.png"> <img src="/images/koenig_rahmen.png"><br>
        &nbsp; <img src="/images/violett_rahmen.png"> <img src="/images/ritter_gruen_rahmen.png">
    </div>


</div>

<div class="lightbox col-lg-6 col-md-6 col-sm-6 col-xs-12" id="infoView1">
    <h3 class="purpur">Mathekönig</h3>
    <img class="zufall" style="float: left;">
    <p>
        Hier siehst du deinen momentanen Spielstand.<br>
        Die Bewohner der Burg werden angezeigt. Das sind der König, der Prinz und der Ritter.<br>
        Du siehst die Anzahl der Goldstücke in deinem Schatz.<br>
        Je größer dein Schatz ist, desto besser ist dein Adelstitel.<br>

        <p>
            <button class="btn btn-warning closeButton" type="submit">schliessen</button>
        </p>
    </p>
</div>

<script type="text/javascript" src="/template/uebersicht.js"></script>