import gulp from 'gulp';
import sassModule from 'gulp-sass';
import sassCompiler from 'sass';
import browserSync from 'browser-sync';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import rename from 'gulp-rename';
import changed from 'gulp-changed';

const { src, dest, watch, series } = gulp;
const sass = sassModule(sassCompiler);
const browserSyncInstance = browserSync.create();

// Compile SASS & auto-inject into browsers
function compileSass() {
    return src('scss/**/*.scss') // Changed to include all subdirectories
        .pipe(changed('css'))
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(dest('css'))
        .pipe(browserSyncInstance.stream());
}

// Watch .scss, .js & .php files
function serve() {
    browserSyncInstance.init({
        proxy: "iamchrishurst.local/"
    });

    watch('scss/**/*.scss', compileSass); // Changed to include all subdirectories
    watch(['*.php', 'js/**/*.js']).on('change', browserSyncInstance.reload);
}

// Minify compiled CSS
function minifyCss() {
    return src('css/style.css')
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('dist/css'));
}

// Production build
function buildProd(done) {
    // Add additional tasks like JS minification, image optimization
    // Zip the theme files
    // Exclude unnecessary files
    done();
}

// Expose tasks to CLI
export default serve;
export const sassTask = compileSass;
export const minifyTask = minifyCss;
export const build = series(compileSass, minifyCss, buildProd);
