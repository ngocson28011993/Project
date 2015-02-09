var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    autoprefix  = require('gulp-autoprefixer'),
    minifyCSS   = require('gulp-minify-css');


var js_dir   = './public/assets/js',
    css_dir  = './public/assets/css',
    plug_dir = './public/assets/plugins',
    dist_dir = './public/assets/min';


// JS concat, strip debugging and minify
gulp.task('scripts', function() {

    // plugins
    gulp.src(plug_dir + '/*.js')
        .pipe(concat('plugins.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dist_dir));

    // mine
    gulp.src(js_dir + '/*.js')
        .pipe(concat('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dist_dir));
});

// CSS concat, auto-prefix and minify
gulp.task('styles', function() {

    // plugins
    gulp.src(plug_dir + '/*.css')
        .pipe(concat('plugins.min.css'))
        .pipe(autoprefix('last 2 versions'))
        .pipe(minifyCSS())
        .pipe(gulp.dest(dist_dir));

    // mine
    gulp.src(css_dir + '/*.css')
        .pipe(concat('styles.min.css'))
        .pipe(autoprefix('last 2 versions'))
        .pipe(minifyCSS())
        .pipe(gulp.dest(dist_dir));
});

// default gulp task
gulp.task('default', ['scripts', 'styles'], function() {

    // watch for JS changes
    gulp.watch(js_dir + '/*.js', function() {
        gulp.run('scripts');
    });

    // watch for CSS changes
    gulp.watch(css_dir + '/*.css', function() {
        gulp.run('styles');
    });
});