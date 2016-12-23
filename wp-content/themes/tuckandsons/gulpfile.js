'use strict';

var proxy_url = 'starter.dev'; // REPLACE THIS WITH YOUR LOCAL DEV URL

// PUT ALL BOWER JS FILES USED HERE TO BE COMBINED INTO BUILD DIRECTORY
var bower_files = [
  './bower_components/jquery/dist/jquery.js',
  './bower_components/fastclick/lib/fastclick.js',
  './bower_components/foundation-sites/dist/foundation.js',   
  './bower_components/motion-ui/dist/motion-ui.js',
  './bower_components/slick-carousel/slick/slick.js',
  './bower_components/handlebars/handlebars.js',
  './bower_components/lodash/dist/lodash.js',
  './bower_components/moment/min/moment.min.js',
  // './bower_components/greensock/uncompressed/jquery.gsap.js', // GREENSOCK
];

// PUT ALL FONT FILES USED HERE TO BE COPIED INTO BUILD DIRECTORY
var fonts = [
  './bower_components/font-awesome/fonts/*',
];

var proxy_url = 'tuckandsons.dev';
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* YOU SHOULDN'T NEED TO MODIFY ANYTHING BELOW HERE UNLESS YOU WANT TO ADD NEW FUNCTIONALITY */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */

 

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserify = require('gulp-browserify'),
    browserSync = require('browser-sync'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat');

 
// COMPILE THEME SASS FILE
gulp.task('sass', function () {
  return gulp.src('./library/scss/style.scss')
    .pipe(sourcemaps.init()) // Start Sourcemaps
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('./build/css/'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/css/'));
});


// COPY ALL FONTS INTO FONT BUILD DIRECTORY
gulp.task('fonts', function () {
  return gulp.src(fonts)
    .pipe(gulp.dest('./build/fonts/'));
});


// CONCAT ALL BOWER FILES INTO ONE DIST FILE
gulp.task('bower', function() {
  return gulp.src(bower_files)
    .pipe(concat('bower.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./build/js'));
});


// MINIFY THEME JS FILE
gulp.task('script', function() {
  return gulp.src('./library/js/scripts.js')
    .pipe(sourcemaps.init())
    // .pipe(browserify({
    //   insertGlobals : true,
    //   debug : false
    // }))
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(gulp.dest('./build/js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/js'));
});

// BROWSERSYNC AND WATCH
gulp.task('watch', function () {
  var files = [
    './build/css/*.css', 
    './build/js/scripts.js',
    '**/*.php',
    './library/images/**/*.{png,jpg,gif,svg,webp}',
  ];

	browserSync.init(files, { proxy: proxy_url });

	gulp.watch('./library/scss/**/*.scss', ['sass']);
	gulp.watch('./library/js/scripts.js', ['script']);
});

gulp.task('dev', ['bower','fonts','script','sass','watch']);
gulp.task('production', ['bower','fonts','script','sass']);