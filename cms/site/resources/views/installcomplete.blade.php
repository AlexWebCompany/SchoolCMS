<?php
if (config('app.sqluncomplete')==false) {header("Location: /"); exit;}
Artisan::call('config:clear');
Artisan::call('migrate',[
    '--force' => true,
]);
$txt =("<?php
\$sqlcomplete=true;
?>");
$file=fopen(__DIR__.'/../../../config/sqlcomplete.php', "w");
fwrite($file, $txt);
fclose($file);
if (file_exists(__DIR__.'/../../../bootstrap/cache/config.php')) {Artisan::call('config:clear');}
header('refresh: 0; url=/'); ?> 
