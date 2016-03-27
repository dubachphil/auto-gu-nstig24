// ==================================================
// require plugins
// ==================================================

var gulp = require('gulp');
var plumber = require('gulp-plumber');
var jade = require('gulp-jade');
var stylus = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var coffee = require('gulp-coffee');
var coffeelint = require('gulp-coffeelint');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();

// ==================================================
// gulp tasks
// ==================================================

// process jade files
gulp.task('jade', function() {
  gulp.src('./demo/index.jade')
    .pipe(plumber())
    .pipe(jade({pretty: true}))
    .pipe(gulp.dest('./'));
});

// process stylus files
function stylusTask(src, dest) {
  gulp.src(src)
    .pipe(plumber())
    .pipe(stylus())
    .pipe(autoprefixer({browsers: ['last 4 versions']}))
    .pipe(sourcemaps.init())
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dest))
    .pipe(browserSync.stream());
}

gulp.task('stylus-demo', function() {
  stylusTask('./demo/*.styl', './demo/');
});

gulp.task('stylus-src', function() {
  stylusTask('./src/*.styl', './build/');
});

// process coffeescript files
gulp.task('coffee', function() {
  gulp.src('./src/*.coffee')
    .pipe(plumber())
    .pipe(coffeelint({'max_line_length': {'level': 'ignore'}}))
    .pipe(coffeelint.reporter())
    .pipe(coffee())
    .pipe(sourcemaps.init())
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/'));
});

// start server
gulp.task('server', function() {
  browserSync.init({
    server: {
      baseDir: "./"
    }
  });
});

// ==================================================
// watch files
// ==================================================

gulp.task('watch', function() {
  // demo files
  gulp.watch('./demo/*.jade', ['jade']);
  gulp.watch('./demo/*.styl', ['stylus-demo']);

  // source files
  gulp.watch('./src/*.styl', ['stylus-src']);
  gulp.watch('./src/*.coffee', ['coffee']);

  // browser reloads
  gulp.watch("*.html").on("change", browserSync.reload);
  gulp.watch("./build/*.js").on("change", browserSync.reload);
});

// ==================================================
// default task
// ==================================================

gulp.task('default', ['server', 'watch']);
