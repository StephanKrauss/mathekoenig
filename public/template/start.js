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

        function vergleich(ergebnisAnzeige) {
            if(ergebnisAnzeige == ergebnisGerechnet){
                richtig++;

                $("#ergebnis").removeClass('error');

                flagFalsch = 0;

                if(richtig > 2)
                    $('#speichern1').show();
            }
            else{
                richtig--;
                if(richtig < 0){
                    richtig = 0;
                }

                $("#ergebnis").addClass('error');

                $("#anzeigeX").addClass('error');
                $("#coins").addClass('error');

                $('#speichern1').hide();

                setTimeout(function () {
                    $("#anzeigeX").removeClass('error');
                    $("#coins").removeClass('error');
                }, 500);

                flagFalsch = 1;

            }

            anzeigeCoins();

            return;
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
            start: function(){
                $(".view2").hide();
                neueRechnung();

                return this;
            },
            noView1: function(){
                if(richtig > 0){
                    $(".view1").hide();
                    $(".view2").show();
                }
            },
            noView2: function(){
                $(".view1").show();
                $(".view2").hide();
            }
        }
    }
)();

$(".closeButton").on('click', function(){
    $('.featherlight-close').click();
});

$('#speichern1').hide();

startTemplate.start();

$(".ziffer").on('click', function(){
    startTemplate.button(this.id);
});

$("#speichern1").on('click', function(){
    startTemplate.noView1();
});

$("#speichern2").on('click', function(){
    startTemplate.noView2();
});



