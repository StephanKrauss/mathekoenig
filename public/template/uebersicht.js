var uebersicht = function(){
    // private
    function spielstand()
    {


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

            spielstand();
        }
    }
}();

// Steuerung
$(document).ready(function(){
    uebersicht.start();
});