'use strict';
module.exports = function(grunt) {

  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    watch: {
      options: {
        livereload: true
      },
      compass: {
        files: [
          'assets/scss/*.scss',
          'assets/scss/plugins/*.scss'
        ],
        tasks: ['compass']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['uglify']
      },
      livereload: {
          files: ['*.html', '*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
      }
    },

    compass: {                  // Task
      dist: {
        options: {
          config: 'config.rb',
          cssDir: 'assets/css',
          force: true
        }
      },
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/lib/*.js',
        // 'assets/js/plugins/*.js',
        // '!assets/js/plugins.min.js',
        // '!assets/js/main.min.js',
      ]
    },

    uglify: {
      plugins: {
        files: {
          'assets/js/plugins.min.js': [
            'assets/js/plugins/*.js'
          ]
        }
      },
      main: {
        options: {
          mangle: false,
          beautify: {
            beautify: true
          }
        },
        files: {
          'assets/js/main.min.js': [
            // 'assets/js/vendor/*.js',
            // '!assets/js/vendor/modernizr.custom.min.js',
            'assets/js/lib/*.js',
          ]
        }
      }
    },

    // image optimization
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 7,
          progressive: true
        },
        files: [{
          expand: true,
          cwd: 'assets/img/',
          src: '**/*',
          dest: 'assets/img/'
        }]
      }
    }
  });

  // Load tasks
  grunt.registerTask('default', ['watch']);

};