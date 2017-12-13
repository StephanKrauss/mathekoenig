var startTemplate = (
    function(){
        // private

        var faktor1 = 0;
        var faktor2 = 0;

        var ziffer1 = 0;
        var ziffer2 = 0;

        var richtig = 0;
        var falsch = 0;

        var durchlauf = 0;
        var ergebnisGerechnet = 0;
        var ergebnisAnzeige = '';

        var flagFalsch= 0;

        function erststart(){
            var min = 1;
            var max = 10;

            return Math.floor(Math.random() * (max - min)) + min;
        }

        function buttonWechsel(richtig)
        {
            var anzahl = Cookies.get('anzahl');
            var benutzerId = Cookies.get('benutzerId');

            if(parseInt(anzahl) >= 10 && parseInt(benutzerId) > 0) {
                $('#speichern').html('speichern');
                $('#speichern').on('click', function () {
                    speichern();
                });

                $('#speichern').show();
                $('#info').hide();
            }
            else if(parseInt(anzahl) >= 10){
                $('#speichern').html('anmelden');

                $('#speichern').on('click',function(){
                    window.location.href = '/anmelden/';
                });

                $('#speichern').show();
                $('#info').hide();
            }
            else{
                $('#speichern').hide();
                $('#info').show();
            }

            return;
        }

        function vergleich(ergebnisAnzeige)
        {
            // richtig gerechnet
            if(ergebnisAnzeige == ergebnisGerechnet){
                richtig++;

                $("#ergebnis").removeClass('error');

                flagFalsch = 0;
            }
            // falsch gerechnet
            else{
                richtig--;
                if(richtig < 0){
                    richtig = 0;
                }

                $("#ergebnis").addClass('error');

                $("#anzeigeX").addClass('error');
                $("#coins").addClass('error');

                setTimeout(function () {
                    $("#anzeigeX").removeClass('error');
                    $("#coins").removeClass('error');
                }, 500);

                flagFalsch = 1;

            }

            Cookies.set('anzahl', richtig, { expires: 365, path: '/' });

            anzeigeCoins();

            buttonWechsel(richtig);

            return;
        }

        function speichern()
        {
            $.ajax({
                url: '/speichern/',
                method: 'POST',
                dataType: 'json',
                data: {
                    benutzerId: Cookies.get('benutzerId'),
                    anzahl: Cookies.get('anzahl')
                },
                success: function(response)
                {
                    if(response.success == true){
                        Cookies.set('anzahl',0);
                        window.location.href = '/uebersicht/';
                    }
                }
            });
        }

        function anzeigeCoins(){
            $("#coins").html(richtig);
        }

        function rechnen(id){
            durchlauf++;

            if(durchlauf == 1){
                $("#ergebnis").html('');
                ergebnisAnzeige = id;
                $("#ergebnis").html(id);
            }
            else if(durchlauf == 2){
                ergebnisAnzeige = ergebnisAnzeige + id;
                $("#ergebnis").html(ergebnisAnzeige);

                vergleich(parseInt(ergebnisAnzeige));

                durchlauf = 0;

                setTimeout(function () {
                    $("#ergebnis").html('?');
                    neueRechnung();
                }, 500);
            }
        }

        function neueRechnung(){
            if(flagFalsch != 1){
                faktor1 = erststart();
                faktor2 = erststart();
            }

            $("#faktor1").html(faktor1);
            $("#faktor2").html(faktor2);

            ergebnisGerechnet = parseInt(faktor1) * parseInt(faktor2);

            if(ergebnisGerechnet < 10 || ergebnisGerechnet > 99)
                neueRechnung();
        }

        // public
        return{
            button: function (id) {
                rechnen(id);

                return this;
            },
            start: function()
            {
                var anzahl = Cookies.get('anzahl');
                var benutzerId = Cookies.get('benutzerId');

                // Speicher Button verstecken
                $('#speichern').hide();

                if(isNaN(anzahl))
                    richtig = 0;
                else
                    richtig = anzahl;

                anzeigeCoins();
                neueRechnung();

                return this;
            }
        }
    }
)();



$(document).ready(function(){
    startTemplate.start();

    // Ziffernblock
    $(".ziffer").on('click', function(){
        startTemplate.button(this.id);
    });
});



