
<?php
ini_set('error_reporting',E_ALL ^ E_NOTICE);
ini_set('display_errors','on');

$command = "mysqldump -u dario -h 192.168.8.124 -pdario dbmalaga > /tmp/dbmalaga.sql";
exec($command);

sleep(3);

header("Cache-Control: public");
header("Content-disposition: attachment; filename=dbmalaga.sql");
header("Content-type: application/sql");
readfile("/tmp/dbmalaga.sql");


?>
