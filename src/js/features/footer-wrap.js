export class FooterWrap
{
    constructor()
    {
        jQuery(document).on("ready", this.footerWrap);
        jQuery(window).on("resize", this.footerWrap);
        jQuery(window).on("scroll", this.footerWrap);
    }

    footerWrap()
    {
        var h = jQuery("footer#site-footer").outerHeight();
        jQuery("div#main").css("margin-bottom", h+"px");
        jQuery("main").css("margin-bottom", h+"px");
    }
}