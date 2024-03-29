/* eslint-disable no-undef */
const gulp = require( 'gulp' );
const sass = require( 'gulp-sass' );
const watchify = require( 'watchify' );
const browserify = require( 'browserify' );
const source = require( 'vinyl-source-stream' );
const tsify = require( 'tsify' );
const fancyLog = require( 'fancy-log' );
const sizeReport = require( 'gulp-sizereport' );
const buffer = require( 'vinyl-buffer' );
const sourcemaps = require( 'gulp-sourcemaps' );
const autoprefixer = require( 'gulp-autoprefixer' );
const concat = require( 'gulp-concat' );
const header = require( 'gulp-header' );
const footer = require( 'gulp-footer' );
const fs = require( 'fs' );
const parser = require( 'fast-xml-parser' );
const replace = require( 'gulp-replace' );
const terser = require( 'gulp-terser' );
/* eslint-enable no-undef */

// const sourceMap = ! production;

const sassVars = {
	backend: {
		name: 'Backend',
		src: './assets/src-backend/style.scss',
		sassOptions: { outputStyle: 'compressed' },
		dest: './assets/backend',
		watch: [ './assets/src-backend/**/*.scss', './assets/src-common/**/*.scss' ],
	},

	frontend: {
		name: 'Frontend',
		src: './assets/src-frontend/style.scss',
		sassOptions: { outputStyle: 'compressed' },
		dest: './assets/frontend',
		watch: [ './assets/src-frontend/**/*.scss', './assets/src-common/**/*.scss' ],
	},
};

const tsVars = {
	backend: {
		name: 'Backend',
		src: 'assets/src-backend/script.ts',
		dest: 'assets/backend',
		mapFile: 'assets/backend/script.js.map',
		watchifyOptions: {
			ignoreWatch: [ '**/node_modules/**', '**/assets/src-frontend/**' ],
		},
		tsStrict: false,
	},

	frontend: {
		name: 'Frontend',
		src: 'assets/src-frontend/script.ts',
		dest: 'assets/frontend',
		mapFile: 'assets/frontend/script.js.map',
		watchifyOptions: {
			ignoreWatch: [ '**/node_modules/**', '**/assets/src-backend/**' ],
		},
		tsStrict: true,
	},
};

const iconVars = {
	name: 'All Icons',
	watch: './assets/svgs/*/**/*.svg',
	src: './assets/svgs/*/**/*.svg',
	fileName: 'all-icons.svg',
	dest: './assets/svgs/',
	xmlValidate: [ './assets/svgs/all-icons.svg', './assets/svgs/needed-icons.svg' ],
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
		.plugin( tsify, { target: 'es5', allowJs: true, esModuleInterop: true, lib: [ 'es2015', 'dom' ], strict: type.tsStrict } );
}

function bundleBrowserify( toBundle, type ) {
	const beginDate = new Date();

	fancyLog( 'TypeScript: \x1b[34m' + type.name + '\x1b[0m ...' );
	toBundle = toBundle
		.bundle()
		.on( 'error', fancyLog.error )
		.pipe( source( 'script.js' ) )
		.pipe( buffer() )
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( terser() )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( type.dest ) )
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
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n' +
		'<!-- This file is generated dynamically. Do NOT modify it. -->\n' +
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">\n\n';
	const svgFooter = '\n</svg>';

	fancyLog( 'SVG: \x1b[34m' + iconVars.name + '\x1b[0m ...' );
	gulp.src( iconVars.src )
		.pipe( concat( iconVars.fileName ) )
		.pipe( replace( '<svg', '<symbol' ) )
		.pipe( replace( 'svg>', 'symbol>' ) )
		.pipe( header( svgHeader ) )
		.pipe( footer( svgFooter ) )
		.pipe( gulp.dest( iconVars.dest ) )
		.on( 'end', function( ) {
			const title = 'SVG: \x1b[34m' + iconVars.name + '\x1b[0m --- \x1b[32m' + ( Math.round( ( new Date() - beginDate ) / 100 ) / 10 ) + ' s\x1b[0m';
			fancyLog( title );
			validateXmlFiles();
		} )
		.pipe( sizeReport( {
			total: false,
			gzip: true,
		} ) );
}

function validateXmlFiles() {
	try {
		for ( const filePath of iconVars.xmlValidate ) {
			const fileContent = fs.readFileSync( filePath, 'utf8' );
			parser.parse( fileContent, {}, true );
		}
		fancyLog( '\x1b[32mNo errors in XML detected!\x1b[0m' );
	} catch ( error ) {
		fancyLog( '\x1b[31m' + error.message + '\x1b[0m' );
	}
}

// #endregion -- Create all icons file

/* eslint-disable-next-line no-undef */
exports.default = function() {
	gulp.parallel( startScssWatch.bind( null, sassVars.backend ), startScssWatch.bind( null, sassVars.frontend ) )();
	gulp.parallel( watchBrowserify.bind( null, tsVars.backend ), watchBrowserify.bind( null, tsVars.frontend ) )();
	startWatchSvg();
};
