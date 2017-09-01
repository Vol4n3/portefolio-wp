/**
 * Created by vol4n3 on 20/06/2017.
 */
var SeeElement;
jQuery(document).ready(function () {
    "use strict";
    const $ = jQuery;

        class HeaderTitle {
            constructor(element) {
                this.setActive($(document).scrollTop());
                this.element = element;
            }

            setActive(scrollTop) {
                this.active = scrollTop > 133 && !this.active
                    || scrollTop > 75 && this.active;
            }

            resize(scrollTop) {
                this.setActive(scrollTop);
                if (this.active) {
                    fixSize();
                    this.element.addClass('active');
                    setTimeout(fixSize, 810);
                } else {
                    fixSize();
                    this.element.removeClass('active');
                    setTimeout(fixSize, 810);
                }
            }
        }

        const ht = new HeaderTitle($('.big-title'));
        /*scroll event*/
        $(document).scroll(() => {
            let scrollTop = $(this).scrollTop();
            /*Header bar*/
            ht.resize(scrollTop);
            /*Header img effect*/
            $('.bottom-header').css('background-position', '50%' + (-scrollTop / 2) + 'px');
        });

        function fixSize() {
            $('.fix-top-header').height($('.top-header').outerHeight());
        }

        fixSize();
         window.addEventListener('resize', () => {fixSize()});
    /*NAV EFFECT-CUT*/
    const $nav_effect_cut = $('.nav-effect-cut > li');
    $nav_effect_cut.each(function () {
        let text = $(this).children().text();
        $('<div class="top"><a>' + text + '</a></div>').appendTo(this);
        $('<div class="bottom"><a>' + text + '</a></div>').appendTo(this);
    });

    SeeElement = function (query, onSee, onStopSee) {

        $(document).on('scroll', function () {
            let scrollTop = $(window).scrollTop();
            let scrollBottom = scrollTop + $(window).innerHeight();
            $(query).each(function () {
                let $el = $(this);
                let offsetTop = $el.offset().top;
                let offsetBottom = $el.height() + offsetTop;
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
