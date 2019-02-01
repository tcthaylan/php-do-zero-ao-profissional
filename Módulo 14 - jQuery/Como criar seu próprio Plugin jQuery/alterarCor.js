(function($) {

    $.fn.alterarCor = function(cor) {

        this.each(function() {

            $(this).css('color', cor);

        });

    }
    
    return this;

}(jQuery));