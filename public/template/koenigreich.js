var koenigreich = function()
{
    // private
    function vorhandeneReiche(){
        $.ajax({
           url: '/koenigreich/reiche',
           method: 'POST',
           dataType: 'json',
           success: function(request)
           {
               $.each(request.koenigreich, function(key, value){
                   $('#reiche tr:last').after('<tr><td>' + value.koenigreich +  '</td></tr>');
               });
           }
       });
    }


    // public
    return{
        reiche: function(){
            vorhandeneReiche();
        }
    }
}();

$(document).ready(function(){
    koenigreich.reiche();
});
