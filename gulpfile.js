"use strict";

const gulp = require('gulp');
const nunjucks = require('gulp-nunjucks');


var getPaths = function() {
    const paths = {
      staticTemplates: 'resources/views/staticTemplates/**/*.njk',
      dynamicTemplates: 'resources/views/dynamicTemplates/**/*.njk',
    };
  
    return paths;
  };


  // Static Nunjucks task
gulp.task('nunjucks-static', function() {
    return gulp.src(getPaths().staticTemplates)
      .pipe(nunjucks.compile())
      .pipe(gulp.dest('resources/views'));
  });
  
  // Dynamic Nunjucks task
  gulp.task('nunjucks-dynamic', function() {
    return gulp.src(getPaths().dynamicTemplates)
      .pipe(nunjucks.compile())
      .pipe(gulp.dest('resources/views'));
  });

  // Combine Nunjucks tasks into a single task
gulp.task('nunjucks', gulp.parallel('nunjucks-static', 'nunjucks-dynamic'));

// Default task
gulp.task('default', gulp.series('nunjucks'));