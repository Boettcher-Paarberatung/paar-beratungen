module.exports = function(grunt){

	// Project configuration.
	grunt.initConfig({

		sass:{
			dist:{
				files:{
					'assets/css/style.css': 'assets/css/style.sass'
				}
			}
		},

    cssmin:{
			css:{
				files:{
					'style.css': ['assets/css/style_init.css', 'assets/css/includes/bootstrap.min.css', 'assets/css/includes/font-awesome.min.css', 'assets/css/style.css']
				}
			}
		},

		uglify:{
			js:{
				files:{
					'script.min.js': ['assets/js/includes/bootstrap.min.js', 'assets/js/includes/script.js']
				}
			}
		},

	  watch:{
			js:{
				files: ['assets/js/**/*.js'],
				tasks: [ 'uglify:js'],
			},
			sass:{
				files: ['assets/css/**/*.sass'],
				tasks: ['sass', 'cssmin:css'],
			},
		},

	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['sass', 'cssmin', 'uglify', 'watch']);

}
