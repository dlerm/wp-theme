const dotenv  = require('dotenv').config();
const gulp    = require('gulp');
const watch    = require('gulp-watch');
const ftp    = require('vinyl-ftp');
const logger = require('gulplog');

const { SFTP_HOST, SFTP_USER, SFTP_PASS, SFTP_THEME_PATH } = process.env

const config = {
  host: SFTP_HOST,
  user: SFTP_USER,
  password: SFTP_PASS,
  parallel: 8,
  log: logger.info,
};

gulp.task('deploy', () => {
  return gulp.src('dist/**/*')
  .pipe(conn.dest(SFTP_THEME_PATH));
});

gulp.task('deploy:watch', function (done) {
  const conn = ftp.create(config);
  watch('dist/**/*')
    .pipe(conn.dest(SFTP_THEME_PATH));
  done();
});