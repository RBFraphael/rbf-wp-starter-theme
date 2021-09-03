export class Loader
{
    constructor()
    {
        jQuery(window).on("load", this.removeLoader);
    }

    removeLoader()
    {
        setTimeout(() => {
            jQuery("#loader").fadeOut(1000, () => {
                AOS.init();
            });
        }, 1500);
    }
}