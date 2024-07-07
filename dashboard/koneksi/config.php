<?php
error_reporting(1);
$db_host                = 'localhost'; 
$db_user                = 'u864185394_raicab'; 
$db_pass                = '=DLwVW/z2n8i'; 
$db_name                = 'u864185394_raicab'; 

$conn                = new mysqli($db_host, $db_user, $db_pass, $db_name);

$urladmin = "websiteraicabnew.test/dashboard/";

if (!$conn) {
    echo "Connection Failed";
}
