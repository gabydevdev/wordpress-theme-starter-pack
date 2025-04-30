const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const fs = require("fs");
const packageJson = require("./package.json");

// Paths
const paths = {
  images: "assets/images/**/*",
  dist: {
    images: "assets/images",
  },
};

// BrowserSync
function browserSyncInit() {
  browserSync.init({
    proxy: process.env.WP_HOME || "http://localhost:10000",
    files: ["./**/*.php", "./assets/js/dist/*.js", "./assets/css/*.css"],
    injectChanges: true,
    notify: false,
    open: false,
  });
}

// Image optimization
async function optimizeImages() {
  const imagemin = (await import("gulp-imagemin")).default;
  return gulp
    .src(paths.images)
    .pipe(imagemin())
    .pipe(gulp.dest(paths.dist.images))
    .pipe(browserSync.stream());
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
  fs.promises.writeFile("style.css", styleContent);

  // Update theme.json if it exists
  try {
    const themeJson = require("./theme.json");
    themeJson.version = version;
    fs.promises.writeFile("theme.json", JSON.stringify(themeJson, null, 2));
  } catch (e) {
    // theme.json doesn't exist, that's fine
  }
}

// Create theme zip
async function createZip() {
  const themeName = "wptsp";
  const version = packageJson.version;
  const outputName = `${themeName}-${version}.zip`;
  const zip = (await import("gulp-zip")).default;

  return gulp
    .src([
      "**/*",
      "!node_modules/**",
      "!assets/js/src/**",
      "!assets/scss/**",
      "!gulpfile.js",
      "!package.json",
      "!package-lock.json",
      "!.git/**",
      "!.gitignore",
      "!scripts/**",
      "!webpack.config.js",
      "!CHANGELOG.md",
    ])
    .pipe(zip(outputName))
    .pipe(gulp.dest("./"));
}

// Watch task
function watch() {
  gulp.watch(paths.images, optimizeImages);
}

// Export tasks
exports.images = optimizeImages;
exports.zip = createZip;
exports["version-sync"] = syncVersion;
exports.watch = watch;
exports.browserSync = browserSyncInit;

// Default task (development)
exports.default = gulp.parallel(watch, browserSyncInit);

// Build task
exports.build = gulp.series(optimizeImages);
