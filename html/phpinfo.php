<?php

    $sdip = gethostbyname("localhost");
    $sddomain = gethostbyaddr($sdip);
    print "IP: $sdip\n";
    print "Domain: $sddomain\n";

?>