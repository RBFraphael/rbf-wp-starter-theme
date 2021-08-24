const sass = require('node-sass');
const webpackDev = require("./webpack.dev.js");
const webpackPrd = require("./webpack.prod.js");

module.exports = function(grunt)
{
    require('load-grunt-tasks')(grunt);

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-webpack');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        webpack: {
            dev: webpackDev,
            dist: webpackPrd
        },
        concat: {
            dev: {
                src: ['src/js/addons/scripts/**/*.js', 'cache/release.js'],
                dest: 'assets/js/release.min.js'
            },
            dist: {
                src: ['src/js/addons/scripts/**/*.js', 'cache/release.js'],
                dest: 'cache/release.bundle.js'
            },
        },
        sass: {
            options: {
                implementation: sass,
                sourceMap: false,
            },
            dist: {
                files: {
                    'cache/release.css': 'src/scss/theme.scss'
                }
            },
            dev: {
                files: {
                    'assets/css/release.min.css': 'src/scss/theme.scss'
                }
            }
        },
        uglify: {
            options: {
                compress: true,
                sourceMap: true
            },
            dist: {
                files: {
                    'assets/js/release.min.js': 'cache/release.bundle.js'
                }
            }
        },
        cssmin: {
            options: {
                sourceMap: true,
            },
            dist: {
                files: {
                    'assets/css/release.min.css': 'cache/release.css'
                }
            }
        },
        clean: {
            cache: ['cache'],
            'prod-css': ['assets/css'],
            'prod-js': ['assets/js']
        },
        watch: {
            scripts: {
                files: 'src/js/**/*.js',
                tasks: ['clean:prod-js', 'webpack:dev', 'concat:dev']
            },
            styles: {
                files: 'src/scss/**/*.scss',
                tasks: ['clean:prod-css', 'sass:dev']
            }
        },
        concurrent: {
            options: {
                logConcurrentOutput: true
            },
            watch: ['watch:scripts', 'watch:styles'],
        }
    });

    grunt.registerTask('dev', ['clean:prod-css', 'clean:prod-js', 'webpack:dev', 'concat:dev', 'sass:dev', 'concurrent:watch']);
    grunt.registerTask('dist', ['clean:prod-css', 'clean:prod-js', 'webpack:dist', 'concat:dist', 'sass:dist', 'uglify:dist', 'cssmin:dist', 'clean:cache']);
}