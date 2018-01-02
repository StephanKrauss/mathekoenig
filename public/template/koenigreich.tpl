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
        <div class="col-lg-2 hidden-md hidden-xs hidden-sm">
            <a href="https://github.com/StephanKrauss/mathekoenig" target="_blank">
                <img src="/images/github.png">
            </a>
            <p>
                <br><br>
                Danke an: <br>
                <a href="https://pixabay.com/de/users/GraphicMama-team-2641041/" target="_blank">Team GraphicMama</a>

                <p>Mathekönig ist ein Projekt des:<br>
                "Förderverein der Oberschule Bergstadt Schneeberg"</p>
            </p>

            <table class="table table-striped table-bordered  hidden-xs mark">
               <thead>
                   <td> <b>Königreiche</b> </td>
               </thead>
               <tbody>
                   {% for zeile in koenigreich %}
                       <tr>
                           <td> {{zeile.koenigreich}} </td>
                       </tr>
                   {% endfor %}
               </tbody>
           </table>
        </div>
</div>