function readMore() {
   
    $('#btn').click(function(e) {
        $('.desc__info').toggleClass('text-open');
        if (!$('.desc__info').hasClass('text-open')) {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
            $(this).html('Читать далее');
        }else{
            $(this).html('Свернуть');
        }
    });
}