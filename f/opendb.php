<?PHP
// Filename: opendb.php
// 
//  Make connectiong to the Database
// 
//
// (C)2010 Noel Espinales All Rights Reserved.

$conn = mysql_connect($host, $dbuser, $key) or die (mysql_error());
mysql_select_db($dbname, $conn);

// https://p3smysqladmin01.secureserver.net/p50/261/index.php?uniqueDnsEntry=bbudget.db.4617423.hostedresource.com

?>
