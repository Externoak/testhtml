<?php
ini_set('error_reporting',E_ALL ^ E_NOTICE);
ini_set('display_errors','on');

function download_pdf($pdf_url, $pdf_file){
    $fp = fopen ($pdf_file, 'w+');
    
    $ch = curl_init($pdf_url);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_exec($ch);
    
    
    curl_close($ch);
    fclose($fp);

}

download_pdf ("http://locahost/php/curlpdf.php", "/var/www/html/php/TablaPeriodica.pdf");

header("Cache-Control: public");
header("Content-disposition: attachment; filename=TablaPeriodica.pdf");
header("Content-type: application/pdf");
readfile("TablaPeriodica.pdf");
?>