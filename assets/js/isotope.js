import('jquery');

!(function($) {
    // Porfolio isotope and filter
    $(window).on('load', function() {
        $portfolioIsotope = $('.portfolio-container');
        
        if ($portfolioIsotope.length) { 
            var Isotope = require('isotope-layout');
            
            $portfolioIsotope = new Isotope('.portfolio-container', {
                itemSelector : '.portfolio-item',
            });
        
            $('#portfolio-flters li').on('click', function() {
                $("#portfolio-flters li").removeClass('filter-active');
                $(this).addClass('filter-active');
          
                $portfolioIsotope.arrange({
                  filter: $(this).data('filter')
                });
              });
          
              // Initiate venobox (lightbox feature used in portofilo)
              $(document).ready(function() {
                $('.venobox').venobox();
              });
            }
        });
})(jQuery);