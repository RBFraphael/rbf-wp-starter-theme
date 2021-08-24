# RBF Wordpress Starter Theme
 Simple, easy-to-use (and easy-to-understand) modern Wordpress starter theme, for speed up theme development

## Getting started

First, fork/clone this project where you want. After that, run ```npm install``` and ```composer install``` to install all dependencies.

After that, run ```npm run rebrand``` to change theme's name, description, author, classes, constants and text domain to your own branding.

To start development, run ```npm run dev``` to initialize Webpack and SASS compilation.

To generate a pre-build version (just compile everything), run ```npm run dist```, and for generating your final ZIP file for installing on Wordpress sites, run ```npm run zip```.

For an automated build, just run ```npm run build```, and all your SCSS and JS will be compiled, and a final ZIP file will be available for you.