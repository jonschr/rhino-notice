jQuery(document).ready(function ($) {

    var triggeropen = $('.rhino a, a.rhino');
    var triggerclose = $('.rhino__close, .rhino__background');

    function openRhino(event) {
        event.preventDefault();
        $('body').addClass('rhino-open');
    }

    function closeRhino(event) {
        event.preventDefault();
        $('body').removeClass('rhino-open');
    }

    triggeropen.on('click', openRhino);
    triggerclose.on('click', closeRhino);

});