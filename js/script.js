$(document).ready(function() {

    setTimeout(function(){
        $('body').addClass('loaded');
    }, 500);

    var images = ['bg13.jpg','bg14.jpg','bg15.jpg','bg16.jpg','bg17.jpg','bg18.jpg','bg19.jpg','bg20.jpg','bg21.jpg','bg22.jpg','bg23.jpg'];
    $('header').css({'background-image': 'url(/Design/wp-content/themes/webDev_Theme/img/' + images[Math.floor(Math.random() * images.length)] + ')'});
 
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        if (scroll >= 10) {
            $("body").addClass("lock");
        } else {
            $("body").removeClass("lock");
        }
    });

    $('.back-to__top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
});

$(window).load(function() {

    function layoutGrid() {
        $('.post-grid').packery({
            itemSelector: '.post-unit',
            gutter: 0,
            stamp: '.stamp'
        });
    }

    // filter
    $('.filter-item:not([data-filter=all])').live("click",function(){
    
    var dataFilter = $(this).attr('data-filter');
    	$('.post-unit').removeClass('active')
    	$('.post-unit[data-filter*='+dataFilter+']').addClass('active');

        layoutGrid();
	});

    //show all
    $('[data-filter=all]').live("click",function(){
	   	$('.post-unit').removeClass('active')
    	$('.post-unit').addClass('active');

        layoutGrid();
	});

    layoutGrid();
});