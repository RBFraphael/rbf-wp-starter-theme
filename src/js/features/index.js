import { FooterWrap } from "./footer-wrap";
import { Loader } from "./loader";
import { MobileDrawer } from "./mobile-drawer";

export class Features {

    constructor()
    {
        /**
         * Here you will write JS about your theme, like
         * button behaviours, animations, responsive
         * behaviours and other features. Also, you can
         * separate each feature in another JS file, export
         * it's class and instantiate here.
         */

        new FooterWrap();
        new MobileDrawer();
        new Loader();
    }

}