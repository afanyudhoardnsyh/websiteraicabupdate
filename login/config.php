<?php
error_reporting(0);
$db_host                = 'localhost'; 
$db_user                = 'root'; 
$db_pass                = ''; 
$db_name                = 'login'; 

$conn                = new mysqli($db_host, $db_user, $db_pass, $db_name);

$urladmin = "http://localhost/websiteraicabupdate/dashboard/";

if (!$conn) {
    echo "Connection Failed";
}