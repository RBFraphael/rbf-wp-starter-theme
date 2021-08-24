/**
 * Write your JS here. You can wrap anything you want in
 * other files, and import them here, or split features
 * in different classes and files, and instantiate them here.
 * By default, we made three other classes, to keep your
 * project organized.
 */

import { AddOns } from "./addons";
import { Features } from "./features";
import { GutenbergBlocks } from "./gutenberg-blocks";

class RBFWpStarterTheme
{

    constructor()
    {
        new AddOns();
        new Features();
        new GutenbergBlocks();
    }

}

new RBFWpStarterTheme();