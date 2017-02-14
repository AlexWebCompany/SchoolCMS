<?php
if (config('app.install')!=true) {header("Location: /"); exit;}
$installtrue='false';
function getconfig($var) {
if(config('app.getpost')==false) {
if(isset($_GET[$var])) {
return($_GET[$var]);
}
} else {
if(isset($_POST[$var])) {
return($_POST[$var]);
}
}
}
print_r(trans('config.wait'));
if(getconfig('debug')=='') {$debugcms="false";} else {$debugcms="true";}
$txt =("<?php
\$langcms = array (
'ru' => '".getconfig('runame')."',
'en' => '".getconfig('enname')."',
);
\$configcms = array (
'where' => '".config('view.configpaths')."',
'compiled' => '".config('view.configcompiled')."',
'name' => '".getconfig('namesite')."',
'url' => '".getconfig('url_site')."',
'time' => '".getconfig('utc')."',
'lang' => '".getconfig('lang')."',
'debug' => ".$debugcms.",
'cache' => false,
'getpost' => false,
'install' => ".$installtrue.",
'key' => '".config('app.key')."',
);
\$sqlcms = array (
'driver' => '".getconfig('sql')."',
);
\$mysqlcms = array (
'host' => '".getconfig('mysqlhost')."',
'port' => '".getconfig('mysqlport')."',
'database' => '".getconfig('mysqlbase')."',
'username' => '".getconfig('mysqluser')."',
'password' => '".getconfig('mysqlpass')."',
'charset' => '".config('database.connections.mysql.charset')."',
'collation' => '".config('database.connections.mysql.collation')."',
'prefix' => '".getconfig('mysqlprefix')."',
);
\$pgsqlcms = array (
'host' => '".getconfig('pgsqlhost')."',
'port' => '".getconfig('pgsqlport')."',
'database' => '".getconfig('pgsqlbase')."',
'username' => '".getconfig('pgsqluser')."',
'password' => '".getconfig('pgsqlpass')."',
'charset' => '".config('database.connections.pgsql.charset')."',
'prefix' => '".getconfig('pgsqlprefix')."',
'schema' => '".config('database.connections.pgsql.schema')."',
'sslmode' => '".config('database.connections.pgsql.sslmode')."',
);
\$sqlitecms = array (
'database' => '".getconfig('sqlitebase')."',
'prefix' => '".getconfig('sqliteprefix')."',
);
?>");
$file=fopen(__DIR__.'/../../../../config.php', "w");
fwrite($file, $txt);
fclose($file);
if(file_exists(__DIR__.'/../../../.env')) {unlink(__DIR__.'/../../../.env');}
header('refresh: 3; url=/install/complete');
?>