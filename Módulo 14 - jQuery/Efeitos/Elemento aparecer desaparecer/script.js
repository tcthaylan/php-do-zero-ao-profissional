$(function() {
    /* Aparecer e Desaparecer
    * toogle
    * hide
    * show
    */
    $('#button1').bind('click', function() {
        $('#div1').toggle('slow'); //fast
    });

    /* Fade
    * fadeIn
    * fadeOut
    * fadeTo('slow', 0.5);
    * fadeToggle
    */
    $('#button2').bind('click', function() {
        $('#div2').fadeToggle('slow'); //fast
    });

    /* Slide
    * slideUp
    * slideDown
    * slideToggle
    */
    $('#button3').bind('click', function() {
        $('#div3').slideToggle('slow');//fast
    });

    /* Animate 
    * start
    * complete
    * step
    * O segundo argumeto pode ser um json ou duration
    */
    $('#button4').bind('click', function() {
        $('#div4').addClass('colorAqua').animate({
            'border-radius': 500,
            'margin-top': '+=10'
        }, {
            duration: 1500,
            start: function() {
                console.log('animate iniciado');
            },
            step: function() {
                console.log('Etapa animate');
            },
            complete: function() {
                console.log('Animação completa');
                // é posivel utilizar jq aqui tbm!
            }
        });
    });
});

