<?php
include_once("dbConnect.php");
include_once("./query.php");
$OID = $_GET['OID'] ?? "0";
$DOWLOAD = $_GET['DOWLOAD'] ?? "0";
$sql = "SELECT * FROM `operation` WHERE `operation`.`OID` =$OID  ";
$INFOOPERATION = selectDataOne($sql);
$dateoperation = date_format(date_create($INFOOPERATION['dateOperation']), "d/m/Y");
$datemodify = date_format(date_create($INFOOPERATION['Modify']), "d/m/Y H:i:s");
$NameFile = "Operation" . date_format(date_create($INFOOPERATION['Modify']), "Y-m-d") . ".pdf";
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 16,
    'default_font' => 'sarabun'
]);
$mpdf->SetTitle($NameFile);
$htmlHeader = "<style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                   
                </style>";
$htmlHeader .= "<div style=\"text-align: right;font-size: 16px;\">วันที่กำหนดแผนงาน: $datemodify</div>";
$htmlHeader .= "<br><b>วันที่ออกตรวจ:</b> $dateoperation";
$htmlTableHeader = "<br><br><table>
    <tr>
        <th style=\"width: 100px;\">จุดบริการ</th>
        <th style=\"width: 200px;\">รายละเอียด</th>
        <th style=\"width: 50px;\">ยอด<br>พนักงาน</th>
        <th style=\"width: 50px;\">จุด<br>ที่ตรวจ</th>
        <th style=\"width: 250px;\">รายชื่อ</th>
        <th style=\"width: 150px;\">ลงชื่อ</th>
        <th style=\"width: 75px;\">เวลาถึง<br>จุดนัด</th>
        <th style=\"width: 75px;\">เวลากลับ</th>
    </tr>";
