const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const terser = require('gulp-terser');
const svgmin = require('gulp-svgmin');
const browserSync = require('browser-sync').create();

const packageFile = require('./package');
const gulppath = require('./gulppath');

const isProductionEnviroment = process.env.NODE_ENV === 'production';

let tasksArr = [];
let taskObjectArr = Object.entries(gulppath.tasks);

for (let key in taskObjectArr) {
  if (taskObjectArr[key][1] !== null) {
    tasksArr.push(taskObjectArr[key][0]);
  }
}

function ltco_styles() {
  let { srcPath, destPath } = gulppath.tasks.ltco_styles;

  return gulp
    .src(srcPath)
    .pipe(sass({
      outputStyle: isProductionEnviroment ? 'compressed' : 'expanded' // expanded / nested / compact / compressed
    }))
    .pipe(autoprefixer())
    .pipe(gulp.dest(destPath))
    .pipe(browserSync.stream())
}

gulp.task('ltco_styles', ltco_styles);

function ltco_scripts() {
  let { srcPath, destPath } = gulppath.tasks.ltco_scripts;

  return gulp
    .src(srcPath, { sourcemaps: true })
    .pipe(terser())
    .pipe(gulp.dest(destPath, { sourcemaps: '.' }))
    .pipe(browserSync.stream())
}

gulp.task('ltco_scripts', ltco_scripts);

function ltco_plugins_styles() {
  let { srcPath, destPath } = gulppath.tasks.ltco_plugins_styles;

  return gulp
    .src(srcPath)
    .pipe(gulp.dest(destPath))
    .pipe(browserSync.stream())
}

gulp.task('ltco_plugins_styles', ltco_plugins_styles);

function ltco_plugins_scripts() {
  let { srcPath, destPath } = gulppath.tasks.ltco_plugins_scripts;

  return gulp
    .src(srcPath)
    .pipe(gulp.dest(destPath))
    .pipe(browserSync.stream())
}

gulp.task('ltco_plugins_scripts', ltco_plugins_scripts);

function ltco_images() {
  let { srcPath, destPath } = gulppath.tasks.ltco_images;

  return gulp
    .src(srcPath)
    .pipe(gulp.dest(destPath))
    .pipe(browserSync.stream())
}

gulp.task('ltco_images', ltco_images);

function ltco_svgs() {
  let { srcPath, destPath } = gulppath.tasks.ltco_svgs;

  return gulp
    .src(srcPath)
    .pipe(svgmin())
    .pipe(gulp.dest(destPath))
    .pipe(browserSync.stream())
}

gulp.task('ltco_svgs', ltco_svgs);

function browser() {
  let browserSyncOptions = gulppath.browserSync;

  if (browserSyncOptions) browserSyncOptions.logPrefix = packageFile.name;

  const isWebProxy = process.env.FILES_ENV === 'true';

  const options = {
    server: {
      baseDir: './public',
      serveStaticOptions: {
        extensions: ['html']
      }
    },
    callbacks: {
      ready: function (_err, bs) {
        bs.addMiddleware("*", function (_req, res) {
          res.writeHead(302, {
            location: "404"
          });

          res.end("Redirecting!");
        });
      }
    }
  };

  browserSync.init(!isWebProxy ? browserSyncOptions : options);
}

gulp.task('browser-sync', browser);

function watch_everyone() {
  let watchPath = gulppath.watch;

  gulp.watch(watchPath.ltco_styles, ltco_styles);

  gulp.watch(watchPath.ltco_scripts, ltco_scripts);

  gulp.watch(watchPath.ltco_images, ltco_images);

  gulp.watch(watchPath.ltco_svgs, ltco_svgs);

  gulp.watch(watchPath.ltco_all).on('change', browserSync.reload);
}

gulp.task('watch_everyone', watch_everyone);

function watch_essentials() {
  let watchPath = gulppath.watch;

  gulp.watch(watchPath.ltco_styles, ltco_styles);

  gulp.watch(watchPath.ltco_scripts, ltco_scripts);
}

gulp.task('watch_essentials', watch_essentials);

gulp.task(
  'server',
  gulp.series(
    gulp.parallel(tasksArr),
    gulp.parallel(
      'watch_everyone',
      'browser-sync'
    )
  )
);

gulp.task(
  'dev',
  gulp.series(
    gulp.parallel(tasksArr),
    gulp.parallel(
      'watch_everyone'
    )
  )
);

gulp.task('default', gulp.parallel(tasksArr));
