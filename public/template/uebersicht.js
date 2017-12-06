var uebersicht = function(){
    // private
    function spielstand(benutzerId)
    {
        $.ajax({
            url: '/spielstand/',
            method: 'POST',
            dataType: 'json',
            data: {
                benutzerId: benutzerId
            },
            success: function(request)
            {
                $.each(request.burgbewohner, function(key, value){
                    $("#burgbewohner" + key).html(value.adel + "  " + value.benutzername + "  , " + value.schatz + "  Goldstücke");
                });
            }
        });

    }

    // public
    return{
        start: function(){
            var benutzerId = Cookies.get('benutzerId');
            benutzerId = parseInt(benutzerId);

            if(typeof(benutzerId) == 'undefined')
                return;

            if(isNaN(benutzerId))
                return;

            spielstand(benutzerId);
        }
    }
}();

// Steuerung
$(document).ready(function(){
    uebersicht.start();
});