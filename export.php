<?php  
//export.php  
session_start();

$strExcelFileName="Report.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

$PID = $_SESSION['IDPeople'];
$dateStart = $_SESSION['date1'];
$dateEnd = $_SESSION['date2'];
include_once("dbConnect.php");
include_once("./query.php");
$DATA = getReport1($_SESSION['IDPeople'], $_SESSION['date1'], $_SESSION['date2']);
?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<form method="post" action="export.php">
     <input type="submit" id="export" name="export" class="btn btn-success" value="Export" />
    </form><br><br><br>
<table align="center">
    <tr style="text-align: center;">
        <th style="width: 100px;">ลำดับ</th>
        <th style="width: 150px;">คำนำหน้า</th>
        <th style="width: 300px;">ชื่อ - นามสกุล</th>
        <th style="width: 150px;">ชื่อเล่น</th>
        <th style="width: 300px;">วันที่ออกปฏิบัติการ</th>
        <th style="width: 300px;">บริษัท</th>
        <th style="width: 200px;">จุดบริการ</th>
        <th style="width: 200px;">ความคิดเห็น</th>
    </tr>
    <?php
    for ($i = 1; $i < count($DATA); $i++) {
        $date = date_format(date_create($DATA[$i]['dateOperation']), "d/m/Y");
        echo "  <tr>
                    <td style=\"text-align: center;\">$i</td>
                    <td>{$DATA[$i]['Title']}</td>
                    <td>{$DATA[$i]['FName']} {$DATA[$i]['LName']}</td>
                    <td>{$DATA[$i]['NName']}</td>
                    <td style=\"text-align: center;\">$date</td>
                    <td>{$DATA[$i]['DOName']}</td>
                    <td>{$DATA[$i]['SPName']}</td>
                    <td style=\"text-align: center;\">{$DATA[$i]['comment']}</td>
                </tr>";
    }
    ?>
</table>