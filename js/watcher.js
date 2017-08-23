    function watching(className, onSee, onStopSee) {

        $(document).on('scroll', function() {
            var scrollTop = $(window).scrollTop();
            var scrollBottom = scrollTop + $(window).height();
            $('.' + className).each(function() {
                $el = $(this);
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
    watching('doSeeMe', function(elem) {
        setTimeout(function() {
            elem.css('background-color', 'grey')
        }, 2000);

    }, function(elem) {
        setTimeout(function() {
            elem.css('background-color', 'blue')
        }, 2000);
    });
