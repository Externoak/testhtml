<?php
ini_set('error_reporting',E_ALL ^ E_NOTICE);
ini_set('display_errors','on');
header("Content-disposition: attachment; filename=pdf.pdf");
header("Content-type: application/pdf");
readfile("pdf.pdf");
?>