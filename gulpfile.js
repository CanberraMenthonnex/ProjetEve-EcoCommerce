
const { src, dest, watch, parallel } = require("gulp")

const browserSync = require('browser-sync').create()

const gulpSass = require("gulp-sass")

const cleanCss = require("gulp-clean-css")

//SCSS PREPROCESSING
function sass () {
   return src("./style/scss/*.scss")
   .pipe(gulpSass())
   .pipe(dest("./style/css/"))
   .pipe(cleanCss({debug : true, compatibility : 'ie8'}))
   .pipe(browserSync.stream())
}

//SCSS WATCHER
function sassWatcher() {
    watch("./style/scss/**/*.scss", sass)
 
}

//SERVER WATCHER
function browser ()  {
    browserSync.init({
        server : {
            baseDir : "./"
        }
    })
   watch("./*.html").on("change",browserSync.reload)
}

module.exports = {
    sass,
    sassWatcher, 
    browser : parallel(sassWatcher, browser)
}