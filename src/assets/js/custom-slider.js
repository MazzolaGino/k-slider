$(document).ready(function () {



    $(".slider").each(function(index){
        
        var id = $(this).attr('id');

        $('#' + id).slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true,
            draggable: false,
            prevArrow: $('#prev-' + id),
            nextArrow: $('#next-' + id)
    
        });

    }) 

    // Créer un élément div pour la lightbox
    var lightbox = $('<div>').addClass('lightbox').appendTo('body');

    // Créer un élément img pour afficher l'image
    var img = $('<img>').addClass('lightbox-img').appendTo(lightbox);

    // Cacher la lightbox par défaut
    lightbox.hide();

    // Lorsque l'utilisateur clique sur une image, afficher la lightbox
    $('.slider img').click(function () {
        var src = $(this).attr('src');
        img.attr('src', src);
        lightbox.fadeIn();
    });

    // Lorsque l'utilisateur clique sur une image, afficher la lightbox
    $('img.lightbox-trigger ').click(function () {
        var src = $(this).attr('src');
        img.attr('src', src);
        lightbox.fadeIn();
    });


    

    // Lorsque l'utilisateur clique sur la lightbox, la cacher
    lightbox.click(function () {
        lightbox.fadeOut();
    });
}); 