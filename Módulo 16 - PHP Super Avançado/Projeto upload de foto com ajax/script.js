$(function() {

    // Upload de foto com ajax
    $('#form-foto').on('submit', function(e) {
        e.preventDefault();

        //var form = document.getElementById('#form');
        var form = $('#form-foto')[0];
        var data = new FormData(form);

        $.ajax({
            type: 'POST',
            url: 'recebedor.php',
            data: data,
            contentType: false,
            processData: false,
            success: function(msg) {
                alert(msg);
            }
        });

    });

    /*
        Envio sem formulário 
        $('button').on('click', function() {
            var data = new FormData();

            var arquivos = $('#foto')[0].files;

            if (arquivos.length > 0) {
                
                data.append('nome', $('#nome').val());
                data.append('foto', arquivos[0]);

                $.ajax({
                    type: 'POST',
                    url: 'recebedor.php',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(msg) {
                        alert(msg);
                    }
                });
            }
        }); 
*/