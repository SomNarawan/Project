<?php
include_once("../dbConnect.php");
//////////////// ดึงข้อมูลรายชื่อทั้งหมด
function getNamePeople()
{
    $DID = $_POST['DID'] ?? "1";
    $SPID = $_POST['SPID'] ?? "0";
    $PID = $_POST['PID'] ?? "0";
    $isJson = $_POST['isJson'] ?? false;
    $sql = "SELECT * FROM `people`  WHERE `people`.`PID` NOT IN (SELECT `working`.`PID` FROM `working` 
    INNER JOIN `servicepoint` ON `servicepoint`.`SPID`=`working`.`SPID`
    WHERE  `working`.`DID` != $DID OR ( `working`.`DID` = $DID AND `servicepoint`.`SPID` = $SPID)) 
     OR  `people`.`PID`=$PID";
    $INFONAME = selectData($sql);
    if ($isJson) {
        echo json_encode($INFONAME);
    }
    return   $INFONAME;
}
