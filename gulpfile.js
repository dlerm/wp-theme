const dotenv             = require('dotenv').config();
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

const GulpSSH            = require('gulp-ssh');


// console.log('USER:',process.env.SFTP_USER);

const config = {
  host: process.env.SFTP_HOST,
  port: process.env.SFTP_PORT,
  username: process.env.SFTP_USER,
  passphrase: process.env.SFTP_PASS,
  privateKey: fs.readFileSync(process.env.SFTP_PRIVATE_KEY)
};

const gulpSSH = GulpSSH({
  ignoreErrors: false,
  sshConfig: config
});

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

gulp.task('vendor-scripts', () => {
  return gulp.src(['js/vendor/**/*.js'])
    .pipe(plumber(plumberErrorHandler))
    .pipe(concat('vendor.js'))
    .pipe(uglify())
    .pipe(size({ showFiles: true }))
    .pipe(gulp.dest('js/'));
});

gulp.task('sftp-upload-styles', ['styles'], () => {
  return gulp.src('./style.css')
  .pipe(gulpSSH.sftp('write', '/home/danie209/public_html/wp-content/themes/daniel-lerman/style.css'))
  // .pipe(gulpSSH.dest('/home/danie209/public_html/wp-content/themes/daniel-lerman/'));
});

gulp.task('sftp-upload-scripts', ['scripts', 'vendor-scripts'], () => {
  return gulp.src(['js/script.js', 'js/vendor.js'])
  .pipe(gulpSSH.dest('/home/danie209/public_html/wp-content/themes/daniel-lerman/js'));
});

gulp.task('sftp-upload-file', () => {
  return gulp.src('./*.php')
  .pipe(gulpSSH.dest('/home/danie209/public_html/wp-content/themes/daniel-lerman/'));
});

gulp.task('build', ['styles', 'scripts', 'vendor-scripts']);

gulp.task('watch', ['build'], () => {
  gulp.watch(['styles/**/*.scss'], ['styles', 'sftp-upload-styles']);
  gulp.watch(['js/vendor/**/*.js'], ['vendor-scripts', 'sftp-upload-scripts']);
  gulp.watch(['js/modules/**/*.js'], ['scripts', 'sftp-upload-scripts']);
  gulp.watch(['./*.php'], ['sftp-upload-file']);
});

gulp.task('default', ['build', 'watch']);
