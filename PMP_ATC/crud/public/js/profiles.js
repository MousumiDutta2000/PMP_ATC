$(document).ready(function() {
    adjustNameFieldWidth();

    $(window).resize(function() {
        adjustNameFieldWidth();
    });

    function adjustNameFieldWidth() {
        $('.name-container').each(function() {
            var maxWidth = 150;
            var containerWidth = $(this).parent().width();
            var nameWidth = $(this).find('.name').width();

            if (nameWidth > maxWidth && nameWidth > containerWidth) {
                $(this).css('max-width', nameWidth + 10 + 'px');
            } else {
                $(this).css('max-width', '');
            }
        });
    }
});
