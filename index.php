<?php
include_once("dbConnect.php");
include_once("./query.php");
$comp = 1;
$date = "";
$time = "";
$carout = "";
$company = "";
$province = 0;
$PROVINCE = selectProvince();
$SERVICE = selectServicepoint();
$PEOPLE = getNamePeople();
$VEHICLE = getVehicle();
if (isset($_POST["num_company"])) {
    $comp = $_POST["num_company"];
}
if (isset($_POST["date"])) {
    $date = $_POST["date"];
}
if (isset($_POST["time"])) {
    $time = $_POST["time"];
}
if (isset($_POST["carout"])) {
    $carout = $_POST["carout"];
}
if (isset($_POST["company"])) {
    $company = $_POST["company"];
}
if (isset($_POST["province"])) {
    $province = $_POST["province"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางการออกหน่วย</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"></script> -->


    <style>
    i.fa {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;
    }

    .set-button {
        background: #FFFFFF;
        border: 0px;
    }

    .border-table {
        border-width: 3px;
        border-color: black;
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="position: absolute; top: 20px;">
        <div class="row">
            <div class="col-lg-10">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="form-inline col-lg-4">
                            <label style="width:100px">วันที่ตรวจ</label>
                            <input name="date" class="form-control" style="width:250px" type="date"
                                value="<?php echo $date; ?>">
                        </div>
                        <div class="form-inline col-lg-4">
                            <label style="width:100px">เวลาตรวจ</label>
                            <input name="time" class="form-control" style="width:180px" type="time"
                                value="<?php echo $time; ?>">
                        </div>
                        <div class="form-inline col-lg-4">
                            <label style="width:100px">เวลารถออก</label>
                            <input name="carout" class="form-control" style="width:180px" type="time"
                                value="<?php echo $carout; ?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-inline col-lg-4">
                            <label style="width:100px">ชื่อบริษัท</label>
                            <input name="company" class="form-control" style="width:250px" type="text"
                                placeholder="กรอกชื่อบริษัท" value="<?php echo $company; ?>">
                        </div>
                        <div class="form-inline col-lg-4">
                            <label style="width:100px">จังหวัด</label>
                            <select style="width:180px" class="form-control chosen" name="province" id="province">
                                <option value="0">เลือกจังหวัด</option>
                                <?php for ($i = 1; $i <= $PROVINCE[0]['numrow']; $i++) { ?>
                                <option value="<?php echo $PROVINCE[$i]['AD1ID']; ?>"
                                    <?php if($province == $PROVINCE[$i]['AD1ID']){?> selected <?php } ?>>
                                    <?php echo $PROVINCE[$i]['Province']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-inline col-lg-4">

                            <label style="width:100px">จำนวนหน่วย</label>
                            <input class="form-control" id="num_company" name="num_company" style="width:90px"
                                type="number" min=1 max=6 value="<?php echo $comp; ?>" required>
                            <button type="submit" class="btn btn-success" id="ok" name="ok"
                                style="width:90px">ตกลง</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-info" style="width:100%; height:100%">ยืนยันข้อมูล</button>
            </div>
        </div>
        <?php if ($comp > 3) { ?>
        <div class="row form-inline" style="margin-top: 20px;">
            <div align="right" class="col-lg-6">
                <button class="form-control btn-warning" id="btnswitch1">หน่วยที่ 1 - 3</button>
            </div>
            <div class="col-lg-6">
                <button class="form-control btn-warning" id="btnswitch2">หน่วยที่
                    4<?php if ($comp > 4) echo " - " . $comp; ?></button>
            </div>
        </div>
        <?php } ?>
        <div align="center" style="margin-top: 20px;">
            <table class="table-bordered border-table">
                <!-- Head Table -->
                <tr align="center" id="head_table" name="head_table">
                    <th style="border-bottom-width:3px; border-bottom-color: black;">ลำดับ</th>
                    <th style="border-width:3px; border-color: black;">จุดบริการ</th>
                    <?php for ($k = 0; $k < $comp; $k++) {
                        if ($k < 3) {
                            $num = "1";
                        } else {
                            $num = "2";
                        }

                    ?>
                    <th class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;">จุดที่ตรวจ
                    </th>
                    <th class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;">ยอดพนักงาน
                    </th>
                    <th class="show<?= $num ?>"
                        style="border-bottom-width:3px; border-bottom-color: black; border-right-width:3px; border-right-color: black;">
                        <label>หน่วยที่ <?php echo $k + 1; ?></label>
                        <input style="font-weight: bold;" class="form-control" placeholder="กรอกชื่อบริษัท" type="text"
                            style="width:400px">
                        <div class="form-inline">
                            <input class="form-control" type="time" style="width:200px; font-weight: bold;">
                            <select class="form-control" name="province" id="province" required
                                style="width:200px; font-weight: bold;">
                                <option value="0">เลือกจังหวัด</option>
                                <?php for ($i = 1; $i < $PROVINCE[0]['numrow']; $i++) { ?>
                                <option value="<?php echo $PROVINCE[$i]['AD1ID']; ?>">
                                    <?php echo $PROVINCE[$i]['Province']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </th>
                    <?php } ?>
                </tr>
                <!-- Body Table -->
                <?php
                for ($i = 1; $i <= $SERVICE[0]['numrow']; $i++) { ?>
                <tr>
                    <td align="center" style="border-bottom-width:3px; border-bottom-color: black; font-weight: bold;">
                        <?php echo $i; ?></td>
                    <td style="border-width:3px; border-color: black; font-weight: bold;">

                        <?php echo $SERVICE[$i]['SPName']; ?>
                    </td>
                    <?php for ($k = 0; $k < $comp; $k++) {
                            if ($k < 3) {
                                $num = "1";
                            } else {
                                $num = "2";
                            } ?>
                    <td class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;"><input
                            class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <td class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;"><input
                            class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <!-- if -->
                    <td class="show<?= $num ?>" id="col<?php echo $k; ?>row<?php echo $i; ?>"
                        style="border-bottom-width:3px; border-bottom-color: black; border-right-width:3px; border-right-color: black;">
                        <div class="form-inline">
                            <?php if ($SERVICE[$i]['SPID'] == 13) { ?>
                            <select class="form-control slecetName" DID="<?= $k + 1 ?>"
                                SPID="<?= $SERVICE[$i]['SPID'] ?>" PID="0" required style="width:150px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <select class="form-control" required style="width:150px;">
                                <option value="0">-</option>
                                <option value="1">B</option>
                                <option value="2">S</option>
                                <option value="3">D</option>
                            </select>
                            <!-- else if -->
                            <?php } else if ($SERVICE[$i]['SPID'] == 16) { ?>
                            <select class="form-control slecetVehicle" VID="0" required style="width:200px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $VEHICLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $VEHICLE[$j]['VID']; ?>">
                                    <?php echo $VEHICLE[$j]['VName']; ?>
                                </option>
                                <?php } ?>
                            </select>

                            <select class="form-control slecetName" DID="<?= $k + 1 ?>"
                                SPID="<?= $SERVICE[$i]['SPID'] ?>" PID="0" required style="width:100px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <!-- else -->
                            <?php } else { ?>
                            <select class="form-control slecetName" DID="<?= $k + 1 ?>"
                                SPID="<?= $SERVICE[$i]['SPID'] ?>" PID="0" required style="width:300px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                            <button col="<?php echo $k; ?>" row="<?php echo $i; ?>"
                                check="<?php echo $SERVICE[$i]['SPID']; ?>" class="set-button btn-plus"><i
                                    class="fa fa-plus" style="background: #28a745;"></i></button>
                        </div>
                        <input class="form-control" placeholder="เพิ่มเติม"
                            id="note-col<?php echo $k; ?>row<?php echo $i; ?>" type="text" style="width:300px">
                    </td>

                    <?php } ?>
                    <!-- for add -->
                    <div hidden id="else">
                        <!-- <div class="form-inline add_name"> -->
                        <select class="form-control slecetName" DID="<?= $k + 1 ?>" SPID="<?= $SERVICE[$i]['SPID'] ?>"
                            PID="0" required style="width:300px;">
                            <option value="0">-</option>
                            <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                            <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                <?php echo $PEOPLE[$j]['PName']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div hidden id="vehicle">
                        <!-- <div class="form-inline add_name"> -->

                        <select class="form-control slecetVehicle" VID="0" required style="width:200px;">
                            <option value="0">-</option>
                            <?php for ($j = 1; $j < $VEHICLE[0]['numrow']; $j++) { ?>
                            <option value="<?php echo $VEHICLE[$j]['VID']; ?>">
                                <?php echo $VEHICLE[$j]['VName']; ?>
                            </option>
                            <?php } ?>
                        </select>

                        <select class="form-control slecetName" DID="<?= $k + 1 ?>" SPID="<?= $SERVICE[$i]['SPID'] ?>"
                            PID="0" required style="width:100px;">
                            <option value="0">-</option>
                            <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                            <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                <?php echo $PEOPLE[$j]['PName']; ?>
                            </option>
                            <?php } ?>
                        </select>

                        <!-- </div> -->

                    </div>
                    <div hidden id="x-ray">
                        <!-- <div class="form-inline add_name"> -->

                        <select class="form-control slecetName" DID="<?= $k + 1 ?>" SPID="<?= $SERVICE[$i]['SPID'] ?>"
                            PID="0" required style="width:150px;">
                            <option value="0">-</option>
                            <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                            <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                <?php echo $PEOPLE[$j]['PName']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <select class="form-control" required style="width:150px;">
                            <option value="0">-</option>
                            <option value="1">B</option>
                            <option value="2">S</option>
                            <option value="3">D</option>
                        </select>

                        <!-- </div> -->

                    </div>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div>
            <br>
        </div>
    </div>

</body>

</html>
<script src="./main.js"></script>