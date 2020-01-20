module.exports = function ( grunt ) {
	// Auto-load the needed grunt tasks
	// require('load-grunt-tasks')(grunt);
	require( 'load-grunt-tasks' )( grunt, { pattern: ['grunt-*'] } );

	var config = {
		tmpdir:                  '.tmp/',
		phpFileRegex:            '[^/]+\.php$',
		phpFileInSubfolderRegex: '.*?\.php$',
		themeSlug:               'mentalpress',
	};

	// configuration
	grunt.initConfig( {
		pgk: grunt.file.readJSON( 'package.json' ),

		config: config,

		// https://npmjs.org/package/grunt-contrib-compass
		compass: {
			options: {
				sassDir:        'assets/sass',
				cssDir:         config.tmpdir,
				imagesDir:      'assets/images',
				outputStyle:    'compact',
				relativeAssets: true,
				noLineComments: true,
				importPath:     ['bower_components/bootstrap-sass-official/assets/stylesheets']
			},
			dev: {
				options: {
					watch: true
				}
			},
			build: {
				options: {
					watch: false,
					force: true
				}
			}
		},

		// Parse CSS and add vendor-prefixed CSS properties using the Can I Use database. Based on Autoprefixer.
		// https://github.com/nDmitry/grunt-autoprefixer
		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'ie 9', 'ie 10']
			},
			style_css: {
				expand: true,
				cwd:    config.tmpdir,
				src:    '*.css',
				dest:   './'
			},
		},

		// https://npmjs.org/package/grunt-contrib-watch
		watch: {
			options: {
				livereload: true,
				// spawn:      false
			},

			// autoprefix the files
			autoprefixer: {
				files: ['<%= config.tmpdir %>*.css'],
				tasks: ['autoprefixer:style_css'],
			},

			// minify js files
			minifyjs: {
				files: ['assets/js/*.js'],
				tasks: ['requirejs:build'],
			},

			// PHP
			other: {
				files: ['**/*.php'],
			},
		},

		// requireJS optimizer
		// https://github.com/gruntjs/grunt-contrib-requirejs
		requirejs: {
			build: {
				// Options: https://github.com/jrburke/r.js/blob/master/build/example.build.js
				options: {
					baseUrl:                 '',
					mainConfigFile:          'assets/js/main.js',
					optimize:                'uglify2',
					preserveLicenseComments: false,
					useStrict:               true,
					wrap:                    true,
					name:                    'bower_components/almond/almond',
					include:                 'assets/js/main',
					out:                     'assets/js/main.min.js'
				}
			}
		},

		// https://github.com/gruntjs/grunt-contrib-copy
		copy: {
			// create new directory for deployment
			build: {
				expand: true,
				dot:    false,
				dest:   config.themeSlug + '/',
				src:    [
					'*.css',
					'*.php',
					'screenshot.{jpg,png}',
					'Gruntfile.js',
					'composer.json',
					'composer.lock',
					'package.json',
					'bower.json',
					'wpml-config.xml',
					'assets/**',
					'bower_components/picturefill/dist/picturefill.min.js',
					'bower_components/requirejs/require.js',
					'bin/acf.xml',
					'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/**',
					'bower_components/acf/**',
					'bundled-plugins/**',
					'inc/**',
					'languages/**',
					'vendor/**'
				],
				flatten: false
			},
		},

		// https://github.com/gruntjs/grunt-contrib-clean
		clean: {
			build: [
				config.themeSlug + '/vendor/tgmpa/tgm-plugin-activation/example.php',
				config.themeSlug + '/vendor/tgmpa/tgm-plugin-activation/plugins/tgm-example-plugin.zip',
			]
		},

		// https://github.com/gruntjs/grunt-contrib-compress
		compress: {
			build: {
				options: {
					archive: config.themeSlug + '.zip',
					mode:    'zip'
				},
				src: config.themeSlug + '/**'
			},
			eddThemeVersion: {
				options: {
					archive: 'edd-' + config.themeSlug + '.zip',
					mode:    'zip'
				},
				src: config.themeSlug + '/**'
			},
			tfThemeVersion: {
				options: {
					archive: 'tf-' + config.themeSlug + '.zip',
					mode:    'zip'
				},
				src: config.themeSlug + '/**'
			}
		},

		// https://npmjs.org/package/grunt-concurrent
		concurrent: {
			server: [
				'compass:dev',
				'watch'
			]
		},

		// https://www.npmjs.com/package/grunt-wp-i18n
		makepot: {
			theme: {
				options: {
					domainPath:      'languages/',
					include:         [config.phpFileRegex, '^inc/'+config.phpFileInSubfolderRegex],
					mainFile:        'style.css',
					potComments:     'Copyright (C) {year} ProteusThemes \n# This file is distributed under the GPL 2.0.',
					potFilename:     config.themeSlug + '.pot',
					potHeaders:      {
						poedit:                 true,
						'report-msgid-bugs-to': 'http://support.proteusthemes.com/',
					},
					type:            'wp-theme',
					updateTimestamp: false,
					updatePoFiles:   true,
				}
			}
		},

		// https://www.npmjs.com/package/grunt-wp-i18n
		addtextdomain: {
			options: {
				updateDomains: true
			},
			target: {
				files: {
					src: [
						'*.php',
						'inc/**/*.php',
					]
				}
			}
		},

		// https://www.npmjs.com/package/grunt-po2mo
		po2mo: {
			files: {
				src:    'languages/*.po',
				expand: true,
			},
		},

		// https://github.com/yoniholmes/grunt-text-replace
		replace: {
			theme_version: {
				src:          'style.css',
				overwrite:    true,
				replacements: [{
					from: '0.0.0-tmp',
					to: function () {
						return grunt.option( 'longVersion' );
					}
				}],
			},
			noThemeRegistrationExceptions: {
				src:  config.themeSlug + '/functions.php',
				overwrite: true,
				replacements: [{
					from: "\n	'theme-registration',",
					to: ''
				}]
			},
			tfExceptions: {
				src:  config.themeSlug + '/inc/theme-registration.php',
				overwrite: true,
				replacements: [{
					from: "'build'            => 'pt',",
					to: "'build'            => 'tf',"
				}]
			},
		},
	} );

	// when developing
	grunt.registerTask( 'default', [
		'build',
		'concurrent:server',
	] );

	// build
	grunt.registerTask( 'build', [
		'compass:build',
		'autoprefixer',
		'requirejs:build',
	] );

	// update languages files
	grunt.registerTask( 'theme_i18n', [
		'addtextdomain',
		'makepot:theme',
		'po2mo',
	] );

	// CI
	// build assets
	grunt.registerTask( 'ci', 'Builds all assets on the CI, needs to be called with --theme_version arg.', function () {
		// get theme version, provided from cli
		var version = grunt.option( 'theme_version' ) || null;

		// check if version is string and is in semver.org format (at least a start)
		if ( 'string' === typeof version && /^v\d{1,2}\.\d{1,2}\.\d{1,2}/.test( version ) ) { // regex that version starts like v1.2.3
			var longVersion = version.substring( 1 ).trim(),
				tasksToRun = [
					'build',
					'replace:theme_version',
					'theme_i18n'
				];

			grunt.option( 'longVersion', longVersion );

			if ( /^\d{1,2}\.\d{1,2}\.\d{1,2}(-RC\d)?$/.test( longVersion ) ) { // perform theme update, add flag file
				grunt.log.writeln( 'Uploading a theme builds' );
				grunt.log.writeln( '===========================' );

				if ( grunt.file.isFile( './deploy-zipball' ) ) {
					grunt.fail.warn( 'File for flagging theme builds already exists.', 1 );
				} else {
					// write a dummy file, if this one exists later on build a zip for theme builds
					grunt.file.write( './deploy-zipball', 'lets go!' );
				}
			}

			grunt.task.run( tasksToRun );
		}
		else {
			grunt.fail.warn( 'Version to be replaced in style.css is not specified or valid.\nUse: grunt <your-task> --theme_version=v1.2.3\n', 3 );
		}
	} );

	// build the theme files
	grunt.registerTask( 'buildTheme', [
		'copy:build',
		'clean:build',
	] );

	// create installable zip for TF
	grunt.registerTask( 'tfZip', [
		'replace:tfExceptions',
		'compress:tfThemeVersion',
	] );

	// create installable zip with no theme registration
	grunt.registerTask( 'noThemeRegistraionZip', [
		'replace:noThemeRegistrationExceptions',
		'compress:build',
	] );

};
