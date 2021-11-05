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

        this.initLazyload();
        this.initBarbaJS();

        jQuery("header").sticky({
            topSpacing: 0,
            zIndex: 99,
        });
    }

    initLazyload()
    {
        if(typeof(window.lazyload) == "undefined"){
            window.lazyload = new LazyLoad();
        }
    
        window.lazyload.update();
        setTimeout(this.initLazyload, 1000);
    }

    initBarbaJS()
    {
        if(jQuery("[data-barba]").length > 0){
            barba.init({
                transitions: [{
                    name: 'default',
                    leave: (data) => {
                        return new Promise((resolve, reject) => {
                            jQuery(data.current.container).fadeOut(750, () => {
                                resolve();
                            });
                        });
                    },
                    enter: (data) => {
                        jQuery(data.next.container).hide();
                        jQuery(data.next.container).fadeIn(750);
                    }
                }],
                views: [{
                    name: "rbf-wp-starter-theme",
                    beforeEnter: () => {
                        //
                    },
                    afterEnter: () => {
                        //
                    },
                }]
            });
        }
    }
}