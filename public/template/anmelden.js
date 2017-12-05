var anmelden = function(){
    // private
    var userId = 0;
    var titelId = 0;
    var titelBezeichnung = '';
    var schatz = 0;

    var benutzername = '';
    var passwort = ''

    function anmeldenUser() {
        $.ajax({
            url: '/anmelden/login',
            method: 'POST',
            dataType: 'json',
            data: {
                benutzername: benutzername,
                passwort: passwort
            },
            success: function(request){
                alert(request.titelName);
            }
        });
    }

    function benutzernamePasswort()
    {
        var kontrolle = 0;

        benutzername = '';
        passwort = '';

        benutzername = $("#benutzername").val();
        passwort = $("#passwort").val();

        if(benutzername.length < 8){
            kontrolle++;
            $("#benutzername").css({ "border": '#FF0000 1px solid'});
        }
        else{
            $("#benutzername").css({ "border": '#d9d9d9 1px solid'});
        }

        if(passwort.length < 8){
            kontrolle++;
            $("#passwort").css({ "border": '#FF0000 1px solid'});
        }
        else{
            $("#passwort").css({ "border": '#d9d9d9 1px solid'});
        }

        return kontrolle;
    }




    // public
    return{
        anmelden: function(){
            var kontrolle = benutzernamePasswort();
            if(kontrolle > 0)
                return;

            anmeldenUser();
        }
    }
}();


$(document).ready(function () {
    $("#geschlecht").hide();

    $("input[name='vorhanden']").click(function()
    {
        if($('input:radio[name=vorhanden]:checked').val() == "1"){
            $("#geschlecht").hide();
        }
        else{
            $("#geschlecht").show();
        }
    });

    $("#anmelden").on('click', function () {
        anmelden.anmelden();
    });
});