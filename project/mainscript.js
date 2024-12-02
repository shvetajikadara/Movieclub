$(document).ready(function() {

    $('.card').hover(
        function() {
            $(this).find('.cardimg').css('opacity', '0.6');
            $(this).find('.btnbooking').fadeIn();
            // $(this).find('.btnbooking').show(); // Show the button on hover
        },
        function() {
            $(this).find('.cardimg').css('opacity', '1');
            $(this).find('.btnbooking').fadeOut();
            // $(this).find('.btnbooking').hide(); // Hide the button on hover out
        }
    );
        });