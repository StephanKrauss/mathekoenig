var anmelden = function()
{
    var benutzername = '';
    var passwort = '';

    function anmeldenUser() {
        var vorhanden =  $('input[name="vorhanden"]');
        var vorhandenValue = vorhanden.filter(':checked').val();

        var geschlecht =  $('input[name="geschlecht"]');
        var geschlechtValue = geschlecht.filter(':checked').val();

        $("#serverInfo").html('');

        $.ajax({
            url: '/anmelden/login',
            method: 'POST',
            dataType: 'json',
            data: {
                benutzername: benutzername,
                passwort: passwort,
                vorhanden: vorhandenValue,
                geschlecht: geschlechtValue
            },
            success: function(request)
            {
                if(request.success == false){
                    Cookies.remove('benutzerId');
                    $("#serverInfo").html(request.info);
                }
                else{
                    Cookies.set('benutzerId', request.benutzerId, { expires: 365, path: '/' });
                    window.location.href = '/uebersicht/';
                }
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