<?php
include_once("dbConnect.php");
include_once("./query.php");
$PEOPLE = getNamePeople();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <div class="container-fluid" style="position: absolute; top: 20px;">


        <div align="center" style="margin-top: 20px;">
            <div class="col-xl-8 align-center">
                <label>
                    <h2>รายชื่อเจ้าหน้าที่</h2>
                </label>
                <button class=" btn-info" id="btn_add" style="float: right;margin-bottom: 50px;"> เพิ่มข้อมูล</button>
                <a href="./index.php">
                    <button class=" btn-success" id="btn_add" style="float: right;margin-bottom: 50px;margin-right: 20px;"> ย้อนกลับ</button>
                </a>
                <table class="table table-bordered table-data  " style="height: 500px;float: center;" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ลำดับ</th>
                            <th>รายชื่อ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i < count($PEOPLE); $i++) {
                        echo "  <tr align=\"center\" name=\"head_table\">
                                    <th>$i</th>
                                    <th >{$PEOPLE[$i]['PName']}</th>
                                    <th>
                                        <button type=\"button\" class=\"btn btn-warning btn-sm btn_edit tt\" pid=\"{$PEOPLE[$i]['PID']}\" pname=\"{$PEOPLE[$i]['PName']}\" data-toggle=\"tooltip\" title=\"แก้ไขข้อมูล\" >
                                        <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                        </button>
                                        <button type=\"button\" class=\"btn btn-danger btn-sm  btn_del tt\"  pid=\"{$PEOPLE[$i]['PID']}\" pname=\"{$PEOPLE[$i]['PName']}\"data-toggle=\"tooltip\" title=\"ลบ\" >
                                        <i class=\"fa fa-trash\" aria-hidden=\"true\"></i>
                                        </button>
                                    </th>
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
                                <span>รายชื่อเจ้าหน้าที่</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="name" required="" placeholder="กรุณากรอกชื่อรายชื่อเจ้าหน้าที่">
                            </div>
                        </div>

                        <input type="hidden" name="action" value="addpeople">
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
                                <span>รายชื่อเจ้าหน้าที่</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="name" id="name" required="" placeholder="กรุณากรอกชื่อรายชื่อเจ้าหน้าที่">
                            </div>
                        </div>
                        <input type="hidden" name="PID" id="PID" value="0">
                        <input type="hidden" name="action" value="editpeople">
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

        $(document).on("click", "#btn_add", function() {
            $("#addModal").modal();
        });
        $(document).on("click", ".btn_edit", function() {
            var PID = $(this).attr('pid');
            var PName = $(this).attr('pname');
            $("#PID").val(PID);
            $("#name").val(PName);
            $("#editModal").modal();
        });
        $(document).on("click", ".btn_del", function() {
            var PID = $(this).attr('pid');
            var PName = $(this).attr('pname');
            swal({
                    title: "คุณต้องการลบ",
                    text: `คุณ ${PName} หรือไม่ ?`,
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
                                delete_1(PID);
                            }
                        });
                    } else {

                    }
                });

        });

        function delete_1(PID) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location = './people.php';
                }
            };
            xhttp.open("POST", "manage.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`PID=${PID}&action=deletepeople`);
        }
    });
</script>