module.exports = function(grunt) {
  
  // Load automatically all tasks without using grunt.loadNpmTasks()
  // for each module
  require('load-grunt-tasks')(grunt);


  /* ---------------------------------------
   * Tasks configuration
   * --------------------------------------- */
  grunt.initConfig({

    /*
     * Paths
     */
    paths: {
      resources: 'scss',      // source files (scss)
      assets: 'dist/css'        // compiled files (css)
    },

    /* 
     * SASS task
     */
    sass: {

      // For development
      dev: {
        files: {
          '<%= paths.assets %>/main.css' : '<%= paths.resources %>/main.scss'
        },
        options: {
          style: 'expanded'
        }
      },

      // For production
      prod: {
        files: {
          '<%= paths.assets %>/main.css' : '<%= paths.resources %>/main.scss'
        },
        options: {
          style: 'compressed', // This option minimizes the CSS
          sourcemap: 'none'
        }
      }

    },

    /* 
     * Watch task
     */
    watch: {
      options: {
        spawn: false // add spawn option in watch task
      },
      sass: {
        files: [
          '<%= paths.resources %>/main.scss' // Write here the files that Grunt must watches
        ],
        tasks: ['sass:dev']
      }
    }

  });


  /* ---------------------------------------
   * Registered tasks
   * --------------------------------------- */
  grunt.registerTask('default', ['sass:dev']);
  grunt.registerTask('prod', ['sass:prod']);

};