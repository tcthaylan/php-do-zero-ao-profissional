$(function() {
    var BASE_URL = "http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%2016%20-%20PHP%20Super%20Avan%C3%A7ado/Projeto%20Popular%20Select%20a%20partir%20de%20outro/";

    $('#modulo').bind('change', function() {

        var modulo = $('#modulo').val();
        
        $.ajax({
            type: 'POST',
            data: {modulo:modulo},
            url: "http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%2016%20-%20PHP%20Super%20Avan%C3%A7ado/Projeto%20Popular%20Select%20a%20partir%20de%20outro/home/pegar_aulas",
            dataType: 'json',
            success: function(json) {
                console.log(json);
            }
        })
    })

});