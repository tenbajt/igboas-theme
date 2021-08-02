const { src, dest, parallel, watch } = require('gulp');


function buildSass() {
  const sass = require('gulp-sass');
  const postcss = require('gulp-postcss');

  return src('_dev/sass/*.scss')
    .pipe(sass())
    .pipe(postcss([
      require('autoprefixer'),
      //require('cssnano')
    ]))
    .pipe(dest('./'));
}

exports.buildSass = buildSass;
exports.watchSass = () => {
  watch('_dev/sass/*.scss', buildSass);
};


function buildJavascript() {
  const concat = require('gulp-concat');
  const uglify = require('gulp-uglify');

  return src('_dev/js/**/*.js')
    .pipe(concat('tenbajt.js'))
    .pipe(dest('js'))
}

exports.buildJavascript = buildJavascript;
exports.watchJavascript = () => {
  watch('_dev/js/*.js', buildJavascript);
}


exports.build = parallel(buildSass, buildJavascript)