<?php
include_once("./dbConnect.php");
date_default_timezone_set('Asia/Bangkok');
function getOption($spid)
{
    $sql = "SELECT * FROM `optionservicepoint` WHERE SPID = $spid ";
    $data = selectData($sql);
    return $data;
}
function getAllPeople()
{
    $sql = "SELECT * FROM `people` ORDER BY `people`.`FName` ASC";
    $data = selectData($sql);
    return $data;
}
function getAllParttime()
{
    $sql = "SELECT * FROM `part_time_people` ORDER BY `part_time_people`.`PTFName` ASC";
    $data = selectData($sql);
    return $data;
}
function getAllMedic()
{
    $sql = "SELECT * FROM `medic` ORDER BY `medic`.`MFName` ASC";
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
    as t1 ON t1.`ListPID` = `people`.`PID` ORDER BY `people`.`FName` ASC";
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
function getVehicle()
{
    $sql = "SELECT * FROM `vehicle`
    ORDER BY `vehicle`.`VName`";
    $INFONAME = selectData($sql);
    return   $INFONAME;
}
function getSelVehicle($VID = 0)
{
    $sql = "SELECT * FROM `vehicle`
    WHERE (`vehicle`.`Status` ='notuse' OR `vehicle`.`VID`= $VID ) AND `vehicle`.`statusVehicle` ='พร้อมใช้งาน'
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
    $sql = "SELECT * FROM `operation` ORDER BY `operation`.`dateOperation` DESC,`operation`.`noEdit` DESC";
    $data = selectData($sql);
    return $data;
}
function getReport1($PID = 0, $dateStart = "", $dateEnd = "")
{

    $WHERE = "";
    if ($PID != 0) {
        $WHERE .= " AND `people`.`PID` =$PID ";
    }
    if ($dateStart != "") {
        $WHERE .= " AND `operation`.`dateOperation` >= '$dateStart' ";
    }
    if ($dateEnd != "") {
        $WHERE .= " AND `operation`.`dateOperation` <= '$dateEnd' ";
    }
    $sql = "SELECT `people`.`PID`,`people`.`Title`,`people`.`FName`,`people`.`LName`,`people`.`NName`,`operation`.`dateOperation`,`dep_of_opera`.`DOName`,`servicepoint`.`SPName`,IFNULL(`comment`.`Comment`,'-') as comment
    FROM `detail_serv_of_dep`
    INNER JOIN `people` ON  `detail_serv_of_dep`.`PID` = `people`.`PID`
    INNER JOIN `serv_of_dep` ON `serv_of_dep`.`SPDID` = `detail_serv_of_dep`.`SPDID`
    INNER JOIN `dep_of_opera` ON `dep_of_opera`.`DOID` = `serv_of_dep`.`DOID`
    INNER JOIN `operation` ON `operation`.`OID` =`dep_of_opera`.`OID`
    INNER JOIN `servicepoint` ON `servicepoint`.`SPID` = `serv_of_dep`.`SPID`
    LEFT JOIN `comment` ON `comment`.`PID`=`people`.`PID`AND `comment`.`DOID`= `dep_of_opera`.`DOID`
    WHERE `operation`.`status`='ฉบับจริง'  $WHERE
    ORDER BY `people`.`FName`,`people`.`LName`,`people`.`NName`,`operation`.`dateOperation`,`dep_of_opera`.`DOName`,`servicepoint`.`SPName`";
    $data = selectData($sql);
    return $data;
}
