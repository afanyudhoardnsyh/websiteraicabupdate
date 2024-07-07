<?php
error_reporting(1);
$db_host                = 'localhost'; 
$db_user                = 'root'; 
$db_pass                = ''; 
$db_name                = 'raicab'; 

$conn                = new mysqli($db_host, $db_user, $db_pass, $db_name);

$urladmin = "websiteraicabnew.test/dashboard/";

if (!$conn) {
    echo "Connection Failed";
}