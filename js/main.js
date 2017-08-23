/**
 * Created by vol4n3 on 20/06/2017.
 */
var SeeElement;
jQuery(document).ready(function () {
    "use strict";
    const $ = jQuery;
    /*NAV EFFECT-CUT*/
    const $nav_effect_cut = $('.nav-effect-cut > li');
    $nav_effect_cut.each(function () {
        let text = $(this).children().text();
        $('<div class="top"><a>' + text + '</a></div>').appendTo(this);
        $('<div class="bottom"><a>' + text + '</a></div>').appendTo(this);
    });

    SeeElement = function (query, onSee, onStopSee) {

        $(document).on('scroll', function () {
            var scrollTop = $(window).scrollTop();
            var scrollBottom = scrollTop + $(window).height();
            $(query).each(function () {
                var $el = $(this);
                var offsetTop = $el.offset().top;
                var offsetBottom = $el.height() + offsetTop;
                if (offsetTop < scrollBottom && offsetBottom > scrollTop) {
                    if (!$el.hasClass('seeMe')) {
                        $el.addClass('seeMe');
                        if (onSee) {
                            onSee($el);
                        }
                    }
                } else if ($el.hasClass('seeMe')) {
                    $el.removeClass('seeMe');
                    if (onStopSee) {
                        onStopSee($el);
                    }
                }
            });

        });
    }

});
