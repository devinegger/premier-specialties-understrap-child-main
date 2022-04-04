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


// Open search form on icon click 
(function($) {

    $(document).ready(function($){

        $('.search-icon').click( function() {
            $(this).toggleClass('d-none');
            $('.search-form-wrap').toggleClass('d-none');
        });

    });

})( jQuery );

// Open carousel on slide of person clicked
(function($) {
    $(document).ready(function($){
        let teamCarousel = $('#teamCarousel');
        $('.carousel-opener').click( function() {
            let slide = $(this).data('bs-slide-to');
            teamCarousel.carousel(slide);
        });
    });
})( jQuery );


// Normalize height of all carousel items in client quotes
(function($) {
    $(document).ready(function($){

        var items = $('#quoteCarousel .carousel-item'), //grab all slides
            heights = [], //create empty array to store height values
            tallest; //create variable to make note of the tallest slide
        
        if (items.length) {
            function normalizeHeights() {
                items.each(function() { //add heights to array
                    heights.push($(this).height()); 
                });
                tallest = Math.max.apply(null, heights); //cache largest value
                items.each(function() {
                    $(this).css('min-height',tallest + 'px');
                });
            };
            normalizeHeights();
        
            $(window).on('resize orientationchange', function () {
                tallest = 0, heights.length = 0; //reset vars
                items.each(function() {
                    $(this).css('min-height','0'); //reset min-height
                }); 
                normalizeHeights(); //run it again 
            });
        }

    });
})( jQuery );


// move navigation icons to the left if login button exists
(function($) {
    $(document).ready(function($){
        if( $('.login-btn').length ) {
            $('.nav-icons').addClass('move-left');
        }
    });
})( jQuery );


// allow for product template quanity input to update add to cart url to include quantity
(function($) {
    $(document).ready(function($){
        $('.add-to-cart').click(function(e) {
            let currentLocation = window.location.href;
            let defaultValue = 1;
            let errors;
            let quantityInput = $(this).prev('.quantity-input');
            let newValue = quantityInput.val();

            if (isNaN(newValue) || newValue < 1) {
                errors = "invalid input";
            } else if (newValue > 10) {
                errors = "number must be less than 10";
            } 

            if (errors) {
                e.preventDefault();
                quantityInput.val(defaultValue);
                alert(errors);
            } else {
                let addToCartURL_str = $(this).attr("href"); // grab that button's href
                let addToCartURL = new URL(addToCartURL_str,currentLocation); // convert it to URL 
                let params = addToCartURL.searchParams; // get search parameters
                params.set('quantity', newValue); // set the quantity to new value
                addToCartURL.search = params.toString(); // set search parameters back to the URL
                let newAddToCartURL = addToCartURL.toString(); // convert URL to string
                $(this).attr("href", newAddToCartURL); // swap the button href with new URL(string)
            }
        });
    });
})( jQuery );


// adding animations - not working yet...
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