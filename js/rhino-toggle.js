jQuery(document).ready(function ($) {

    var triggeropen = $('.rhino a, a.rhino');
    var triggerclose = $('.rhino__close, .rhino__background');

    function openRhino() {
        $('body').addClass('rhino-open');
    }

    function closeRhino() {
        $('body').removeClass('rhino-open');
    }

    triggeropen.on('click', openRhino);
    triggerclose.on('click', closeRhino);

});