'use strict';

// npm packages
var gulp                    = require('gulp');
var browserSync             = require('browser-sync').create();
var clean                   = require('gulp-clean');
var sass                    = require('gulp-sass');
var minifyCss               = require('gulp-minify-css');
var sourcemaps              = require('gulp-sourcemaps');
var concat 		            = require('gulp-concat');
var rename                  = require('gulp-rename');
var fileinclude             = require('gulp-file-include');
var ts                      = require('gulp-typescript');
var tsProject               = ts.createProject('tsconfig.json');

var scss_src = 'src/scss/**/*.scss';
var imageFiles = 'src/img/*';
var jsFiles = 'src/js/**/*';
var cssDest = 'dist/css/';
var fontFiles = 'src/fonts/**/*';
var componentFiles = 'src/index.html';

// Static Server + watching scss/html files
gulp.task('serve', ['images','fonts','js','scss','components'], function() {
	browserSync.init({
        server: {
            baseDir: "./",
            index: "dist/index.html"
        },
        https: true
	});

    gulp.watch("src/scss/**/*.scss", ['scss']);
    gulp.watch("src/js/**/*.js", ['js']);
    gulp.watch("src/img/**/*", ['images']);
    gulp.watch("src/**/*.html", ['components']);
	gulp.watch("src/**/*").on('change', browserSync.reload);
});

gulp.task('scss', function () {
    return gulp.src(scss_src)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(minifyCss())
    .pipe(concat('main.css'))
    .pipe(rename({
      basename : 'main',
      extname : '.min.css'
    }))
    .pipe(sourcemaps.write('./_sourcemaps'))
    .pipe(gulp.dest('./dist/css'))
});

gulp.task('images', function () {
    return gulp.src(imageFiles)
    .pipe(gulp.dest('./dist/img'))
});
gulp.task('js', function () {
    return gulp.src(jsFiles)
    .pipe(gulp.dest('./dist/js'))
});
gulp.task('fonts', function() {
    return gulp.src(fontFiles)
    .pipe(gulp.dest('./dist/fonts'));
});
gulp.task('components', function() {
    var components = gulp.src('./src/index.html')
    .pipe(fileinclude({
        prefix: '@@',
        basepath: '@file'
    }))
    .pipe(gulp.dest('./dist'));
    return components;
});
gulp.task('clean', function() {
    return gulp.src('dist/*', { read: false })
    .pipe(clean());
});
gulp.task('compile-ts', function () {
    return tsProject.src()
        .pipe(tsProject())
        .js.pipe(gulp.dest("dist"));
});

gulp.task('default', ['serve']);