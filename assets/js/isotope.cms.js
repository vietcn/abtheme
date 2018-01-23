(function($){
    $(document).ready(function(){

        $('.cms-grid-masonry').each(function() {
            var iso = new Isotope(this, {
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                },
                containerStyle: null,
            })

            var filtersElem = $(this).parent().find('.grid-filter-wrap');
            filtersElem.on( 'click', function( event ) {
                var filterValue = event.target.getAttribute('data-filter');
                iso.arrange({ filter: filterValue });
            });

            var filterItem = $(this).parent().find('.filter-item');
            filterItem.on('click',function(e){
                filterItem.removeClass('active');
                $(this).addClass('active');
            });

        });

    });
})(jQuery);