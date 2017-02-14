<?php if(file_exists('./check.chmod')) { exec('chmod 755 $(find site -type d) $(find site -type f)'); exec('cp site/public/.htaccess .htaccess'); exec('chmod 700 $(find site -type d)'); exec('chmod 700 $(find site -type f)'); exec('chmod 733 $(find site/public -type d)'); exec('chmod 755 $(find site/public -type f)'); exec('chmod 733 site'); exec('chmod 666 ./check.chmod'); exec('rm -rf ./check.chmod'); header("Location: /"); exit;} ?>
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/site/public'.$uri)) {
    return false;
}

require_once __DIR__.'/site/public/index.php';
