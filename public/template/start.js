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

        function erststart(){
            var min = 1;
            var max = 10;

            return Math.floor(Math.random() * (max - min)) + min;
        }

        function vergleich(ergebnisAnzeige) {
            if(ergebnisAnzeige == ergebnisGerechnet){
                richtig++;
            }
            else{
                richtig--;
                if(richtig < 0){
                    richtig = 0;
                }

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
            faktor1 = erststart();
            faktor2 = erststart();

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



