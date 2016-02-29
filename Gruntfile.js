'use strict';
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
                            'app/resources/assets/js/jquery.js',
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
                        'app/resources/assets/css/style.css',
                    ]
                }
            }
        }, //cssmin
        imagemin: {
            dynamic: {
                files: [{
//                    optimizationLevel: 10,
                    expand: true,                  // Enable dynamic expansion
                    cwd: 'app/resources/assets/img/',                   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: 'public/img/'                  // Destination path prefix
                }]
            }
        }, //imagemin
        watch : {
            dist : {
                files : [
                    'app/resources/assets/js/**/*',
                    'app/resources/assets/css/**/*',
                    'app/resources/assets/img/**/*'
                ],
                tasks : [ 'uglify', 'cssmin', 'imagemin' ]
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



