<?php
session_start();
$PID = $_POST['IDPeople'];
$dateStart = $_POST['date1'];
$dateEnd = $_POST['date2'];
$_SESSION['IDPeople'] = $_POST['IDPeople'];
$_SESSION['date1'] = $_POST['date1'];
$_SESSION['date2'] = $_POST['date2'];
include_once("dbConnect.php");
include_once("./query.php");
$DATA = getReport1($PID, $dateStart, $dateEnd);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style><br><br>
<form method="post" action="export.php">&emsp;&emsp;&emsp;
     <input type="submit" id="export" name="export" class="btn btn-success" value="Export" />
    </form><br>
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