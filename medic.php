<?php
include_once("dbConnect.php");
include_once("./query.php");
$PEOPLE = getAllMedic();
$SERVICEPOINT = getServicepoint();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อแพทย์</title>
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
                    <h2>รายชื่อแพทย์</h2>
                </label>
                <button class="btn btn-info" id="btn_add" style="float: right;margin-bottom: 50px;">
                    เพิ่มข้อมูล</button>

                <table class="table table-bordered table-data  datatables" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 5%;">ลำดับ</th>
                            <th style="width: 15%;">คำนำหน้า</th>
                            <th style="width: 15%;">ชื่อ</th>
                            <th style="width: 15%;">นามสกุล</th>
                            <th style="width: 13%;">ชื่อเล่น</th>
                            <th style="width: 13%;">สถานะ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i < count($PEOPLE); $i++) {
                        if ($PEOPLE[$i]['status'] == "ดี") {
                            $colorstatus = "green";
                        } else if ($PEOPLE[$i]['status'] == "พอใช้") {
                            $colorstatus = "gray";
                        } else {
                            $colorstatus = "red";
                        }
                    ?>
                        <tr align="center" name="head_table">
                            <td><?php echo $i; ?></th>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['Title']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['MFName']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['MLName']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['MNName']; ?></td>
                            <td style="text-align: center;color: <?php echo $colorstatus; ?>;">
                                <?php echo $PEOPLE[$i]['status']; ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm btn_comment tt" role="" pid="<?php echo $PEOPLE[$i]['MID']; ?>" data-toggle="tooltip" title="ความคิดเห็น">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm btn_edit tt" mid="<?php echo $PEOPLE[$i]['MID']; ?>" 
                                ptitle="<?php echo $PEOPLE[$i]['Title']; ?>" name="<?php echo $PEOPLE[$i]['MFName']; ?>" 
                                surname="<?php echo $PEOPLE[$i]['MLName']; ?>" status="<?php echo $PEOPLE[$i]['status']; ?>" 
                                alias="<?php echo $PEOPLE[$i]['MNName']; ?>" role="" data-toggle="tooltip" title="แก้ไขข้อมูล">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn_del tt" mid="<?php echo $PEOPLE[$i]['MID']; ?>" 
                                ptitle="<?php echo $PEOPLE[$i]['Title']; ?>" name="<?php echo $PEOPLE[$i]['MFName']; ?>" 
                                surname="<?php echo $PEOPLE[$i]['MLName']; ?>" alias="<?php echo $PEOPLE[$i]['MNName']; ?>" 
                                data-toggle="tooltip" title="ลบ">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>

                    <?php } ?>
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
                                <span>คำนำหน้า</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="radio" name="title" required="" value="นายแพทย์"> นายแพทย์
                                <input type="radio" style="margin-left:20%" name="title" required="" 
                                value="แพทย์หญิง"> แพทย์หญิง
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>ชื่อ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="name" required="" placeholder="กรุณากรอกชื่อ">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>นามสกุล</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="surname" required="" placeholder="กรุณากรอกนามสกุล">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>ชื่อเล่น</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="alias" required="" placeholder="กรุณากรอกชื่อเล่น">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>สถานะ</span>
                            </div>
                            <div class="col-xl-5 col-12">

                                <input type="radio" name="status" required="" value="ดี"> ดี
                                <input type="radio" style="margin-left:20%" name="status" required="" value="พอใช้"> พอใช้
                                <input type="radio" style="margin-left:20%" name="status" required="" value="blacklist">
                                blacklist
                            </div>

                        </div>
                        <input type="hidden" name="action" value="addmedic">
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
                                <span>คำนำหน้า</span>
                            </div>
                            <div class="col-xl-5 col-12" id="set_title" name="set_title">
                                <input type="radio" name="e_title" id="title1" required="" value="นายแพทย์"> นายแพทย์
                                <input type="radio" style="margin-left:20%" id="title2" name="e_title" required="" value="แพทย์หญิง"> แพทย์หญิง
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>ชื่อ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="e_name" id="e_name" required="" placeholder="กรุณากรอกชื่อ">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>นามสกุล</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="e_surname" id="e_surname" required="" placeholder="กรุณากรอกนามสกุล">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>ชื่อเล่น</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="text" class="form-control" name="e_alias" id="e_alias" required="" placeholder="กรุณากรอกชื่อเล่น">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>สถานะ</span>
                            </div>
                            <div class="col-xl-5 col-12">

                                <input type="radio" name="e_status" id="e_status1" required="" value="ดี"> ดี
                                <input type="radio" style="margin-left:20%" name="e_status" id="e_status2" required="" value="พอใช้"> พอใช้
                                <input type="radio" style="margin-left:20%" name="e_status" id="e_status3" required="" value="blacklist">
                                blacklist
                            </div>

                        </div>

                        <input type="hidden" name="MID" id="MID" value="0">
                        <input type="hidden" name="action" value="editmedic">
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
<div class="modal fade" id="commentModal">
    <form action="./manage.php" method="post" id="form-comment">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 70%;">
            <div class="modal-content">


                <div class="modal-header header-modal bg-info" style="color: white;">
                    <h4 class=" modal-title">ความคิดเห็น</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-1  text-right">
                            <span>บริษัท</span>
                        </div>
                        <div class="col-xl-4 ">
                            <select name="DOID" class="form-control" id="DOID">

                            </select>
                        </div>
                        <div class="col-xl-2  text-right">
                            <span>ความคิดเห็น</span>
                        </div>
                        <div class="col-xl-4 ">
                            <input type="text" class="form-control" name="comment" id="comment" required="" placeholder="กรอกความคิดเห็น">
                            <input type="hidden" id="PIDcomment" value="0">
                        </div>
                        <div class="col-xl-1 text-right">
                            <button type="button" class="btn btn-success btn-add-comment">เพิ่ม</button>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-12 ">
                            <table class="table table-bordered table-data " cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <th style="width: 10%;">ลำดับ</th>
                                        <th style="width: 20%;">วันที่ออกหน่วย</th>
                                        <th style="width: 20%;">บริษัท</th>
                                        <th style="width: 40%;">ความคิดเห็น</th>
                                        <th style="width: 10%;">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody id="DataTableComment">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
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
        $(document).on("click", ".btn_del_com", function() {
            let cid = $(this).attr("cid");
            let pid = $("#PIDcomment").val();
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {
                    cid: cid,
                    action: "DeleteComment"
                },
                async: false,
                success: function(result) {
                    setTableComment(pid);
                }
            });
        });

        $(document).on("click", ".btn_comment", function() {
            let pid = $(this).attr('pid');

            setTableComment(pid);
            setSelectComment(pid);
            $("#PIDcomment").val(pid);
            $("#commentModal").modal();

        });
        $(document).on("click", ".btn-add-comment", function() {
            let DOID = $("#DOID").val();
            let comment = $("#comment").val();
            let pid = $("#PIDcomment").val();

            if (DOID > 0 && comment != "") {
                console.log("pass");
                AddComment(DOID, pid, comment, "P");
                setTableComment(pid);
                $('.tt').tooltip({
                    trigger: "hover"
                });
            }
        });
        $('.datatables').DataTable();

        $(document).on("click", "#btn_add", function() {
            $("#addModal").modal();
        });
        $(document).on("click", ".btn_edit", function() {
            var MID = $(this).attr('mid');
            var title = $(this).attr('ptitle');
            var name = $(this).attr('name');
            var surname = $(this).attr('surname');
            var alias = $(this).attr('alias');
            var status = $(this).attr('status');

            $("#MID").val(MID);
            $("#e_name").val(name);
            $("#e_surname").val(surname);
            $("#e_alias").val(alias);
            $("#e_status").val(status);
            if (status == 'ดี') {
                $('#e_status1').attr("checked", "checked");
            } else if (status == 'พอใช้') {
                $('#e_status2').attr("checked", "checked");
            } else {
                $('#e_status3').attr("checked", "checked");
            }

            console.log(title);
            if (title == 'นายแพทย์') {
                $('#title1').attr("checked", "checked");
            } else {
                $('#title2').attr("checked", "checked");
            } 

            $("#editModal").modal();

        });
        $(document).on("click", ".btn_del", function() {
            var MID = $(this).attr('mid');
            var title = $(this).attr('ptitle');
            var name = $(this).attr('name');
            var surname = $(this).attr('surname');
            var alias = $(this).attr('alias');
            swal({
                    title: "คุณต้องการลบ",
                    text: `${title} ${name} ${surname} (${alias}) หรือไม่ ?`,
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
                                delete_1(MID);
                            }
                        });
                    } else {

                    }
                });

        });

        function delete_1(MID) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location = './medic.php';
                }
            };
            xhttp.open("POST", "manage.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`MID=${MID}&action=deletemedic`);
        }

        function setTableComment(pid) {
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {
                    pid: pid,
                    Type: "P",
                    action: "setTableComment"
                },
                async: false,
                success: function(result) {
                    $("#DataTableComment").empty();
                    $("#DataTableComment").html(result);
                }
            });
        }

        function setSelectComment(pid) {
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {
                    pid: pid,
                    Type: "P",
                    action: "setSelectComment"
                },
                async: false,
                success: function(result) {
                    console.log(result);
                    $("#DOID").empty();
                    $("#DOID").html(result);
                }
            });
        }

        function AddComment(DOID, pid, comment, type) {
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {
                    DOID: DOID,
                    pid: pid,
                    comment: comment,
                    Type: type,
                    action: "AddComment"
                },
                async: false,
                success: function(result) {
                    $("#DOID").val(0);
                    $("#comment").val("");
                }
            });
        }
    });
</script>