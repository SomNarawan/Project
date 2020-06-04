<?php
include_once("../dbConnect.php");
include_once("./query.php");
for ($i = 1; $i <= 14; $i++) {
    $sql = "INSERT INTO `servicepoint` (`SPID`, `SPName`) VALUES (NULL, 'servicepoint_$i')";
    // echo   $sql . "<br>";
    addinsertData($sql);
}
