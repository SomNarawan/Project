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

    <!-- Select2 CSS -->
    <link href="./css/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="./css/select2/style-select2.css" rel="stylesheet" type="text/css">
    <script src="./js/select2/select2.min.js"></script>

    <style>
    i.fa {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;
    }

    .add-remove {
        background: #FFFFFF;
        border: 0px;
    }

    .border-table {
        border-width: 3px;
        border-color: black;
    }

    .set-margin {
        margin-left: 30px;
    }

    .form-control {
        color: #212529;
        /* font-weight: bold; */
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        color: #212529;
        /* font-weight: bold; */
    }

    span.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #212529;
        line-height: 25px;
        /* font-weight: bold; */
    }
    </style>
</head>

<body>
    <div class="set-button">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="./index.php"">หน้าหลัก</a>
            <ul class=" navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./people.php">เพิ่มเจ้าหน้าที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vehicle.php">เพิ่มยานพาหนะ</a>
                </li>
                </ul>
        </nav>
    </div>

    <div class="container-fluid body-web" style="position: absolute; top: 80px;">

        <div class="row" style="text-align: center;">
            <div class="col-lg-10">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="form-inline" style="margin-left: 34%;">
                            <label style="width:100px; font-weight: bold;">วันที่ตรวจ</label>
                            <input name="date" class="form-control" style="width:250px;" type="date"
                                value="<?php echo $date; ?>">
                        </div>
                        <div class="form-inline set-button" style="margin-left: 6%;">
                            <label style="width:100px; font-weight: bold;">จำนวนหน่วย</label>
                            <input class="form-control" id="num_company" name="num_company" style="width:90px"
                                type="number" min=1 max=6 value="<?php echo $comp; ?>" required>
                            <button type="submit" class="btn btn-success" id="ok" name="ok"
                                style="width:90px">ตกลง</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2">
                <button type="button" class="close" aria-label="Close" hidden>
                    <span aria-hidden="true">&times;</span>
                </button>
                <button class="btn btn-info set-button" id="submit-data"
                    style="width:100%; height:100%">ยืนยันข้อมูล</button>
            </div>
        </div>
        <?php if ($comp > 2) { ?>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 row form-inline" style="margin-top: 20px;">
                <div <?php if($comp < 5) echo "class='col-lg-6' align='right'"; else echo "class='col-lg-4'"; ?>>
                    <button class="form-control btn-warning set-button" id="btnswitch1">หน่วยที่ 1 - 2</button>
                </div>
                <div <?php if($comp < 5) echo "class='col-lg-6'"; else echo "class='col-lg-4'"; ?>>
                    <button class="form-control btn-warning set-button" id="btnswitch2">หน่วยที่
                        3<?php if ($comp > 3) echo " - 4"; ?></button>
                </div>
                <?php if($comp > 4){ ?>
                <div class="col-lg-4">
                    <button class="form-control btn-warning set-button" id="btnswitch3">หน่วยที่
                        5<?php if ($comp > 5) echo " - 6"; ?></button>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <div align="center" style="margin-top: 20px;">
            <table class="table-bordered border-table">
                <!-- Head Table -->
                <tr align="center" id="head_table" name="head_table">
                    <th style="border-width:3px; border-color: black;">จุดบริการ</th>
                    <?php for ($k = 0; $k < $comp; $k++) {
                        if ($k < 2) {
                            $num = "1";
                        }else if($k < 4) {
                            $num = "2";
                        }else{
                            $num = "3";
                        }

                    ?>
                    <th class="show<?= $num ?>"
                        style="font-weight: bold; border-bottom-width:3px; border-bottom-color: black;">ยอดพนักงาน
                    </th>
                    <th class="show<?= $num ?>"
                        style="font-weight: bold; border-bottom-width:3px; border-bottom-color: black;">จุดที่ตรวจ
                    </th>
                    <th class="show<?= $num ?>"
                        style="font-weight: bold; border-bottom-width:3px; border-bottom-color: black; border-right-width:3px; border-right-color: black;">
                        <label>หน่วยที่ <?php echo $k + 1; ?></label>
                        <input class="form-control th-company" placeholder="กรอกชื่อบริษัท" type="text"
                            style="width:455px; font-weight: bold;">
                        <div class="form-inline">
                            <input class="form-control th-time" type="text" placeholder="กรอกเวลาออกรถ"
                                style="width:100px; font-weight: bold;">
                            <input class="form-control th-time" type="text" placeholder="กรอกเวลาตรวจ"
                                style="width:155px; font-weight: bold;">
                            <select class="form-control js-example-basic-single this th-province" name="province"
                                required style="width:200px; font-weight: bold;">
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
                    <td style="border-width:3px; border-color: black; font-weight: bold;">

                        <?php echo $SERVICE[$i]['SPName']; ?>
                    </td>
                    <?php for ($k = 0; $k < $comp; $k++) {
                            if ($k < 2) {
                                $num = "1";
                            }else if($k < 4) {
                                $num = "2";
                            }else{
                                $num = "3";
                            } 
                            
                    ?>
                    <td class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;">
                        <input class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <td class="show<?= $num ?>" style="border-bottom-width:3px; border-bottom-color: black;"><input
                            class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <!-- if -->
                    <td class="show<?= $num ?>" id="col<?php echo $k + 1; ?>row<?php echo $SERVICE[$i]['SPID']; ?>"
                        style="border-bottom-width:3px; border-bottom-color: black; border-right-width:3px; border-right-color: black;">
                        <?php 
                        $OPTION = getOption($SERVICE[$i]['SPID']);
                        if($OPTION[0]['numrow'] != 0){  
                            if($OPTION[1]['TypeOption'] == 'R'){
                                $type = 'radio';
                            }else{
                                $type = 'checkbox';   
                            }?>
                        <div>
                            <?php for($o = 1 ; $o <= $OPTION[0]['numrow']; $o++){ ?>
                            <input type="<?php echo $type; ?>" id="<?php echo $OPTION[$o]['OSID']; ?>" 
                            name="<?php if($OPTION[$o]['SPID'] == 2) echo "register"; else echo $OPTION[$o]['OptionName']; ?>" value="<?php echo $OPTION[$o]['OSID']; ?>">
                            <label for="<?php echo $OPTION[$o]['OSID']; ?>"><?php echo $OPTION[$o]['OptionName']; ?></label>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="form-inline">
                            
                            <!-- start if -->
                            <?php if ($SERVICE[$i]['SPID'] == 22) { ?>
                            <select class="form-control slecetVehicle js-example-basic-single" VID="0" required
                                style="width:135px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $VEHICLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $VEHICLE[$j]['VID']; ?>">
                                    <?php echo $VEHICLE[$j]['VName']; ?>
                                </option>
                                <?php } ?>
                            </select>

                            <select class="form-control slecetName js-example-basic-single" DID="<?= $k + 1 ?>"
                                SPID="<?= $SERVICE[$i]['SPID'] ?>" PID="0" required style="width:280px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['Title']." ".$PEOPLE[$j]['FName']." ".$PEOPLE[$j]['LName']." (".$PEOPLE[$j]['NName'].")"; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <!-- else -->
                            <?php } else { ?>
                            <select class="form-control slecetName js-example-basic-single" DID="<?= $k + 1 ?>"
                                SPID="<?= $SERVICE[$i]['SPID'] ?>" PID="0" required style="width:415px;">
                                <option value="0">-</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['Title']." ".$PEOPLE[$j]['FName']." ".$PEOPLE[$j]['LName']." (".$PEOPLE[$j]['NName'].")"; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                            <button DID="<?= $k + 1 ?>" SPID="<?= $SERVICE[$i]['SPID'] ?>"
                                check="<?php echo $SERVICE[$i]['SPID']; ?>" class="add-remove set-button btn-plus"><i
                                    class="fa fa-plus" style="background: #28a745;"></i></button>
                        </div>
                        <input class="form-control note" placeholder="เพิ่มเติม"
                            id="note-col<?php echo $k + 1; ?>row<?php echo $SERVICE[$i]['SPID']; ?>" type="text"
                            style="width:415px">
                    </td>

                    <?php } ?>
                    <!-- for add -->


                    <div hidden id="x-ray">
                        <!-- <div class="form-inline add_name"> -->
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