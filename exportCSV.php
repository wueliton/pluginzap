<?php
include("includes/autoload.php");

$csvExport = new Includes\CSV\CSV();

//$csvExport->downloadFile(array("21"));

if(isset($_GET['ids'])) {
    $ids = $_GET['ids'];
    $csvExport->downloadFile(array($ids));
}
