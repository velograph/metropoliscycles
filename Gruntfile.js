module.exports = function( grunt ) {
  'use strict';

  // Load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  // Project configuration
  grunt.initConfig({
    pkgc: grunt.file.readJSON('package.json'),

    jshint: {
      all: [
      'Gruntfile.js',
      'js/**/*.js',
      '!js/**/*.min.js'
      ],
      options: {
        curly:   true,
        eqeqeq:  true,
        immed:   true,
        latedef: true,
        newcap:  true,
        noarg:   true,
        sub:     true,
        undef:   true,
        boss:    true,
        eqnull:  true,
        globals: {
          exports: true,
          module:  false,
          "jQuery": true,
          "wp": true,
          "require": true,
          "document": true,
          "window": true,
          "location": true,
          "navigator": true
        }
      }
    },
    sass: {
      dist: {
        options: {
          sourcemap: true,
        },
        files: { // 'destination': 'source' ... obviously.
          'css/style.css': 'sass/style.scss',
        }
      }
    },
    cssmin: {
      minify: {
        expand: true,
        src: ['css/style.css'],
        ext: '.css'
      }
    },
    uglify: {
      main: {
        options: {
          sourceMap: 'js/main.js.map',
          sourceMapPrefix: 2,
        },
        files: {
          'js/main.min.js': [
            'js/app.js'
          ]
        }
      }
    },
    watch: {
      sass: {
          files: ['sass/*.{scss,sass}', 'sass/**/*.scss', 'neat/**/*.scss', 'bourbon/**/*.scss', 'base/**/*.scss'],
          tasks: ['sass', 'uglify'],
      },
      js: {
        files: ['js/app.js'],
        tasks: ['uglify'],
      },
      images: {
        files: ['images/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
      },
    },
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 7,
          progressive: true,
          interlaced: true
        },
        files: [{
          expand: true,
          cwd: 'images/',
          src: ['*.{png,jpg,jpeg,gif}'],
          dest: 'images/'
        }]
      }
    },
  });

  // Default task(s)
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('build', ['sass', 'cssmin', 'uglify']);
  grunt.registerTask('stage', ['build', 'imagemin']);
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.util.linefeed = '\n';
}
