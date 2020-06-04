<?php
include_once("../dbConnect.php");
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
        deletedata($sql);
        break;
    case "ClearWorking":
        $sql = "DELETE FROM working ";
        deletedata($sql);
        break;
    case "getTextSelect":
        $DID = $_POST['DID'] ?? "";
        $SPID = $_POST['SPID'] ?? "";
        $PID = $_POST['PID'] ?? "";
        $NAMEPEOPLE = getNamePeople($DID, $SPID, $PID);
        $text = "<option value=\"0\">เลือกรายชื่อ</option>";
        for ($i = 1; $i < count($NAMEPEOPLE); $i++) {
            $text .= "<option value=\"{$NAMEPEOPLE[$i]['PID']}\" ";
            if ($NAMEPEOPLE[$i]['PID'] == $PID) {
                $text .= " selected ";
            }
            $text .= ">{$NAMEPEOPLE[$i]['PName']}</option>";
        }
        echo $text;

        break;
}
