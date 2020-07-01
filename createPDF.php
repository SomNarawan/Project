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
$status = "";
if ($INFOOPERATION['status'] == "ฉบับร่าง") {
    $status = "( ฉบับร่าง )";
}
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 16,
    'default_font' => 'sarabun',
    'setAutoTopMargin' => 'stretch',
    'setAutoBottomMargin' => 'stretch'
]);

$mpdf->SetHTMLHeader('
                            <div>
                                <img  src="./img/logo1.jpg" width="250px"/>
                                <img  style="padding-left: 250px;" src="./img/logo2.jpg" width="150px"/>
                            </div>', 'O', false);
$mpdf->SetHTMLFooter('<div style="float:right">วันที่ประกาศใช้ 10/7/2563 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ISO9001:2015  FM-MU-02/1</div>', 'O', false);
$mpdf->SetTitle($NameFile);
$htmlHeader = "<style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                </style>";
$htmlHeader .= "<div style=\"text-align: center;font-size: 20px;\"><b>แผนการปฏิบัติการหน่วยแพทย์เคลื่อนที่ $status</b></div><br>";
$htmlHeader .= "<div style=\"text-align: right;font-size: 16px;\">ฉบับที่ {$INFOOPERATION['noEdit']} จัดทำแผนงานวันที่: $datemodify</div>";
$htmlTableHeader = "<br><table>
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
    $html .= "<table style=\" border: 0px;font-size:24px\">
                    <tr>
                        <td style=\"width: 300px;border: 0px;\"><b>CCN:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['CCN']}</td>
                        <td style=\"width: 300px;border: 0px;\" colspan=\"2\"><b>บริษัท:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['DOName']}</td>
                        <td style=\"width: 300px;border: 0px;\"><b>รอบ:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['round']}</td>
                    </tr>
                    <tr>
                        <td style=\"width: 300px;border: 0px;\"><b>วันที่ออกตรวจ:</b>&nbsp;&nbsp;$dateoperation</td>
                        <td style=\"width: 300px;border: 0px;\" colspan=\"2\"><b>ช่วงเวลาปฏิบัติงาน:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['TimeOperation']}</td>
                        <td style=\"width: 300px;border: 0px;\"><b>จังหวัด:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['Province']}</td>
                    </tr>
                    <tr>
                        <td style=\"width: 300px;border: 0px;\"><b>วันที่เดินทาง:</b>&nbsp;&nbsp;" . date_format(date_create($INFODEPARTMENT[$i]['travelDate']), "d/m/Y") . "</td>
                        <td style=\"width: 300px;border: 0px;\" colspan=\"2\"><b>เวลารถออก:</b>&nbsp;&nbsp;{$INFODEPARTMENT[$i]['TimeStart']}</td>
                        <td style=\"width: 300px;border: 0px;\" ><b>สถานที่พัก:&nbsp;&nbsp;</b>............................................................</td>
                    </tr>
                <tr>
                    <td style=\"width: 300px;border: 0px;\"><b>เงินทดลองจ่าย:</b>&nbsp;&nbsp;" . number_format($INFODEPARTMENT[$i]['advances'], 0, '.', ',') . " บาท</td>
                    <td style=\"width: 300px;border: 0px;\" colspan=\"3\"><b>เงินคงเหลือ:&nbsp;&nbsp;</b>................................ บาท</td></td>
            </tr>
                </table>";


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
    $html .= "<b>หมายเหตุ :</b> {$INFODEPARTMENT[$i]['note']} <br><br>";
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
