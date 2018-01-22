(function($){
    $(document).ready(function(){
        setTimeout(function(){

            var iso = new Isotope( '.grid-masonry', {
                itemSelector:'.grid-item',
                layoutMode: 'fitRows',
                getSortData: {
                    number: '.hp-number parseInt',
            },
            sortBy : 'number',
                sortAscending : false
        })

        var filterFns = {
                ium: function( itemElem ) {
                    var name = itemElem.querySelector('.name').textContent;
                    return name.match( /ium$/ );
                }
            };

            if ($('.grid-filter-wrap').hasClass('grid-masonry-filter')) {
                var filtersElem = document.querySelector('.grid-masonry-filter');
                filtersElem.addEventListener( 'click', function( event ) {
                    if ( !matchesSelector( event.target, 'span' ) ) {
                        return;
                    }
                    var filterValue = event.target.getAttribute('data-filter');
                    filterValue = filterFns[ filterValue ] || filterValue;
                    iso.arrange({ filter: filterValue });
                });
                var buttonGroups = document.querySelectorAll('.grid-masonry-filter');
                for ( var i=0, len = buttonGroups.length; i < len; i++ ) {
                    var buttonGroup = buttonGroups[i];
                    radioButtonGroup( buttonGroup );
                }
                var sortByGroup = document.querySelector('.grid-masonry-filter');
                sortByGroup.addEventListener( 'click', function( event ) {
                    if ( !matchesSelector( event.target, '.filter-item' ) ) {
                        return;
                    }
                    var sortValue = event.target.getAttribute('data-sort-value');
                    iso.arrange({ sortBy: sortValue });
                });
            }

            function radioButtonGroup( buttonGroup ) {
                buttonGroup.addEventListener( 'click', function( event ) {
                    if ( !matchesSelector( event.target, 'span' ) ) {
                        return;
                    }
                    buttonGroup.querySelector('.filter-active').classList.remove('filter-active');
                    event.target.classList.add('filter-active');
                });
            }

        }, 300);

    });
})(jQuery);