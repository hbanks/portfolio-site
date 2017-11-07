var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

// here we define the list of things to happen when we run gulp styles
gulp.task('styles', function(){
	gulp.src('wp-content/themes/theme-hackeryou/*.scss')
		.pipe(sass({
			errLogToConsole: true
			}))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('wp-content/themes/theme-hackeryou/'))
}); 

gulp.task('default', function(){
	gulp.watch('wp-content/themes/theme-hackeryou/*.scss', ['styles']);
});