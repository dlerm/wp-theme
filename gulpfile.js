const gulp               = require('gulp');
const gulpif             = require('gulp-if');
const size               = require('gulp-size');
const watch              = require('gulp-watch');
const notify             = require('gulp-notify');
const rename             = require('gulp-rename');
const filter             = require('gulp-filter');
const replace            = require('gulp-replace');
const flatten            = require('gulp-flatten');
const changed            = require('gulp-changed');
const plumber            = require('gulp-plumber');

const noise              = require('emoji-speaker');

const cssnano            = require('cssnano');
const sass               = require('gulp-sass');
const autoprefixer       = require('autoprefixer');
const postcss            = require('gulp-postcss');

const babel              = require('gulp-babel');
const uglify             = require('gulp-uglify');
const concat             = require('gulp-concat');
const stripdebug         = require('gulp-strip-debug');

const git                = require('gulp-git');
const util               = require('gulp-util');
const sourcemaps         = require('gulp-sourcemaps');

const fs                 = require('fs');
const url                = require('url');
const del                = require('del');
const opn                = require('open');
const path               = require('path');
const bower              = require('bower');
const urllib             = require('urllib');
const gitrev             = require('git-rev-sync');
const inquirer           = require('inquirer');
const runsequence        = require('run-sequence');
const browserSync        = require('browser-sync').create();

const isProduction = () => (gitrev.branch() === 'production') ? true : false;
const isAccountTemplate = file => file.path.indexOf('templates/customers') !== -1;
const addLiquidExtension = path => path.extname += '.liquid';

const postcssPlugins = [
  autoprefixer({ browsers: ['> 2.5% in US', 'ie >= 10', 'Android >= 4.3', 'iOS >= 7'] })
];

const plumberErrorHandler = {
  errorHandler: notify.onError({
    title: '<%= error.plugin %>',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('styles', () => {
  return gulp.src(['styles/*.scss'])
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed', errLogToConsole: true }))
    .pipe(postcss(postcssPlugins))
    .pipe(sourcemaps.write())
    .pipe(size({ showFiles: true }))
    .pipe(gulp.dest(''))
    .pipe(sass({ outputStyle: 'expanded', errLogToConsole: true }))
    .pipe(rename( function (path) {
      path.basename += '-expanded';
    }))
    .pipe(gulp.dest('styles/'));
});

gulp.task('scripts', () => {
  return gulp.src(['js/modules/**/*.js'])
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourcemaps.init())
    // .pipe(gulpif(config.babel, babel({ presets: ['es2015'], plugins: ['transform-remove-strict-mode'] })))
    .pipe(concat('script.js'))
    .pipe(uglify())
    .pipe( sourcemaps.write())
    .pipe(size({ showFiles: true }))
    .pipe(gulp.dest('js/'));
});

gulp.task('build', ['styles', 'scripts']);

gulp.task('watch', ['build'], () => {
  gulp.watch(['styles/**/*.scss'], ['styles']);
  gulp.watch(['js/modules/**/*.js'], ['scripts']);
});

gulp.task('default', ['build', 'watch']);
