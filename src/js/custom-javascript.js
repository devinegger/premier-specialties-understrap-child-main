// Add your custom JS here.


// custom function for switching image and content on product information
(function($) {

    $(document).ready(function($){

        $('.product-info-tab').click( function(e) {
            e.preventDefault();
            let clickedLink = $(this).data('link'); // "link" is just the number of the tab - set as data-link attrubute in the HTML
            let activeLink = $('.product-info-tab.active').data('link');
            if ( clickedLink !== activeLink ) {
                // swap images
                $('.image-'+clickedLink).toggleClass('d-none');
                $('.image-'+activeLink).toggleClass('d-none');

                // swap content
                $('.content-'+clickedLink).toggleClass('d-none');
                $('.content-'+activeLink).toggleClass('d-none');
                
                // add/remove active class
                $('.product-info-tab.active').removeClass('active');
                $(this).addClass('active');
            }
        })
    });

})( jQuery );