$sql = "SELECT * FROM `dep_of_opera` INNER JOIN `province` ON `province`.`AD1ID` =`dep_of_opera`.`AD1ID` WHERE OID=$OID ORDER BY DID  ";
$INFODEPARTMENT = selectData($sql);
for ($i = 1; $i <= $INFODEPARTMENT[0]['numrow']; $i++) {
    $html = $htmlHeader;
    $html .= "  <b>  บริษัท:</b> {$INFODEPARTMENT[$i]['DOName']}";
    $html .= "  <b>จังหวัด:</b> {$INFODEPARTMENT[$i]['Province']}";
    $html .= "<br>  <b>เวลารถออก:</b> {$INFODEPARTMENT[$i]['TimeStart']}  ";
    $html .= "  <b>ช่วงเวลาปฏิบัติงาน:</b> {$INFODEPARTMENT[$i]['TimeOperation']}";
    $html .= $htmlTableHeader;
    $sql = "SELECT * FROM `serv_of_dep` INNER JOIN `servicepoint` ON `servicepoint`.`SPID`=`serv_of_dep`.`SPID`
     WHERE `serv_of_dep`.`DOID`={$INFODEPARTMENT[$i]['DOID']}  ORDER BY `serv_of_dep`.`SPID`";
    $INFOSERVICEPOINT = selectData($sql);
    for ($j = 1; $j <= $INFOSERVICEPOINT[0]['numrow']; $j++) {
        $comment = "";
        if ($INFOSERVICEPOINT[$j]['SPID'] == 2 || $INFOSERVICEPOINT[$j]['SPID'] == 4 || $INFOSERVICEPOINT[$j]['SPID'] == 6 || $INFOSERVICEPOINT[$j]['SPID'] == 13) {
            $comment = "ประเภท: ";
            $sql = "SELECT * FROM `option_of_dep` INNER JOIN `optionservicepoint` ON `optionservicepoint`.`OSID`=`option_of_dep`.`OSID`
                    WHERE `option_of_dep`.`DOID`={$INFODEPARTMENT[$i]['DOID']} AND `optionservicepoint`.`SPID`={$INFOSERVICEPOINT[$j]['SPID']}";
            $INFOOPTION = selectData($sql);
            if ($INFOOPTION[0]['numrow'] == 0) {
                $comment .= "- <br>";
            } else {
                $stringoption = "";
                for ($k = 1; $k <= $INFOOPTION[0]['numrow']; $k++) {
                    $stringoption .= "{$INFOOPTION[$k]['OptionName']} , ";
                }
                $comment .= substr($stringoption, 0, -2) . " <br>";
            }
        }

        if ($INFOSERVICEPOINT[$j]['comment'] == NULL) {
            $comment .= "";
        } else {
            $comment .= "เพิ่มเติม: ";
            $comment .= "{$INFOSERVICEPOINT[$j]['comment']}";
        }
        if ($INFOSERVICEPOINT[$j]['SPID'] != 22) {
            $sql = "SELECT * FROM `detail_serv_of_dep` LEFT JOIN `people` 
            ON `people`.`PID`=`detail_serv_of_dep`.`PID`
            WHERE `detail_serv_of_dep`.`SPDID`={$INFOSERVICEPOINT[$j]['SPDID']} ORDER BY `detail_serv_of_dep`.`PID` DESC";
            $INFOPEOPLE = selectData($sql);
            for ($k = 1; $k <= $INFOPEOPLE[0]['numrow'] || $k <= $INFOSERVICEPOINT[$j]['numPoint']; $k++) {

                if ($k <= $INFOPEOPLE[0]['numrow']) {
                    if ($INFOPEOPLE[$k]['Title'] == NULL) {
                        $name = "-";
                    } else {
                        $name = "{$INFOPEOPLE[$k]['Title']} {$INFOPEOPLE[$k]['FName']} {$INFOPEOPLE[$k]['LName']} ({$INFOPEOPLE[$k]['NName']})";
                    }
                    if ($k == 1) {
                        $html .= "  <tr>
                                        <td style=\"width: 100px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['SPName']}</td>
                                        <td style=\"width: 200px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">$comment</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPeople']}</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPoint']}</td>
                                        <td style=\"width: 250px;\">$name</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    } else {
                        $html .= "  <tr>
                                        <td style=\"width: 250px;\">$name</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    }
                } else {
                    if ($k == 1) {
                        $html .= "  <tr>
                                        <td style=\"width: 100px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['SPName']}</td>
                                        <td style=\"width: 200px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">$comment</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPeople']}</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPoint']}</td>
                                        <td style=\"width: 250px;\">-</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    } else {
                        $html .= "  <tr>
                                        <td style=\"width: 250px;\">-</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    }
                }
            }
        } else {
            $sql = "SELECT * FROM `vehicle_of_dep` 
            LEFT JOIN `vehicle` ON `vehicle`.`VID`=`vehicle_of_dep`.`VID`
            LEFT JOIN `people` ON `people`.`PID` = `vehicle_of_dep`.`PID`
            WHERE `vehicle_of_dep`.`DOID` = {$INFODEPARTMENT[$i]['DOID']} 
            ORDER BY `vehicle_of_dep`.`PID` DESC, `vehicle_of_dep`.`VID` DESC";
            $INFOPEOPLEVEHICLE = selectData($sql);
            $commentcar = "รถ:<br>";
            for ($k = 1; $k <= $INFOPEOPLEVEHICLE[0]['numrow']; $k++) {
                if ($INFOPEOPLEVEHICLE[$k]['VName'] == null) {
                    $carname = "รถเช่า";
                } else {
                    $carname = $INFOPEOPLEVEHICLE[$k]['VName'];
                }
                if ($INFOPEOPLEVEHICLE[$k]['Title'] == NULL) {
                    $name = "(คนนอก)";
                } else {
                    $name = "({$INFOPEOPLEVEHICLE[$k]['NName']})";
                }
                $commentcar .= "$carname $name<br>";
            }
            $commentcar .= $comment;

            for ($k = 1; $k <= $INFOPEOPLEVEHICLE[0]['numrow'] || $k <= $INFOSERVICEPOINT[$j]['numPoint']; $k++) {

                if ($k <= $INFOPEOPLEVEHICLE[0]['numrow']) {
                    if ($INFOPEOPLEVEHICLE[$k]['Title'] == NULL) {
                        $name = "-";
                    } else {
                        $name = "{$INFOPEOPLEVEHICLE[$k]['Title']} {$INFOPEOPLEVEHICLE[$k]['FName']} {$INFOPEOPLEVEHICLE[$k]['LName']} ({$INFOPEOPLEVEHICLE[$k]['NName']})";
                    }
                    if ($INFOPEOPLEVEHICLE[$k]['VName'] == NULL) {
                        $namevehicle = "-";
                    } else {
                        $namevehicle = "{$INFOPEOPLEVEHICLE[$k]['VName']}";
                    }
                    if ($k == 1) {
                        $html .= "  <tr>
                                        <td style=\"width: 100px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['SPName']}</td>
                                        <td style=\"width: 200px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">$commentcar</td>
                                        <td style=\"width: 50px;text-align: center;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">-</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPoint']}</td>
                                        <td style=\"width: 250px;\">$name</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    } else {
                        $html .= "  <tr>
                                        <td style=\"width: 250px;\">$name</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    }
                } else {
                    if ($k == 1) {
                        $html .= "  <tr>
                                        <td style=\"width: 100px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['SPName']}</td>
                                        <td style=\"width: 200px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">$commentcar</td>
                                        <td style=\"width: 50px;text-align: center;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">-</td>
                                        <td style=\"width: 50px;text-align: right;padding-right: 10px;\" rowspan=\"{$INFOSERVICEPOINT[$j]['numPoint']}\">{$INFOSERVICEPOINT[$j]['numPoint']}</td>
                                        <td style=\"width: 250px;\">-</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    } else {
                        $html .= "  <tr>
                                        <td style=\"width: 200px;\">-</td>
                                        <td style=\"width: 250px;\">-</td>
                                        <td style=\"width: 150px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                        <td style=\"width: 75px;\"></td>
                                    </tr>";
                    }
                }
            }
        }
    }
    $sql = "SELECT SUM(`numPoint`) AS num  FROM `serv_of_dep` WHERE `DOID` = {$INFODEPARTMENT[$i]['DOID']} ";
    $NUM2 = selectData($sql);

    $html .= "  <tr>
                    <td style=\"width: 300px;text-align: center;\" colspan=\"3\">ยอดรวม</td>
                    <td style=\"width: 50px;text-align: right;padding-right: 10px;\">{$NUM2[1]['num']}</td>
                    <td style=\"width: 550px;background-color: #444141 ;\" colspan=\"4\"></td>
                </tr>";
    $html .= "</table><br>";
    $html .= "  <table style=\" border: 0px;text-align: center;\">
                    <tr>
                        <td style=\"width: 300px;border: 0px;\">ผู้จัดทำ ..........................................</td>
                        <td style=\"width: 300px;border: 0px;\">ผู้ตรวจสอบ ..........................................</td>
                        <td style=\"width: 300px;border: 0px;\">ผู้อนุมัติ ..........................................</td>
                    </tr>
                    <tr>
                        <td style=\"width: 300px;border: 0px;\"> วันที่ ............/............../..............</td>
                        <td style=\"width: 300px;border: 0px;\"> วันที่ ............/............../..............</td>
                        <td style=\"width: 300px;border: 0px;\"> วันที่ ............/............../..............</td>
                    </tr>
                </table>";

    $mpdf->WriteHTML($html);
    if ($i < $INFODEPARTMENT[0]['numrow']) {
        $mpdf->AddPage();
    }
}
if ($DOWLOAD == "0") {
    $mpdf->Output();
} else {
    $mpdf->Output($NameFile, "D");
}
