module.exports = function(grunt) {


    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        watch: {

            sass: {
                files: ['css/sass/**/*.{scss,sass}'],
                tasks: ['sass:dist', 'rsync'],
            },

            // js : {
            //     files: ['js/**/*.js'],
            //     tasks: ['jshint'],
            //     options: {
            //         livereload: true,
            //         livereloadOnError: false,
            //         spawn: false
            //     }
            // },

            // other: {
            //     files: ['**/*.php', 'css/*.css'],
            //     options: {
            //         livereload: true,
            //         livereloadOnError: false,
            //         spawn: false
            //     }
            // }
        },

        jshint: {
            all: ['js/**/*.js', '!js/foundation/**/*.js', '!js/vendor/**/*.js']
        },

        sass: {
            dist: {
                files: {
                    'css/style.css': 'css/sass/style.scss'
                }
            },
            options: {
                compass: true,
                //quiet: true,
                style: 'nested',
                require: [ 'susy']
            }
        },

        rsync: {
            options: {
                // args: ["-q"],
                //exclude: [".git*","assets/less","node_modules"],
                recursive: true
            },
            dist: {
                options: {
                    src: ["./css/"],
                    //src: "./css",
                    dest: "/var/www/html/client/margaux/wp-content/themes/margauxstore/css/",
                    host: "laventurier@onlinet",
                }
            }
        },

    });

    grunt.registerTask('default', ['watch']);
};