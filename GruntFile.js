module.exports = function(grunt) {
	const sass = require('node-sass');

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			sass: {
				files: [
					'admin/css/sass/*.scss',
					'admin/css/sass/importer.scss',

					'public/css/sass/*.scss',
					'public/css/sass/base/*.scss',
					'public/css/sass/components/*.scss',
					'public/css/sass/layouts/*.scss',
					'public/css/sass/importer.scss',
				],
				tasks: ['sass:dist'],
				options: {
					livereload: true,
					port: 9000
				}
			}
		},
		sass: {
			options: {
				sourceMap: true,
				outputStyle: 'expanded',
				sourceComments: false,
				implementation: sass
			},
			dist: {
				files: {
					'admin/css/slake-admin.css': 'admin/css/sass/importer.scss',
					'public/css/slake-public.css': 'public/css/sass/importer.scss',
				}
			}
		}
	});
	grunt.registerTask('default', ['sass:dist', 'watch']);
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
};

/* Slake Set-up*/
/* 1.0 - Manual Install */
	/* 1.1 - Use [ npm install grunt --save-dev ] */
	/* 1.2 - Use [ npm install load-grunt-tasks --save-dev ] */
	/* 1.3 - Use [ npm install node-sass --save-dev ] */
	/* 1.4 - Use [ npm install grunt-sass --save-dev ] */
	/* 1.5 - Use [ npm install grunt-contrib-watch --save-dev ] */

/* 2.0 - Two way shorthand install */
	/* 2.1 - npm install grunt --save-dev; npm install load-grunt-tasks --save-dev; npm install grunt-sass --save-dev; npm install grunt-contrib-watch --save-dev */
	/* 2.2 - npm install grunt load-grunt-tasks node-sass grunt-sass grunt-contrib-watch --save-dev */

/* 3.0 - Run Grunt command to start a project */
	/* 3.1 - Type "Grunt" */
