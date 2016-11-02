module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'src/<%= pkg.name %>.js',
        dest: 'build/<%= pkg.name %>.min.js'
      }
    },
    sass: {                                // Task
        dist: {                            // Target
        options: {                         // Target options
            style: 'expanded'
        },
        files: {                             // Dictionary of files
            'style.css': 'sass/style.scss'   // 'destination': 'source
        }
        }
    },
    postcss: {
        options: {
            processors: [
                require('pixrem')(), // add fallbacks for rem units
                require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                require('cssnano')() // minify the result
            ]
        },
        dist: {
            src: 'style.css',
            dest: 'style.css'
        }
    },
    watch: {
        sass: {
            files: ['sass/*.scss', 'sass/_partials/*.scss'],
            tasks: ['sass', 'postcss']
        },
        php: {
            files: ['*.php'],
        },
         options: {
            livereload: true,
            spawn: false
        }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');

};