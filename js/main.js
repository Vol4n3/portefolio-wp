/**
 * Created by vol4n3 on 20/06/2017.
 */
jQuery(document).ready(function () {
    "use strict";
    const $ = jQuery;
    /*NAV EFFECT-CUT*/
    const $nav_effect_cut = $('.nav-effect-cut > li');
    $nav_effect_cut.hover(function () {
        setTimeout(function () {
            $(this).addClass('drop')
        }.bind(this), 300)
    }, function () {
        setTimeout(function () {
            $(this).removeClass('drop')
        }.bind(this), 300)
    });
    $nav_effect_cut.each(function () {
        let text = $(this).children().text();
        $('<div class="top"><a>' + text + '</a></div>').appendTo(this);
        $('<div class="bottom"><a>' + text + '</a></div>').appendTo(this);
    });
    function resizeHeaderBar(scrollTop) {
        if (scrollTop > 133) {
            $('.big-title').toggleClass('active');
        }
    }
    class BigTitle{
        constructor(scrollTop){
           this.setActive(scrollTop);
           this.element = $('.big-title');
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
    const bigTitle = new BigTitle($(this).scrollTop());
    /*scroll event*/
    $(document).scroll(() => {
        let scrollTop = $(this).scrollTop();

        /*Header bar*/
        bigTitle.resize(scrollTop);

        /*Header img effect*/
        $('.bottom-header').css('background-position', '50% ' + (-scrollTop - 100) + 'px');
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