<?php
include_once("../dbConnect.php");
//////////////// ดึงข้อมูลรายชื่อทั้งหมด
function getNamePeople($DID = 1, $SPID = 0, $PID = 0)
{
    $sql = "SELECT * FROM `people` 
    INNER JOIN `role` ON `role`.`PID`=`people`.`PID`   
    WHERE `people`.`PID` NOT IN (SELECT `working`.`PID` FROM `working` 
    INNER JOIN `servicepoint` ON `servicepoint`.`SPID`=`working`.`SPID`                      
    WHERE  (`working`.`DID` != $DID OR ( `working`.`DID` = $DID AND `servicepoint`.`SPID` = $SPID)) 
    OR  `people`.`PID`=$PID) AND `role`.`SPID`=$SPID ORDER BY FName";
    $INFONAME = selectData($sql);
    return   $INFONAME;
}
function getVehicle($VID = 0)
{
    $sql = "SELECT * FROM `vehicle`
    WHERE `vehicle`.`Status` ='notuse' OR `vehicle`.`VID`= $VID
    ORDER BY `vehicle`.`VName`";
    $INFONAME = selectData($sql);
    return   $INFONAME;
}
