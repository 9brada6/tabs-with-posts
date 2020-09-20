const gulp = require( 'gulp' );
const sass = require( 'gulp-sass' );
const watchify = require( 'watchify' );
const browserify = require( 'browserify' );
const source = require( 'vinyl-source-stream' );
const tsify = require( 'tsify' );
const fancyLog = require( 'fancy-log' );
const sizeReport = require( 'gulp-sizereport' );
const buffer = require( 'vinyl-buffer' );
const minifyStream = require( 'minify-stream' );
const autoprefixer = require( 'gulp-autoprefixer' );
const concat = require( 'gulp-concat' );
const header = require( 'gulp-header' );
const footer = require( 'gulp-footer' );

/** Change this variable to configure the script for production or development. */
const production = false;

const sourceMap = ! production;

const sassVars = {
	backend: {
		name: 'Backend',
		src: './assets/src-backend/style.scss',
		sassOptions: { outputStyle: 'compressed' },
		dest: './assets/backend',
		watch: './assets/src-backend/**/*.scss',
	},

	frontend: {
		name: 'Frontend',
		src: './assets/src-frontend/style.scss',
		sassOptions: { outputStyle: 'compressed' },
		dest: './assets/frontend',
		watch: './assets/src-frontend/**/*.scss',
	},
};

const tsVars = {
	backend: {
		name: 'Backend',
		src: 'assets/src-backend/script.ts',
		dest: 'assets/backend',
		watchifyOptions: {
			ignoreWatch: [ '**/node_modules/**', '**/assets/src-frontend/**' ],
		},
	},

	frontend: {
		name: 'Frontend',
		src: 'assets/src-frontend/script.ts',
		dest: 'assets/frontend',
		watchifyOptions: {
			ignoreWatch: [ '**/node_modules/**', '**/assets/src-backend/**' ],
		},
	},
};

const iconVars = {
	name: 'All Icons',
	watch: './assets/svgs/*/**/*',
	src: './assets/svgs/*/**/*',
	fileName: 'all-icons.svg',
	dest: './assets/svgs/',
};

// #region -- Frontend and Backend SCSS

function startScssWatch( options ) {
	compileScss( options );

	gulp.watch( options.watch, startScssWatch.bind( null, options ) );
	// fancyLog( 'Watching SCSS \'' + options.name + '\' for changes ...\n' );
}

function compileScss( options ) {
	const beginDate = new Date();

	fancyLog( 'SCSS: \x1b[34m' + options.name + '\x1b[0m ...' );
	gulp.src( options.src )
		.pipe( sass( options.sassOptions ).on( 'error', sass.logError ) )
		.pipe( autoprefixer( {
			cascade: false,
		} ) )
		.pipe( gulp.dest( options.dest ) )
		.on( 'end', function( ) {
			const title = 'SCSS: \x1b[34m' + options.name + '\x1b[0m --- \x1b[32m' + ( Math.round( ( new Date() - beginDate ) / 100 ) / 10 ) + ' s\x1b[0m';
			fancyLog( title );
		} )
		.pipe( sizeReport( {
			total: false,
			gzip: true,
		} ) );
}

// #endregion -- Frontend and Backend SCSS

// #region -- Frontend and Backend TypeScript

function watchBrowserify( type ) {
	const browserifyToWatch = getBrowserify( type );
	bundleBrowserify( browserifyToWatch, type );

	const watchedBrowserify = watchify( browserifyToWatch, type.watchifyOptions );

	// fancyLog( 'Watching TypeScript \'' + type.name + '\' for changes ...\n' );
	watchedBrowserify.on( 'update', bundleBrowserify.bind( null, browserifyToWatch, type ) );
	// watchedBrowserify.on( 'log', fancyLog );
}

function getBrowserify( type ) {
	return browserify( {
		basedir: '.',
		debug: true,
		entries: [ type.src ],
		cache: {},
		packageCache: {},
	} ).transform( {
		global: true,
	}, 'browserify-shim' )
		.plugin( tsify, { target: 'es5', esModuleInterop: true, lib: [ 'es2015', 'dom' ], strict: false } );
}

function bundleBrowserify( toBundle, type ) {
	const beginDate = new Date();

	fancyLog( 'TypeScript: \x1b[34m' + type.name + '\x1b[0m ...' );
	toBundle = toBundle
		.bundle()
		.on( 'error', fancyLog.error )
		.pipe( minifyStream( { sourceMap } ) )
		.pipe( source( 'script.js' ) )
		.pipe( gulp.dest( type.dest ) )
		.pipe( buffer() )
		.on( 'end', function( ) {
			const title = 'TypeScript: \x1b[34m' + type.name + '\x1b[0m --- \x1b[32m' + ( Math.round( ( new Date() - beginDate ) / 100 ) / 10 ) + ' s\x1b[0m';
			fancyLog( title );
		} )
		.pipe( sizeReport( {
			total: false,
			gzip: true,
		} ) );
}

// #endregion -- Frontend and Backend TypeScript

// #region -- Create all icons file

function startWatchSvg() {
	createSvgFile();

	gulp.watch( iconVars.watch, startWatchSvg );
}

function createSvgFile() {
	const beginDate = new Date();

	const svgHeader =
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>' + '\n' +
		'<!-- This file is generated dynamically. Do NOT modify it. -->' + '\n' +
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;"><defs>';
	const svgFooter = '</defs></svg>';

	fancyLog( 'SVG: \x1b[34m' + iconVars.name + '\x1b[0m ...' );
	gulp.src( iconVars.src )
		.pipe( concat( iconVars.fileName ) )
		.pipe( header( svgHeader ) )
		.pipe( footer( svgFooter ) )
		.pipe( gulp.dest( iconVars.dest ) )
		.on( 'end', function( ) {
			const title = 'SVG: \x1b[34m' + iconVars.name + '\x1b[0m --- \x1b[32m' + ( Math.round( ( new Date() - beginDate ) / 100 ) / 10 ) + ' s\x1b[0m';
			fancyLog( title );
		} )
		.pipe( sizeReport( {
			total: false,
			gzip: true,
		} ) );
}

// #endregion -- Create all icons file

exports.default = function() {
	gulp.parallel( startScssWatch.bind( null, sassVars.backend ), startScssWatch.bind( null, sassVars.frontend ) )();
	gulp.parallel( watchBrowserify.bind( null, tsVars.backend ), watchBrowserify.bind( null, tsVars.frontend ) )();
	startWatchSvg();
};
