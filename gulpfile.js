var gulp = require('gulp');
var notify = require('gulp-notify');
var run = require('gulp-run');
var phpunit = require('gulp-phpunit');

gulp.task('test', function() {
    gulp.src('Tests/**/*.php')
        .pipe(run('clear'))
        .pipe(phpunit('', { notify: true}))
        .on('error', notify.onError({
            title: 'Failed tests',
            message: 'Tests failed',
            icon: __dirname + "/fail_icon.png"
        }))
});

gulp.task('watch', function() {
    gulp.watch(['Tests/**/*.php', 'src/**/*.php'], ['test'])
});

gulp.task('default', ['test', 'watch']);
