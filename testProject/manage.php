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
        $sql = "DELETE FROM working WHERE DID = $DID AND SPID =$SPID  AND PID= $PID";
        deletedata($sql);
        break;
}
