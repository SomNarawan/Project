<?php
include_once("dbConnect.php");
include_once("./query.php");
$PEOPLE = getPeople();
$SERVICEPOINT = getServicepoint();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อเจ้าหน้าที่</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="./index.php">หน้าหลัก</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./people.php">เพิ่มเจ้าหน้าที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vehicle.php">เพิ่มยานพาหนะ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./history.php">ประวัติ</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid" style="position: absolute; top: 80px;">
        <div align="center" style="margin-top: 20px;">
            <div class="col-xl-8 align-center">
                <label>
                    <h2>รายชื่อเจ้าหน้าที่</h2>
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
                            <th style="width: 15%;">ชื่อเล่น</th>
                            <th>จุดบริการ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php
                    for ($i = 1; $i < count($PEOPLE); $i++) {
                        $ROLE = getRoleByPID($PEOPLE[$i]['PID']);
                    ?>
                        <tr align="center" name="head_table">
                            <td><?php echo $i; ?></th>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['Title']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['FName']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['LName']; ?></td>
                            <td style="text-align: left;"><?php echo $PEOPLE[$i]['NName']; ?></td>
                            <td style="text-align: left;">
                                <ul>
                                    <?php for ($j = 1; $j <= $ROLE[0]['numrow']; $j++) {
                                        echo "<li class='role" . $PEOPLE[$i]['PID'] . "'>" . $ROLE[$j]['SPName'] . "</li>";
                                    } ?>
                                </ul>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn_edit tt" pid="<?php echo $PEOPLE[$i]['PID']; ?>" ptitle="<?php echo $PEOPLE[$i]['Title']; ?>" name="<?php echo $PEOPLE[$i]['FName']; ?>" surname="<?php echo $PEOPLE[$i]['LName']; ?>" alias="<?php echo $PEOPLE[$i]['NName']; ?>" role="" data-toggle="tooltip" title="แก้ไขข้อมูล">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn_del tt" pid="<?php echo $PEOPLE[$i]['PID']; ?>" pname="<?php echo $PEOPLE[$i]['PName']; ?>" data-toggle="tooltip" title="ลบ">
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
                                <input type="radio" name="title" required=""> นาย
                                <input type="radio" style="margin-left:20%" name="title" required=""> นาง
                                <input type="radio" style="margin-left:20%" name="title" required=""> นางสาว
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

                            <?php for ($i = 1; $i <= $SERVICEPOINT[0]['numrow']; $i += 2) { ?>
                                <div class="col-xl-4 col-12 text-right">
                                    <?php
                                    if ($i == 1) {
                                    ?>
                                        <span>จุดบริการ</span>
                                    <?php } else { ?>
                                        <span></span>
                                    <?php } ?>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <input type="checkbox" name="<?php echo $SERVICEPOINT[$i]['SPName']; ?>">
                                            <label for=""><?php echo $SERVICEPOINT[$i]['SPName']; ?></label>
                                        </div>
                                        <?php if ($i + 1 <= $SERVICEPOINT[0]['numrow']) { ?>
                                            <div class="col-xl-6 col-6">
                                                <input type="checkbox" name="<?php echo $SERVICEPOINT[$i + 1]['SPName']; ?>">
                                                <label for=""><?php echo $SERVICEPOINT[$i + 1]['SPName']; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

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
                                <span>คำนำหน้า</span>
                            </div>
                            <div class="col-xl-5 col-12" id="set_title" name="set_title">
                                <input type="radio" name="title" id="title1" required=""> นาย
                                <input type="radio" style="margin-left:20%" id="title2" name="title" required=""> นาง
                                <input type="radio" style="margin-left:20%" id="title3" name="title" required=""> นางสาว
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

                            <?php for ($i = 1; $i <= $SERVICEPOINT[0]['numrow']; $i += 2) { ?>
                                <div class="col-xl-4 col-12 text-right">
                                    <?php
                                    if ($i == 1) {
                                    ?>
                                        <span>จุดบริการ</span>
                                    <?php } else { ?>
                                        <span></span>
                                    <?php } ?>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <input id="e_role<?php echo $SERVICEPOINT[$i]['SPID']; ?>" type="checkbox" name="<?php echo $SERVICEPOINT[$i]['SPName']; ?>">
                                            <label for=""><?php echo $SERVICEPOINT[$i]['SPName']; ?></label>
                                        </div>
                                        <?php if ($i + 1 <= $SERVICEPOINT[0]['numrow']) { ?>
                                            <div class="col-xl-6 col-6">
                                                <input id="e_role<?php echo $SERVICEPOINT[$i]['SPID']; ?>" type="checkbox" name="<?php echo $SERVICEPOINT[$i + 1]['SPName']; ?>">
                                                <label for=""><?php echo $SERVICEPOINT[$i + 1]['SPName']; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

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
        $('.datatables').DataTable();

        $(document).on("click", "#btn_add", function() {
            $("#addModal").modal();
        });
        $(document).on("click", ".btn_edit", function() {
            var PID = $(this).attr('pid');
            var title = $(this).attr('ptitle');
            var name = $(this).attr('name');
            var surname = $(this).attr('surname');
            var alias = $(this).attr('alias');

            $("#PID").val(PID);
            $("#e_name").val(name);
            $("#e_surname").val(surname);
            $("#e_alias").val(alias);

            console.log(title);
            if (title == 'นาย') {
                $('#title1').attr("checked", "checked");
            } else if (title == 'นาง') {
                $('#title2').attr("checked", "checked");
            } else {
                $('#title3').attr("checked", "checked");
            }

            array_role = $('.role' + PID);
            console.log(array_role);
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