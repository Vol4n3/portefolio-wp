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
});