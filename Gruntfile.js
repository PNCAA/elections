module.exports = function (grunt) {

	// Print time to build each grunt task
	require('time-grunt')(grunt);

	// Library to autoinclude necessary grunt tasks (makes building much faster)
	require('jit-grunt')(grunt);

	grunt.file.defaultEncoding = 'utf-8';

	// Project configuration.
	grunt.initConfig({
		dirs: {
			private: 'resources/private',
			public: 'resources/public',
			bower: 'bower_components',
			sass: {
				src: '<%= dirs.private %>/sass'
			},
			css: {
				dest: '<%= dirs.public %>/css'
			},
			js: {
				src: '<%= dirs.private %>/js',
				dest: '<%= dirs.public %>/js'
			},
			fonts: {
				dest: '<%= dirs.public %>/fonts'
			},
			vendor: {
				bootstrap: {
					js: '<%= dirs.bower %>/bootstrap-sass/assets/javascripts',
					fonts: '<%= dirs.bower %>/bootstrap-sass/assets/fonts/bootstrap'
				},
				jquery: '<%= dirs.bower %>/jquery/dist'
			}
		},
		compass: {
			dist: {
				options: {
					httpPath: '/',
					sassDir: '<%= dirs.sass.src %>',
					cssDir: '<%= dirs.css.dest %>',
					outputStyle: 'compressed',
					environment: 'production',
					relativeAssets: true,
					noLineComments: true,
					importPath: [
						'<%= dirs.bower %>/bootstrap-sass/assets/stylesheets'
					]
				}
			}
		},
		concat: {
			jslibrary: {
				src: [
					'<%= dirs.vendor.jquery %>/jquery.js'
				],
				dest: '<%= dirs.js.dest %>/library.js'
			},
			jsapp: {
				src: [
					'<%= dirs.vendor.bootstrap.js %>/bootstrap.js',
					'<%= dirs.js.src %>/main.js'
				],
				dest: '<%= dirs.js.dest %>/app.js'
			}
		},
		uglify: {
			jslibrary: {
				files: {
					'<%= dirs.js.dest %>/library.min.js': ['<%= concat.jslibrary.dest %>']
				}
			},
			jsapp: {
				files: {
					'<%= dirs.js.dest %>/app.min.js': ['<%= concat.jsapp.dest %>']
				}
			}
		},
		cssmin: {
			main: {
				src: '<%= dirs.css.dest %>/main.css',
				dest: '<%= dirs.css.dest %>/app.min.css'
			}
		},
		copy: {
			fonts: {
				files: [{
					expand: true,
					flatten: true,
					src: [
						'<%= dirs.vendor.bootstrap.fonts %>/*.{eot,svg,ttf,woff,woff2}'
					],
					dest: '<%= dirs.fonts.dest %>'
				}]
			}
		},
		clean: {
			js: ['<%= dirs.js.dest %>/*.js', '!<%= dirs.js.dest %>/*.min.js'],
			css: ['<%= dirs.css.dest %>/*.css', '!<%= dirs.css.dest %>/*.min.css']
		},
		watch: {
			grunt: {
				files: ['Gruntfile.js'],
				tasks: ['build']
			},
			sass: {
				files: ['<%= dirs.sass.src %>/**/*.scss'],
				tasks: ['compass', 'cssmin', 'clean:css']
			},
			js: {
				files: ['<%= dirs.js.src %>/**/*.js'],
				tasks: ['concat:jslibrary', 'concat:jsapp', 'uglify:jslibrary', 'uglify:jsapp', 'clean:js']
			}
		}
	});

	// Default task.
	grunt.registerTask('default', ['build', 'watch']);

	// Build task.
	grunt.registerTask('build', ['compass', 'concat', 'uglify', 'cssmin', 'copy', 'clean']);
};
