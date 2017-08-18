/**
 * Created by vol4n3 on 20/06/2017.
 */
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

    class HeaderTitle{
        constructor(element){
           this.setActive($(document).scrollTop());
           this.element = element;
        }
        setActive(scrollTop){
            this.active = scrollTop > 133 && !this.active
                || scrollTop > 75 && this.active;
        }
        resize(scrollTop){
            this.setActive(scrollTop);
            if(this.active){
                fixSize();
                this.element.addClass('active');
                setTimeout(fixSize,810);
            }else{
                fixSize();
                this.element.removeClass('active');
                setTimeout(fixSize,810);
            }
        }
    }
    const ht = new HeaderTitle( $('.big-title'));
    /*scroll event*/
    $(document).scroll(() => {
        let scrollTop = $(this).scrollTop();
        /*Header bar*/
        ht.resize(scrollTop);
        /*Header img effect*/
        $('.bottom-header').css('background-position', '50%' + (-scrollTop - 100) + 'px');
        $('.move-down').css('padding-top', scrollTop + 'px');
    });
    function fixSize() {
        $('.fix-top-header').height($('.top-header').height())
    }
    fixSize();
    /*Resize event*/
    window.addEventListener('resize', () => {
        fixSize();
    })
});