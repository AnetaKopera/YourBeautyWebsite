<?php

// localhost website and localhost database
$localHostSiteFolderName = "yourbeauty";

$localhostDatabaseName = "yourbeauty";
$localHostDatabaseHostAddress = "localhost";
$localHostDatabaseUserName = "root";
$localHostDatabasePassword = "";



//online version
$serverWebsiteName = "";

$serverDatabaseName = "";
$serverDatabaseHostAddress = "";
$serverDatabaseUserName = "";
$serverDatabasePassword = "";




$useLocalHost = true;


if ($useLocalHost == true)
{
    $siteName = "http://localhost/" . $localHostSiteFolderName;
    $dbName = $localhostDatabaseName;
    $dbHost = $localHostDatabaseHostAddress;
    $dbUsername = $localHostDatabaseUserName;
    $dbPassword = $localHostDatabasePassword;
}
else
{
    $siteName = $serverWebsiteName;
    $dbName = $serverDatabaseName;
    $dbHost = $serverDatabaseHostAddress;
    $dbUsername = $serverDatabaseUserName;
    $dbPassword = $serverDatabasePassword;
}



chmod("configuration.php", 0600);
?>