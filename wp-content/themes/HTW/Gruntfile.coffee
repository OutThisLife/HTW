module.exports = (grunt) ->
	grunt.initConfig
		pkg: grunt.file.readJSON('package.json'),

		# SASS
		sass: dist:
			options:
				style: 'compressed'
				trace: true

			files:
				'assets/css/style.css': 'assets/css/style.sass'

		# SNAPSHOT
		htmlSnapshot: all: options:
			sitePath: 'http://htw.nwsco.org/?dynamic'
			snapshotPath: '../../../snapshots/'
			fileNamePrefix: ''
			urls: [
				'/',
				'/test/'
			]

		# WATCH
		watch:
			css:
				files: '**/*.sass'
				tasks: ['sass']
				options: livereload: 35729

			php:
				files: ['**/*.php']
				options: livereload: 35729

	grunt.loadNpmTasks 'grunt-contrib-sass'
	grunt.loadNpmTasks 'grunt-contrib-watch'
	grunt.loadNpmTasks 'grunt-html-snapshot'

	grunt.registerTask 'default', ['watch']
	grunt.registerTask 'snap', ['htmlSnapshot']