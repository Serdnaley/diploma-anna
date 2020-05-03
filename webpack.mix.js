const mix = require('laravel-mix');
const fs = require('fs');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

if (Mix.isWatching()) {
    let fires = 0;
    let tempString = "\n//temp";
    let filename = 'resources/sass/app.scss';
    mix.then((stats) => {
        if (fires === 0) {
            fs.appendFile(filename, tempString, function (err) {
                if (err) throw err;
                console.log('Added temp string to force recompiling');
            });
            fs.readFile(filename, 'utf8', function (err, data) {
                if (err) throw err;
                let newData = data.replace(tempString, '');
                fs.writeFile(filename, newData, function (err) {
                    if (err) throw err;
                    console.log('Removed temp string');
                });
            });
        }
        fires++;
    })
}
