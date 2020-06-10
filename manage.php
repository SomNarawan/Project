<?php
include_once("./dbConnect.php");
include_once("./query.php");
$action = $_POST['action'] ?? "";
switch ($action) {
    case "DeleteWorking":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        if ($PID != 0) {
            $sql = "DELETE FROM working WHERE DID = $DID AND SPID =$SPID  AND PID= $PID";
        } else {
            $sql = "DELETE FROM working WHERE `WID`=(SELECT `WID` FROM working WHERE `PID`IS NULL AND DID=$DID  AND`SPID`=$SPID ORDER BY `WID`  LIMIT 1)";
        }
        deletedata($sql);
        break;
    case "InsertWorking":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        if ($PID == 0) {
            $PID = "NULL";
        } else {
            $PID = "'$PID'";
        }
        $sql = "INSERT INTO `working` (`WID`, `DID`, `SPID`, `PID`) VALUES (NULL, '$DID', '$SPID', $PID)";
        addinsertData($sql);
        break;
    case "ClearWorking":
        $sql = "DELETE FROM working ";
        deletedata($sql);
        $sql = "DELETE FROM workingvehicle ";
        deletedata($sql);
        $sql = "DELETE FROM workingoption ";
        deletedata($sql);
        $sql = "UPDATE `vehicle` SET `Status` = 'notuse' ";
        updateData($sql);
        break;
    case "setVehicle":
        $VID = $_POST['VID'] ?? "";
        $status = $_POST['status'] ?? "";
        $sql = "UPDATE `vehicle` SET `Status` = '$status' WHERE `vehicle`.`VID` = $VID";
        updateData($sql);
        break;
    case "getTextSelectName":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        $NAMEPEOPLE = getNamePeople($DID, $SPID, $PID);
        $text = "<option value=\"0\">เลือกชื่อ</option>";
        for ($i = 1; $i < count($NAMEPEOPLE); $i++) {
            $text .= "<option value=\"{$NAMEPEOPLE[$i]['PID']}\" ";
            if ($NAMEPEOPLE[$i]['PID'] == $PID) {
                $text .= " selected ";
            }
            $text .= ">{$NAMEPEOPLE[$i]['Title']} {$NAMEPEOPLE[$i]['FName']} {$NAMEPEOPLE[$i]['LName']} ({$NAMEPEOPLE[$i]['NName']})</option>";
        }
        echo $text;

        break;
    case "getTextSelectVehicle":
        $VID = $_POST['VID'] ?? "";
        $VEHICLE = getVehicle($VID);
        $text = "<option value=\"0\">เลือกรถ</option>";
        for ($i = 1; $i < count($VEHICLE); $i++) {
            $text .= "<option value=\"{$VEHICLE[$i]['VID']}\" ";
            if ($VEHICLE[$i]['VID'] == $VID) {
                $text .= " selected ";
            }
            $text .= ">{$VEHICLE[$i]['VName']}</option>";
        }
        echo $text;

        break;
    case "addpeople":
        $title = $_POST['title'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $alias = $_POST['alias'];
        $service = $_POST['service'];
        print_r($service);
        $sql = "INSERT INTO `people` (`PID`, `Title`, `FName`,`LName`, `NName`) 
        VALUES (NULL, '$title', '$name','$surname', '$alias')";
        echo $sql;
        $PID = addinsertData($sql);

        for($i=0;$i<sizeof($service);$i++){
            $spid = $service[$i];
            print_r($spid);

            $sql = "INSERT INTO `role` (`RID` ,`PID`, `SPID`) 
            VALUES (NULL, '$PID', '$spid')";
            $rid = addinsertData($sql);
        }

        header("location:./people.php");
        break;
    case "editpeople":
        $PID = $_POST['PID'];
        $title = $_POST['e_title'];
        $name = $_POST['e_name'];
        $surname = $_POST['e_surname'];
        $alias = $_POST['e_alias'];
        $service = $_POST['e_service'];
        print_r($service);
        $sql = "UPDATE `people` SET
        `Title` = '$title',
        `FName` = '$name',
        `LName` = '$surname',
        `NName` = '$alias' 
        WHERE PID = '$PID'";
        echo $sql;
        updateData($sql);
        $sql = "DELETE FROM `role` WHERE `PID` = $PID";
        deletedata($sql);
        for($i=0;$i<sizeof($service);$i++){
            $spid = $service[$i];
            print_r($spid);

            $sql = "INSERT INTO `role` (`RID` ,`PID`, `SPID`) 
            VALUES (NULL, '$PID', '$spid')";
            $rid = addinsertData($sql);
        }

        header("location:./people.php");
        break;
    case "deletepeople":
        $PID = $_POST['PID'] ?? "";
        $sql = "DELETE FROM `people` WHERE `people`.`PID` = $PID";
        deletedata($sql);

        break;
    case "addvehicle":
        $name = $_POST['name'] ?? "";
        $sql = "INSERT INTO `vehicle` (`VID`, `VName`, `Status`) VALUES (NULL, '$name', 'notuse')";
        addinsertData($sql);
        header("location:./vehicle.php");
        break;
    case "editvehicle":
        $name = $_POST['name'] ?? "";
        $VID = $_POST['VID'] ?? "";
        $sql = "UPDATE `vehicle` SET `VName` = '$name' WHERE `vehicle`.`VID` = $VID";
        updateData($sql);
        header("location:./vehicle.php");
        break;
    case "deletevehicle":
        $VID = $_POST['VID'] ?? "";
        $sql = "DELETE FROM `vehicle` WHERE `vehicle`.`VID` = $VID";
        deletedata($sql);
        break;
    case "addblankName":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $sql = "INSERT INTO `working` (`WID`, `DID`, `SPID`, `PID`) VALUES (NULL, '$DID', '$SPID', NULL)";
        addinsertData($sql);
        break;
    case "addblankVehicle":
        $DID = $_POST['DID'] ?? "";
        $sql = "INSERT INTO `workingvehicle` (`WVID`, `DID`, `VID`, `PID`) VALUES (NULL, $DID, NULL, NULL)";
        addinsertData($sql);
        break;
    case "DeleteWorkingVehicle":
        $DID = $_POST['DID'] ?? "";
        $VID = $_POST['VID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        if ($VID == 0) {
            $VID = "VID IS NULL";
        } else {
            $VID = "VID = $VID ";
        }
        if ($PID == 0) {
            $PID = "PID IS NULL";
        } else {
            $PID = "PID = $PID ";
        }
        $sql = "DELETE FROM workingvehicle WHERE `WVID`=(SELECT `WVID` FROM workingvehicle WHERE DID = $DID AND $PID AND $VID ORDER BY `WVID`  LIMIT 1)";
        deletedata($sql);
        break;
    case "InsertWorkingVehicle":
        $DID = $_POST['DID'] ?? "";
        $VID = $_POST['VID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        if ($VID == 0) {
            $VID = "NULL";
        } else {
            $VID = "'$VID'";
        }
        if ($PID == 0) {
            $PID = "NULL";
        } else {
            $PID = "'$PID'";
        }
        $sql = "INSERT INTO `workingvehicle` (`WVID`, `DID`, `VID`, `PID`) VALUES (NULL, '$DID', $VID, $PID)";
        deletedata($sql);
        break;
    case "setWorkingOption":
        $DID = $_POST['DID'] ?? "";
        $OSID = $_POST['OSID'] ?? "";
        $type = $_POST['type'] ?? "";
        if ($type == "C") {
            $sql = "INSERT INTO `workingoption` (`WOID`, `DID`, `OSID`) VALUES (NULL, '$DID', '$OSID')";
            addinsertData($sql);
        } else if ($type == "D") {
            $sql = "DELETE FROM `workingoption` WHERE  DID= $DID AND OSID=$OSID";
            deletedata($sql);
        }
        break;
    case "createOperation":
        $date = $_POST['date'] ?? "";
        $num = $_POST['num'] ?? "";
        $sql = "INSERT INTO `operation` (`OID`, `dateOperation`, `numCompany`, `Modify`) VALUES (NULL, '$date', '$num', current_timestamp())";
        $OID = addinsertData($sql);
        echo json_encode($OID);
        break;
    case "createdep_of_opera":
        $valOID = $_POST['valOID'] ?? "";
        $valDID = $_POST['valDID'] ?? "";
        $valcompany = $_POST['valcompany'] ?? "";
        $valprovince = $_POST['valprovince'] ?? "";
        $valtime = $_POST['valtime'] ?? "";
        $valtimeOparetion = $_POST['valtimeOparetion'] ?? "";
        $sql = "INSERT INTO `dep_of_opera` (`DOID`, `OID`, `DID`, `DOName`, `AD1ID`, `TimeStart`, `TimeOperation`)
         VALUES (NULL, '$valOID', '$valDID', '$valcompany', '$valprovince', '$valtime', '$valtimeOparetion')";
        $DOID = addinsertData($sql);
        echo json_encode($DOID);
        break;
    case "createserv_of_dep":
        $DOID = $_POST['DOID'] ?? "";
        $valSPID = $_POST['valSPID'] ?? "";
        $valnumpeople = $_POST['valnumpeople'] ?? "";
        $valnumpoint = $_POST['valnumpoint'] ?? "";
        $valcomment = $_POST['valcomment'] ?? "";
        if ($valcomment == null) {
            $valcomment = "NULL";
        } else {
            $valcomment = "'$valcomment'";
        }

        $sql = "INSERT INTO `serv_of_dep` (`SPDID`, `DOID`, `SPID`, `numPeople`, `numPoint`, `comment`) 
        VALUES (NULL, '$DOID', '$valSPID', '$valnumpeople', '$valnumpoint', $valcomment )";
        $SPDID = addinsertData($sql);
        echo json_encode($SPDID);
        break;
    case "createInfoPeople":
        $ArrayDOID = json_decode($_POST['ArrayDOID'], true);
        $ArraySPDID = json_decode($_POST['ArraySPDID'], true);
        $sql = "SELECT * FROM `working`";
        $INFOWORKING = selectData($sql);
        $sql = "SELECT * FROM `workingvehicle`";
        $INFOWORKINGVEHICLE = selectData($sql);
        $sql = "SELECT * FROM `workingoption`";
        $INFOWORKINGOPTION = selectData($sql);
        for ($i = 1; $i <= $INFOWORKING[0]['numrow']; $i++) {
            if (isset($ArraySPDID[$INFOWORKING[$i]['DID']][$INFOWORKING[$i]['SPID']]) && !empty($ArraySPDID[$INFOWORKING[$i]['DID']][$INFOWORKING[$i]['SPID']])) {
                $SPDID = $ArraySPDID[$INFOWORKING[$i]['DID']][$INFOWORKING[$i]['SPID']];
                if ($INFOWORKING[$i]['PID'] == null) {
                    $PID = "NULL";
                } else {
                    $PID = "'{$INFOWORKING[$i]['PID']}'";
                }
                $sql = "INSERT INTO `detail_serv_of_dep` (`DSPID`, `SPDID`, `PID`) VALUES (NULL, '$SPDID', $PID)";
                addinsertData($sql);
            }
        }
        for ($i = 1; $i <= $INFOWORKINGVEHICLE[0]['numrow']; $i++) {
            if (isset($ArrayDOID[$INFOWORKINGVEHICLE[$i]['DID']]) && !empty($ArrayDOID[$INFOWORKINGVEHICLE[$i]['DID']])) {
                $DOID = $ArrayDOID[$INFOWORKINGVEHICLE[$i]['DID']];
                if ($INFOWORKINGVEHICLE[$i]['PID'] == null) {
                    $PID = "NULL";
                } else {
                    $PID = "'{$INFOWORKINGVEHICLE[$i]['PID']}'";
                }
                if ($INFOWORKINGVEHICLE[$i]['VID'] == null) {
                    $VID = "NULL";
                } else {
                    $VID = "'{$INFOWORKINGVEHICLE[$i]['VID']}'";
                }
                $sql = "INSERT INTO `vehicle_of_dep` (`VDID`, `DOID`, `VID`, `PID`) VALUES (NULL, '$DOID',  $VID, $PID)";
                addinsertData($sql);
            }
        }

        for ($i = 1; $i <= $INFOWORKINGOPTION[0]['numrow']; $i++) {
            if (isset($ArrayDOID[$INFOWORKINGOPTION[$i]['DID']]) && !empty($ArrayDOID[$INFOWORKINGOPTION[$i]['DID']])) {
                $DOID = $ArrayDOID[$INFOWORKINGOPTION[$i]['DID']];
                $OSID = $INFOWORKINGOPTION[$i]['OSID'];
                $sql = "INSERT INTO `option_of_dep` (`ODID`, `DOID`, `OSID`) VALUES (NULL, '$DOID', '$OSID')";
                addinsertData($sql);
            }
        }
        break;
}
