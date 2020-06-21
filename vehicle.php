<?php
include_once("dbConnect.php");
include_once("./query.php");
$VEHICLE = getVehicle();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อยานพาหนะ</title>
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
                    <h2>รายชื่อยานพาหนะ</h2>
                </label>
                <button class="btn btn-info" id="btn_add" style="float: right;margin-bottom: 50px;"> เพิ่มข้อมูล</button>
                <!-- <a href="./index.php">
                    <button class=" btn-success" id="btn_add"
                        style="float: right;margin-bottom: 50px;margin-right: 20px;"> ย้อนกลับ</button>
                </a> -->
                <table class="table table-bordered table-data  datatables" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ลำดับ</th>
                            <th>รายชื่อยานพาหนะ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i < count($VEHICLE); $i++) {
                        echo "  <tr align=\"center\" name=\"head_table\">
                                    <td>$i</td>
                                    <td >{$VEHICLE[$i]['VName']}</td>
                                    <td>
                                        <button type=\"button\" class=\"btn btn-warning btn-sm btn_edit tt\" vid=\"{$VEHICLE[$i]['VID']}\" vname=\"{$VEHICLE[$i]['VName']}\" data-toggle=\"tooltip\" title=\"แก้ไขข้อมูล\" >
                                        <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                        </button>
                                        <button type=\"button\" class=\"btn btn-danger btn-sm  btn_del tt\"  vid=\"{$VEHICLE[$i]['VID']}\" vname=\"{$VEHICLE[$i]['VName']}\"data-toggle=\"tooltip\" title=\"ลบ\" >
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
<div class="modal fade" id="addModal">
    <form action="./manage.php" method="post" id="form-insert">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal bg-success" style="color: white;">
                    <h4 class=" modal-title">เพิ่มรายชื่อ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="addModalBody">
                    <form action="#" method="post">
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>รายชื่อยานพาหนะ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="name" required="" placeholder="กรุณากรอกชื่อยานพาหนะ">
                            </div>
                        </div>

                        <input type="hidden" name="action" value="addvehicle">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-md insertFarm" style="float:right;">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="editModal">
    <form action="./manage.php" method="post" id="form-insert">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal bg-warning" style="color: white;">
                    <h4 class=" modal-title">แก้ไขรายชื่อ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="addModalBody">
                    <form action="#" method="post">
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>รายชื่อยานพาหนะ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="name" id="name" required="" placeholder="กรุณากรอกชื่อยานพาหนะ">
                            </div>
                        </div>
                        <input type="hidden" name="VID" id="VID" value="0">
                        <input type="hidden" name="action" value="editvehicle">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-md insertFarm" style="float:right;">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.tt').tooltip({
            trigger: "hover"
        });
        $('.datatables').DataTable();

        $(document).on("click", "#btn_add", function() {
            $("#addModal").modal();
        });
        $(document).on("click", ".btn_edit", function() {
            var VID = $(this).attr('vid');
            var VName = $(this).attr('vname');
            $("#VID").val(VID);
            $("#name").val(VName);
            $("#editModal").modal();
        });
        $(document).on("click", ".btn_del", function() {
            var VID = $(this).attr('vid');
            var VName = $(this).attr('vname');
            swal({
                    title: "คุณต้องการลบ",
                    text: `ยานพาหนะ ${VName} หรือไม่ ?`,
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
                                delete_1(VID);
                            }
                        });
                    } else {

                    }
                });

        });

        function delete_1(VID) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location = './vehicle.php';
                }
            };
            xhttp.open("POST", "manage.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`VID=${VID}&action=deletevehicle`);
        }
    });
</script>