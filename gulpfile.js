const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const pot = require('gulp-wp-pot');
const zip = require('gulp-zip');
const browserSync = require('browser-sync').create();
const fs = require('fs');
const packageJson = require('./package.json');

// Paths
const paths = {
    images: 'assets/images/**/*',
    php: ['**/*.php', '!node_modules/**/*.php'],
    dist: {
        images: 'assets/images'
    }
};

// BrowserSync
function browserSyncInit() {
    browserSync.init({
        proxy: process.env.WP_HOME || 'http://localhost:10000',
        files: [
            './**/*.php',
            './assets/js/dist/*.js',
            './assets/css/*.css'
        ],
        injectChanges: true,
        notify: false,
        open: false
    });
}

// Image optimization
function optimizeImages() {
    return gulp.src(paths.images)
        .pipe(imagemin())
        .pipe(gulp.dest(paths.dist.images))
        .pipe(browserSync.stream());
}

// Generate POT file
function generatePot() {
    return gulp.src(paths.php)
        .pipe(pot({
            domain: 'wptsp',
            package: 'WordPress Theme Starter Pack'
        }))
        .pipe(gulp.dest('languages/wptsp.pot'));
}

// Version sync
function syncVersion() {
    const version = packageJson.version;
    
    // Update style.css
    const styleContent = `/*
Theme Name:   WordPress Theme Starter Pack
Theme URI:    https://your-website.com
Author:       Your Name
Author URI:   https://your-website.com
Version:      ${version}
Text Domain:  wptsp
*/`;
    fs.promises.writeFile('style.css', styleContent);

    // Update theme.json if it exists
    try {
        const themeJson = require('./theme.json');
        themeJson.version = version;
        fs.promises.writeFile('theme.json', JSON.stringify(themeJson, null, 2));
    } catch (e) {
        // theme.json doesn't exist, that's fine
    }
}

// Create theme zip
function createZip() {
    const themeName = 'wptsp';
    const version = packageJson.version;
    const outputName = `${themeName}-${version}.zip`;

    return gulp.src([
        '**/*',
        '!node_modules/**',
        '!assets/js/src/**',
        '!assets/scss/**',
        '!gulpfile.js',
        '!package.json',
        '!package-lock.json',
        '!.git/**',
        '!.gitignore',
        '!scripts/**',
        '!webpack.config.js',
        '!CHANGELOG.md'
    ])
    .pipe(zip(outputName))
    .pipe(gulp.dest('./'));
}

// Watch task
function watch() {
    gulp.watch(paths.images, optimizeImages);
    gulp.watch(paths.php, generatePot);
}

// Export tasks
exports.images = optimizeImages;
exports.pot = generatePot;
exports.zip = createZip;
exports['version-sync'] = syncVersion;
exports.watch = watch;
exports.browserSync = browserSyncInit;

// Default task
exports.default = gulp.series(
    gulp.parallel(optimizeImages, generatePot),
    gulp.parallel(watch, browserSyncInit)
);

// Build task
exports.build = gulp.series(
    gulp.parallel(optimizeImages, generatePot)
); 