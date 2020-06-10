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
        $name = $_POST['name'] ?? "";
        $sql = "INSERT INTO `people` (`PID`, `PName`) VALUES (NULL, '$name')";
        addinsertData($sql);
        header("location:./people.php");
        break;
    case "editpeople":
        $name = $_POST['name'] ?? "";
        $PID = $_POST['PID'] ?? "";
        $sql = "UPDATE `people` SET `PName` = '$name' WHERE `people`.`PID` = $PID";
        updateData($sql);
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
}
