
const { src, dest, watch, parallel, } = require("gulp")
const browserSync = require('browser-sync').create()
const gulpSass = require("gulp-sass")
const cleanCss = require("gulp-clean-css")
const httpProxy = require("http-proxy")
const concat = require('gulp-concat')
const minify = require('gulp-minify')

const bundleConfig = require('./bundle.config')
require('dotenv').config()

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
            middleware : (req, res) => {
                proxy.web(req, res, {target : process.env.SITE_ROOT})
            }
        }
    })
    watch("./**/*.php").on("change",browserSync.reload)
}

//BUNDLE JS 
function bundleJs () {
    return Promise.all(  bundleConfig.bundles.map((bundle => {

            return src([...bundle.vendor,...bundle.scripts])
            .pipe(concat(`${bundle.name}.js`))
            // .pipe(minify())
            .pipe(dest('./public/js/dist'))
    })))
    
}

//WATCH BUNDLE JS 
function watchBundleJs() {
    watch('./public/js/src/**/*.js', bundleJs)
}

module.exports = {
    sass,
    sassWatcher, 
    browser : parallel(sassWatcher, watchBundleJs , browser),
    bundle: bundleJs,
    "bundle-watch" : watchBundleJs
}