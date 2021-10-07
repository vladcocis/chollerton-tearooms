<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find out more</title>
</head>
<body>


<?php
include 'database_conn.php';

$forename = isset($_REQUEST['custForename']) ? $_REQUEST['custForename'] : null;
$surname = isset($_REQUEST['custSurname']) ? $_REQUEST['custSurname'] : null;
$email = isset($_REQUEST['custEmail']) ? $_REQUEST['custEmail'] : null;
$landline = isset($_REQUEST['custLandline']) ? $_REQUEST['custLandline'] : null;
$phone = isset($_REQUEST['custNumber']) ? $_REQUEST['custNumber'] : null;
$address = isset($_REQUEST['custAddress']) ? $_REQUEST['custAddress'] : null;
$info = isset($_REQUEST['info']) ? $_REQUEST['info'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;

$sql = "INSERT INTO CT_expressedInterest (expressInterestID, forename, surname, postalAddress, 
                                            landlineTelNo, mobileTelNo, email, sendMethod, catID) VALUES 
(NULL,'$forename','$surname','$address', '$landline', '$phone', '$email', '$info' , '$category');";

$queryResult = $dbConn->query($sql);
?>
</body>
</html>