var sectionArray = [1, 2, 3, 4, 5];

$.each(sectionArray, function(index, value){
    
    (function(value) { // Create closure to preserve value
        
        $(document).scroll(function(){
            var offsetSection = $('#' + 'section_' + value).offset();
            if (offsetSection) {
                var offsetTop = offsetSection.top - 154;
                var docScroll = $(document).scrollTop();
                var docScroll1 = docScroll + 1;

                if ( docScroll1 >= offsetTop ){
                    $('.navbar-nav .nav-link').removeClass('active');
                    $('.navbar-nav .nav-link:link').addClass('inactive');  
                    $('.navbar-nav .nav-item .nav-link').eq(index).addClass('active');
                    $('.navbar-nav .nav-item .nav-link').eq(index).removeClass('inactive');
                }
            }
        });

        $('.click-scroll').eq(index).click(function(e){
            var offsetClick = $('#' + 'section_' + value).offset();
            if (offsetClick) {
                var offsetTop = offsetClick.top - 154;
                e.preventDefault();
                $('html, body').animate({
                    'scrollTop': offsetTop
                }, 300);
            }
        });
        
    })(value); // Pass value to closure
    
});

$(document).ready(function(){
    $('.navbar-nav .nav-item .nav-link:link').addClass('inactive');    
    $('.navbar-nav .nav-item .nav-link').eq(0).addClass('active');
    $('.navbar-nav .nav-item .nav-link:link').eq(0).removeClass('inactive');
});
