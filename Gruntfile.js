var mozjpeg = require('imagemin-mozjpeg');
module.exports = function (grunt) {
    grunt.initConfig({
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'public/js/scripts.js' : [ 
//                            'belcran/site/assets/_js/jquery.js',
                        ]
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'public/css/style.css': [                        
//                        'belcran/site/assets/_css/style.css',
                    ]
                }
            }
        }, //cssmin
        imagemin: {
            static: {
                options: {
                    optimizationLevel: 7,
                    svgoPlugins: [{ removeViewBox: false }],
                    use: [mozjpeg()]
                },
                files: {
//                    'public/images/banners/banner1.jpg' : 'belcran/site/assets/_img/freshbusiness.jpg', 
                }
            }        
        }, //imagemin
        watch : {
            dist : {
                files : [
                    'belcran/site/assets/_js/**/*',
                    'belcran/site/assets/_css/**/*'
                ],
                tasks : [ 'uglify', 'cssmin' ]
            }
        } // watch
    });    
    // Plugins do Grunt
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
    grunt.loadNpmTasks( 'grunt-contrib-imagemin' );
    grunt.loadNpmTasks( 'grunt-contrib-watch' );

    // Tarefas que serão executadas
    grunt.registerTask( 'default', [ 'uglify', 'cssmin', 'imagemin' ] );
    
    //Tarefa para Watch
    grunt.registerTask( 'w', [ 'watch' ] );
};



