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
                <button class="btn btn-info" id="btn_add" style="float: right;margin-bottom: 50px;">
                    เพิ่มข้อมูล</button>
                <!-- <a href="./index.php">
                    <button class=" btn-success" id="btn_add"
                        style="float: right;margin-bottom: 50px;margin-right: 20px;"> ย้อนกลับ</button>
                </a> -->
                <table class="table table-bordered table-data  datatables" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ลำดับ</th>
                            <th>รายชื่อยานพาหนะ</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i < count($VEHICLE); $i++) {
                        if($VEHICLE[$i]['statusVehicle'] == "พร้อมใช้งาน"){
                            $colorstatus = 'green';
                        }else{
                            $colorstatus = 'red';
                        }
                        
                        if($VEHICLE[$i]['comment'] == null){
                            $comment = '-';
                        }else{
                            $comment = $VEHICLE[$i]['comment'];
                        }
                        ?>

                    <tr align="center" name="head_table">
                        <td><?php echo $i; ?></th>
                        <td style="text-align: left;"><?php echo $VEHICLE[$i]['VName']; ?></td>
                        <td style="text-align: center;color: <?php echo $colorstatus; ?>;">
                            <?php echo $VEHICLE[$i]['statusVehicle']; ?>
                        </td>
                        <td style="text-align: center;"><?php echo $comment; ?></td>
                        <td>
                            <button type=button" class="btn btn-warning btn-sm btn_edit tt"
                                vid="<?php echo $VEHICLE[$i]['VID']; ?>" vname="<?php echo $VEHICLE[$i]['VName']; ?>"
                                vstatus="<?php echo $VEHICLE[$i]['statusVehicle']; ?>" 
                                vnote="<?php echo $VEHICLE[$i]['comment']; ?>" data-toggle="tooltip"
                                title="แก้ไขข้อมูล">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn_del tt"
                                vid="<?php echo $VEHICLE[$i]['VID']; ?>" vname="<?php echo $VEHICLE[$i]['VName']; ?>"
                                data-toggle="tooltip" title="ลบ">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <?php 
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
                                <input type="text" class="form-control" name="name" required=""
                                    placeholder="กรุณากรอกชื่อยานพาหนะ">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>สถานะ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <input type="radio" name="status" id="status1" required="" value="พร้อมใช้งาน"> พร้อมใช้งาน
                                <input type="radio" style="margin-left:20%" name="status" id="status2" required=""
                                    value="ไม่พร้อมใช้งาน"> ไม้พร้อมใช้งาน
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>หมายเหตุ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <textarea class="form-control" placeholder="หมายเหตุ" name="note" id="note" rows="3" cols="39" ></textarea>
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
                                <input type="text" class="form-control" name="e_name" id="e_name" required=""
                                    placeholder="กรุณากรอกชื่อยานพาหนะ">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>สถานะ</span>
                            </div>
                            <div class="col-xl-5 col-12 Vehiclestatus">
                                <input type="radio" name="e_status" id="e_status1" required="" value="พร้อมใช้งาน">
                                พร้อมใช้งาน
                                <input type="radio" style="margin-left:20%" name="e_status" id="e_status2" required=""
                                    value="ไม่พร้อมใช้งาน"> ไม่พร้อมใช้งาน
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>หมายเหตุ</span>
                            </div>
                            <div class="col-xl-5 col-12">
                                <textarea class="form-control" placeholder="หมายเหตุ" name="e_note" id="e_note" rows="3" cols="39" ></textarea>
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
    $(document).on("click", "#status1", function() {
        console.log('status1');
        $("#note").attr('disabled', 'disabled');
    });
    $(document).on("click", "#status2", function() {
        $("#note").removeAttr('disabled');
    });
    $(document).on("click", "#e_status1", function() {
        $("#e_note").attr('disabled', 'disabled');
    });
    $(document).on("click", "#e_status2", function() {
        $("#e_note").removeAttr('disabled');
    });
    $(document).on("click", ".btn_edit", function() {
        $("#editModal").modal();
        html = `<input type="radio" name="e_status" id="e_status1" required="" value="พร้อมใช้งาน">
                                พร้อมใช้งาน
                                <input type="radio" style="margin-left:20%" name="e_status" id="e_status2" required=""
                                    value="ไม่พร้อมใช้งาน"> ไม่พร้อมใช้งาน`;
        $(".Vehiclestatus").html(html);

        var VID = $(this).attr('vid');
        var VName = $(this).attr('vname');
        var VStatus = $(this).attr('vstatus');
        var VNote = $(this).attr('vnote');

        $("#VID").val(VID);
        $("#e_name").val(VName);
        $("#e_status").val(VStatus);
        console.log('statusVehicle = '+VStatus);
        $("#e_status1").removeAttr("checked");
        $("#e_status2").removeAttr("checked");

        if (VStatus == 'พร้อมใช้งาน') {
        console.log('พร้อม');
            $("#e_status2").removeAttr("checked");
            $("#e_status1").attr("checked", "checked");
            $("#e_note").attr('disabled', 'disabled');
        } else {
            $("#e_status2").attr("checked", "checked");
            $("#e_status1").removeAttr("checked");
            $("#e_note").removeAttr('disabled');
        }
        $("#e_note").val(VNote);
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