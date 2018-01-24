jQuery(document).ready(function ($) {
    "use strict";
    var pageNum = [],
        total = [],
        max = [],
        perpage = [],
        nextLink = [],
        masonry = [],
        newItems = [];
    $('.cms-grid').each(function () {
        var _this = $(this);
        var html_id = _this.attr('id');
        var _variable = window["cms_load_more_" + html_id];
        if (typeof _variable !== 'undefined') {
            pageNum[html_id] = parseInt(_variable.startPage) + 1;
            total[html_id] = parseInt(_variable.total);
            max[html_id] = parseInt(_variable.maxPages);
            perpage[html_id] = parseInt(_variable.perpage);
            nextLink[html_id] = _variable.nextLink;
            masonry[html_id] = _variable.layout;

            $('#' + html_id + ' .cms-load-more').click(function () {
                //load more
                var _this_click = $(this);
                _this_click.find('i').attr('class', 'fa fa-refresh fa-spin');
                setTimeout(function () {
                    $.get(nextLink[html_id], function () {
                    })
                        .done(function (data) {
                            if (masonry[html_id] === 'masonry') {
                                var items = $(data).find('#' + html_id + ' .cms-grid-masonry > .grid-item');
                                var time = 0.4;
                                items.each(function () {
                                    $(this).addClass('cms-animated');
                                    $(this).find('.grid-item-inner').css('animation-duration', time + 's');
                                    time = time + 0.15;
                                });
                                $('#' + html_id).children('.cms-grid-masonry').append(items);
                                $.fn.cms_grid_refresh();
                                $(document).find('.filter-item.active').trigger('click');
                            }
                            pageNum[html_id]++;
                            if (pageNum[html_id] <= max[html_id]) {
                                if (nextLink[html_id].indexOf('/page/') > -1) {
                                    nextLink[html_id] = nextLink[html_id].replace(/\/page\/[0-9]?/, '/page/' + pageNum[html_id]);
                                }
                                else {
                                    nextLink[html_id] = nextLink[html_id].replace(/paged=[0-9]?/, 'paged=' + pageNum[html_id]);
                                }
                            } else {
                                _this_click.remove();
                            }
                        })
                        .always(function () {
                            _this_click.find('i').attr('class', 'fa fa-plus');
                        });
                }, 100);
            });

        }
    });
});