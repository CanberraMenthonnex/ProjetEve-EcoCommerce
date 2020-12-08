
const { src, dest, watch, parallel, } = require("gulp")
const browserSync = require('browser-sync').create()
const gulpSass = require("gulp-sass")
const cleanCss = require("gulp-clean-css")
const httpProxy = require("http-proxy")

//SCSS PREPROCESSING
function sass () {
   return src("./public/style/scss/*.scss")
   .pipe(gulpSass())
   .pipe(dest("./public/style/css/"))
   .pipe(cleanCss({debug : true, compatibility : 'ie8'}))
   .pipe(browserSync.stream())
}

//SCSS WATCHER
function sassWatcher() {
    watch("./public/style/scss/**/*.scss", sass)
 
}

//SERVER WATCHER
function browser ()  {
    
    const proxy = httpProxy.createProxyServer({})

    browserSync.init({
        server : {
            proxy:"localhost:80",
            open:true,
            baseDir : "./",
            notify:false,
            middleware : (req, res, next) => {
                proxy.web(req, res, {target : "http://localhost:80/ProjetEve-EcoCommerce/public/"})
            }
        }
    })
    watch("./**/*.php").on("change",browserSync.reload)
}

module.exports = {
    sass,
    sassWatcher, 
    browser : parallel(sassWatcher, browser)
}