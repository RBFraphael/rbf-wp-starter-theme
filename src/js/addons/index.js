export class AddOns
{
    constructor()
    {
        /**
         * Want you some additional addons, like GSAP, PopperJS,
         * Slick Slider or anything else? Here is the place to
         * manage those JS and, when needed, instantiate them.
         * The JS files itself may be placed on ./scripts folder,
         * and will be meged into compiled release.js file.
         */

        window.lazyload = new LazyLoad();
        AOS.init();
    }
}