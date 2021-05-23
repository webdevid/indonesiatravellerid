'use strict';

//const gulp = require('gulp');
const { gulp, watch, src, dest } = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
//const cssnano = require('gulp-cssnano');
//const gulpIf = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
// const connect = require('gulp-connect-php');
// const livereload = require('gulp-livereload');

sass.compiler = require('node-sass');


function wpe_sass(){

	return src('./scss/**/*.scss')
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(autoprefixer('last 4 version'))
    .pipe(dest('../css'))
	.pipe(browserSync.stream());

}

function wpe_sassmin(){

	return src('./scss/**/*.scss')
	.pipe(sass({outputStyle: 'compressed',}).on('error', sass.logError))
	.pipe(autoprefixer('last 4 version'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(sourcemaps.write('./'))
    .pipe(dest('../css'))
	.pipe(browserSync.stream());

}

function wpe_server(){
	browserSync.init(null,{
        proxy: "cifor-icraf.local/?page_id=13"
    });
}

// function wpe_connect(){
// 	connect.server({}, function (){
// 		browserSync.init({
// 			proxy: "cifor-icraf.local/"
// 		});
// 	});

// }

function wpe_reload(cb){
	browserSync.reload();
  	cb();
}

exports.default = function() {
	// You can use a single task
	watch('./scss/**/*.scss', wpe_sass);
	watch('./scss/**/*.scss', wpe_sassmin);
	watch('./../../*.php', wpe_reload);
	watch('./../../*.php', wpe_server);

};


