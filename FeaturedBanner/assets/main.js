
function slideFeaturedBanner(el) {
    if ($(el).hasClass('active')) {
        el = $(el).next();
        if (el.length == 0) {
            el = $('.featured-banner > div:first-child');
        }
    }
    $('.featured-banner > div').removeClass('active');
    $(el).addClass('active');

    return el;
}

(function($){

    $('.featured-banner > div').click(function(e){
        clearInterval(intervalId);
        slideFeaturedBanner(this);
    });

    let startEl = $('.featured-banner > div:first-child');

    let intervalId = setInterval(function(){
        if ($(window).width() < 800) return;
        if (typeof el == 'undefined' || el.length == 0) el = startEl;
        el = slideFeaturedBanner(el);
    }, 5000, startEl)

})(jQuery);
