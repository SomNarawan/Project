<?php
include_once("./dbConnect.php");
date_default_timezone_set('Asia/Bangkok');
function getOption($spid)
{
    $sql = "SELECT * FROM `optionservicepoint` WHERE SPID = $spid";
    $data = selectData($sql);
    return $data;
}
function getAllPeople()
{
    $sql = "SELECT * FROM `people`";
    $data = selectData($sql);
    return $data;
}
function getServicepoint()
{
    $sql = "SELECT * FROM `servicepoint` WHERE SPID != 15 AND
    SPID != 16 AND SPID != 21";
    $data = selectData($sql);
    return $data;
}
function getAllServicepoint()
{
    $sql = "SELECT * FROM `servicepoint`";
    $data = selectData($sql);
    return $data;
}
function getRoleByPID($pid)
{
    $sql = "SELECT * FROM role
    JOIN servicepoint ON role.SPID = servicepoint.SPID
    WHERE role.PID = '$pid'";
    $DATA = selectData($sql);
    return   $DATA;
}
function getPeople()
{
    $date = date("Y-m-d");
    $sql = "SELECT `people`.* ,IF( t1.`ListPID` IS NULL ,'ว่าง','ออกหน่วย')  AS status
    FROM `people` LEFT JOIN (SELECT DISTINCT(`detail_serv_of_dep`.`PID`) AS ListPID 
    FROM `detail_serv_of_dep` LEFT JOIN `serv_of_dep` ON `serv_of_dep`.`SPDID` = `detail_serv_of_dep`.`SPDID`
    LEFT JOIN `dep_of_opera` ON `dep_of_opera`.`DOID` = `serv_of_dep`.`DOID` 
    LEFT JOIN `operation` ON `operation`.`OID` = `dep_of_opera`.`OID` 
    WHERE `operation`.`dateOperation` = '$date' AND `detail_serv_of_dep`.`PID`IS NOT NULL) 
    as t1 ON t1.`ListPID` = `people`.`PID` ORDER BY `people`.`PID` ASC";
    $DATA = selectData($sql);
    return   $DATA;
}
//////////////// ดึงข้อมูลรายชื่อทั้งหมด
function getNamePeople($DID = 1, $SPID = 0, $PID = 0)
{
    $sql = "SELECT * FROM `people` 
    INNER JOIN `role` ON `role`.`PID`=`people`.`PID`   
    WHERE (`people`.`PID` NOT IN (SELECT `working`.`PID` FROM `working` 
    INNER JOIN `servicepoint` ON `servicepoint`.`SPID`=`working`.`SPID`                      
    WHERE `working`.`PID` IS NOT NULL AND (`working`.`DID` != $DID OR ( `working`.`DID` = $DID AND `servicepoint`.`SPID` =$SPID))) 
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
function selectProvince()
{
    $sql = "SELECT * FROM `province`  
        ORDER BY `province`.`Province` ASC";
    $data = selectData($sql);
    return $data;
}
function selectServicepoint()
{
    $sql = "SELECT * FROM `servicepoint` WHERE SPID != 15 AND
    SPID != 16 AND SPID != 21";
    $data = selectData($sql);
    return $data;
}
function getHistory()
{
    $sql = "SELECT * FROM `operation` ORDER BY `operation`.`Modify` DESC";
    $data = selectData($sql);
    return $data;
}
