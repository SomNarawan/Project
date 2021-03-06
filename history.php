<?php
include_once("dbConnect.php");
include_once("./query.php");
$HISTORY = getHistory();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการบันทึกข้อมูล</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<body>
    <?php include_once("./header.php"); ?>
    <div class="container-fluid" style="position: absolute; top: 80px;">
        <div align="center" style="margin-top: 20px;">
            <div class="col-xl-8 align-center">
                <label>
                    <h2>ประวัติ </h2>
                </label>

                <table class="table table-bordered table-data  datatables" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ลำดับ</th>
                            <th>วันที่ออกตรวจ</th>
                            <th>ฉบับที่</th>
                            <th>จำนวนบริษัท</th>
                            <th>เวลาที่ทำการบันทึก</th>
                            <th>สถานะ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>

                    <?php
                    for ($i = 1; $i < count($HISTORY); $i++) {
                        if ($HISTORY[$i]['status'] == "ฉบับร่าง") {
                            $color = "red";
                            $btncolor = "btn-success";
                            $btntext = "ยืนยันฉบับจริง";
                            $settext = "ฉบับจริง";
                            $icon = "fa-check-circle ";
                        } else {
                            $color = "green";
                            $btncolor = "btn-danger";
                            $btntext = "ยกเลิกฉบับจริง";
                            $settext = "ฉบับร่าง";
                            $icon = "fa-ban ";
                        }
                        echo "  <tr align=\"center\" name=\"head_table\">
                                    <td>$i</td>
                                    <td >" . date_format(date_create($HISTORY[$i]['dateOperation']), "d/m/Y") . "</td>
                                    <td >{$HISTORY[$i]['noEdit']}</td>
                                    <td >{$HISTORY[$i]['numCompany']}</td>
                                    <td >" . date_format(date_create($HISTORY[$i]['Modify']), "d/m/Y H:i:s") . "</td>
                                    <td style =\"color: $color\">{$HISTORY[$i]['status']}</td>
                                    <td>
                                    <button type=\"button\" class=\"btn $btncolor btn-sm  btn_setstatus tt\"  settext=\"$settext\" oid=\"{$HISTORY[$i]['OID']}\" data-toggle=\"tooltip\" title=\"$btntext\" >
                                    <i class=\"fa $icon\" aria-hidden=\"true\"></i>
                                    </button>
                                    <a  style=\"text-decoration:none\" target=\"_blank\" href=\"./createPDF.php?OID={$HISTORY[$i]['OID']}\">
                                        <button type=\"button\" class=\"btn btn-info btn-sm   tt\"   data-toggle=\"tooltip\" title=\"รายละเอียด\" >
                                        <i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i>
                                        </button>
                                    </a>
                                    <button type=\"button\" class=\"btn btn-danger btn-sm  btn_del tt\"  time=\"" . date_format(date_create($HISTORY[$i]['Modify']), "d/m/Y H:i:s") . "\" oid=\"{$HISTORY[$i]['OID']}\" data-toggle=\"tooltip\" title=\"ลบ\" >
                                    <i class=\"fa fa-trash\" aria-hidden=\"true\"></i>
                                    </button>
                                       
                                    </td>
                                </tr>";
                    }
                    ?>
                </table>

            </div>
        </div>



    </div>
</body>

<script>
    $(document).ready(function() {
        $('.tt').tooltip({
            trigger: "hover"
        });
        $('.datatables').DataTable();

        $(document).on("click", ".btn_del", function() {
            var OID = $(this).attr('oid');
            var TIME = $(this).attr('time');
            swal({
                    title: "คุณต้องการลบ",
                    text: `วันที่บันทึก ${TIME} หรือไม่ ?`,
                    icon: "warning",
                    confirmButtonClass: "btn-danger",
                    cancelButtonClass: "btn-secondary",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("ลบข้อมูลสำเร็จ", {
                            icon: "success",
                        }).then((confirm) => {
                            if (confirm) {
                                delete_1(OID);
                            }
                        });
                    } else {

                    }
                });

        });
        $(document).on("click", ".btn_setstatus", function() {
            var OID = $(this).attr('oid');
            var settext = $(this).attr('settext');
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location = './history.php';
                }
            };
            xhttp.open("POST", "manage.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`OID=${OID}&settext=${settext}&action=setStatus`);

        });

        function delete_1(OID) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location = './history.php';
                }
            };
            xhttp.open("POST", "manage.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`OID=${OID}&action=deletehistory`);
        }
    });
</script>