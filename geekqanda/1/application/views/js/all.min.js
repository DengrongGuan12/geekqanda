$(function () {
    if ($("#footer").length > 0) {
        $("body").append('<div id="backtotop" class="showme"><div class="bttbg"></div></div>');
        initGoToTop()
    }
});
function initGoToTop() {
    var b = jQuery("#footer").position().top - jQuery(window).height() - 200;
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 100) {
                jQuery("#backtotop").addClass("showme")
            } else {
                jQuery("#backtotop").removeClass("showme")
            }
        });
        jQuery("#backtotop").click(function () {
            jQuery("body,html").animate({scrollTop: 0}, 400);
            return false
        })
    });
    if (jQuery(window).scrollTop() == 0) {
        jQuery("#backtotop").removeClass("showme")
    } else {
        jQuery("#backtotop").addClass("showme")
    }
}