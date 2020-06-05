<?php
include_once("./dbConnect.php");
include_once("./query.php");
$action = $_POST['action'] ?? "";
switch ($action) {
    case "DeleteWorking":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        $sql = "DELETE FROM working WHERE DID = $DID AND SPID =$SPID  AND PID= $PID";
        deletedata($sql);
        break;
    case "InsertWorking":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        $sql = "INSERT INTO `working` (`WID`, `DID`, `SPID`, `PID`) VALUES (NULL, '$DID', '$SPID', '$PID')";
        addinsertData($sql);
        break;
    case "ClearWorking":
        $sql = "DELETE FROM working ";
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
        $text = "<option value=\"0\">-</option>";
        for ($i = 1; $i < count($NAMEPEOPLE); $i++) {
            $text .= "<option value=\"{$NAMEPEOPLE[$i]['PID']}\" ";
            if ($NAMEPEOPLE[$i]['PID'] == $PID) {
                $text .= " selected ";
            }
            $text .= ">{$NAMEPEOPLE[$i]['PName']}</option>";
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
}
