// Add your custom JS here.


// custom function for switching image and content on product information
(function($) {

    $(document).ready(function($){

        $('.product-info-tab').click( function(e) {
            e.preventDefault();
            let parentGroupNumber = $(this).closest('#product-info').data('group'); // "group" is the number of the group - set as data-group attrubute in the HTML
            let clickedLink = $(this).data('link'); // "link" is the number of the tab - set as data-link attrubute in the HTML
            let activeLink = $('.group-' + parentGroupNumber + ' .product-info-tab.active').data('link');
            if ( clickedLink !== activeLink ) {
                // swap images
                $('.group-' + parentGroupNumber + ' .image-' + clickedLink).toggleClass('d-none');
                $('.group-' + parentGroupNumber + ' .image-'+activeLink).toggleClass('d-none');

                // swap content
                $('.group-' + parentGroupNumber + ' .content-'+clickedLink).toggleClass('d-none');
                $('.group-' + parentGroupNumber + ' .content-'+activeLink).toggleClass('d-none');
                
                // add/remove active class
                $('.group-' + parentGroupNumber + ' .product-info-tab.active').removeClass('active');
                $(this).addClass('active');
            }
        })
    });

})( jQuery );

(function($) {

    //* Make sure JS is enabled
    document.documentElement.className = "js";

    $(document).ready( function() {

        //* Run 0.25 seconds after document ready for any instances viewable on load
        setTimeout( function() {
            animateObject();
        }, 250);

    });

    $(window).scroll( function() {

        //* Run on scroll
        animateObject();

    });

    function animateObject() {

        //* Define your object via class
        var object = $( '.fadeup-effect' );

        //* Loop through each object in the array
        $.each( object, function() {

            var windowHeight = $(window).height(),
                offset 		 = $(this).offset().top,
                top			 = offset - $(document).scrollTop(),
                percent 	 = Math.floor( top / windowHeight * 100 );


            if ( percent < 80 ) {

                $(this).addClass( 'fadeInUp' );

            }
        });
    }

})(jQuery);