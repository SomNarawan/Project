<?php 
    include_once("dbConnect.php");
    $comp = 1;
    if(isset($_POST["num_company"])){
        $comp = $_POST["num_company"];
    }
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
    <script src="project.js"></script>

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
    .border-table{
        border-width:3px;
        border-color: black;
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="position: absolute; top: 20px;">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="form-inline col-lg-4"> 
                        <label style="width:100px">วันที่ตรวจ</label>
                        <input class="form-control" style="width:250px" type="date" required>
                    </div>
                    <div class="form-inline col-lg-4">
                        <label style="width:100px">เวลาตรวจ</label>
                        <input class="form-control" style="width:180px" type="time" required>
                    </div>
                    <div class="form-inline col-lg-4">
                        <label style="width:100px">เวลารถออก</label>
                        <input class="form-control" style="width:180px" type="time" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-inline col-lg-4">
                        <label style="width:100px">ชื่อบริษัท</label>
                        <input class="form-control" style="width:250px" type="text" placeholder="กรอกชื่อบริษัท"
                            required>
                    </div>
                    <div class="form-inline col-lg-4">
                        <label style="width:100px">จังหวัด</label>
                        <?php $PROVINCE = selectProvince(); ?>
                        <select style="width:180px" class="form-control" name="province" id="province" required>
                            <option value="0">เลือกจังหวัด</option>
                            <?php for($i=1;$i<=$PROVINCE[0]['numrow'];$i++){ ?>
                            <option value="<?php echo $PROVINCE[$i]['AD1ID']; ?>">
                                <?php echo $PROVINCE[$i]['Province']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-inline col-lg-4">
                        <form class="form-inline" action="index.php" method="post">

                            <label style="width:100px">จำนวนบริษัท</label>
                            <input class="form-control" id="num_company" name="num_company" style="width:90px"
                                type="number" min=1 max=6 value="<?php echo $comp; ?>" required>
                            <button type="submit" class="btn btn-success" id="ok" name="ok"
                                style="width:90px">ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-info" style="width:100%; height:100%">ยืนยันข้อมูล</button>
            </div>
        </div><br>
        <div align="center">
            <table class="table-bordered border-table">
                <!-- Head Table -->
                <tr align="center" id="head_table" name="head_table">
                    <th style="border-bottom-width:3px; border-bottom-color: black;">ลำดับ</th>
                    <th style="border-width:3px; border-color: black;">จุดบริการ</th>
                    <?php for($k=0;$k<$comp;$k++){ ?>
                    <!-- <th style="background-color: black;"></th> -->
                    <th style="border-bottom-width:3px; border-bottom-color: black;">จุดที่ตรวจ</th>
                    <th style="border-bottom-width:3px; border-bottom-color: black;">ยอดพนักงาน</th>
                    <th style="border-bottom-width:3px; border-bottom-color: black; border-right-width:3px; border-right-color: black;">
                        <label>หน่วยที่<?php echo $k+1; ?></label>    
                    <input style="font-weight: bold;" class="form-control" placeholder="กรอกชื่อบริษัท" type="text"
                            style="width:400px">
                        <div class="form-inline">
                            <input class="form-control" type="time" style="width:200px; font-weight: bold;">
                            <?php $PROVINCE = selectProvince(); ?>
                            <select class="form-control" name="province" id="province" required
                                style="width:200px; font-weight: bold;">
                                <option value="0">เลือกจังหวัด</option>
                                <?php for($i=1;$i<$PROVINCE[0]['numrow'];$i++){ ?>
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
                <?php $SERVICE = selectServicepoint(); 
                for($i=1;$i<=$SERVICE[0]['numrow'];$i++){?>
                <tr>
                    <td align="center" style="border-bottom-width:3px; border-bottom-color: black; font-weight: bold;"><?php echo $i; ?></td>
                    <td style="border-width:3px; border-color: black; font-weight: bold;"><?php echo $SERVICE[$i]['SPName']; ?></td>
                    <?php for($k=0;$k<$comp;$k++){ ?>
                    <!-- <td style="background-color: black;"></td> -->
                    <td><input class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <td><input class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <!-- if -->
                    <?php if($SERVICE[$i]['SPID'] == 13){ ?>
                    <td style="border-right-width:3px; border-right-color: black;">
                        <div class="form-inline">
                            <?php $PEOPLE = selectPeople(); ?>
                            <select class="form-control" name="province" id="province" required style="width:150px;">
                                <option value="0">-</option>
                                <?php for($j=1;$j<$PEOPLE[0]['numrow'];$j++){ ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <select class="form-control" name="type" id="type" required style="width:150px;">
                                <option value="0">-</option>
                                <option value="1">B</option>
                                <option value="2">S</option>
                                <option value="3">D</option>
                            </select>
                            <button class="set-button"><i class="fa fa-plus" style="background: #28a745;"></i></button>
                            <button class="set-button"><i class="fa fa-minus" style="background: #dc3545;"></i></button>
                        </div>
                        <input class="form-control" placeholder="เพิ่มเติม" type="text" style="width:300px">
                    </td>
                    <!-- else if -->
                    <?php }else if($SERVICE[$i]['SPID'] == 16){ ?>
                    <td style="border-right-width:3px; border-right-color: black;">
                        <div class="form-inline">
                            <?php $VEHICLE = selectVehicle(); ?>
                            <select class="form-control" name="regist" id="regist" required style="width:200px;">
                                <option value="0">-</option>
                                <?php for($j=1;$j<$VEHICLE[0]['numrow'];$j++){ ?>
                                <option value="<?php echo $VEHICLE[$j]['VID']; ?>">
                                    <?php echo $VEHICLE[$j]['VName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <?php $PEOPLE = selectPeople(); ?>
                            <select class="form-control" name="people" id="people" required style="width:100px;">
                                <option value="0">-</option>
                                <?php for($j=1;$j<$PEOPLE[0]['numrow'];$j++){ ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <button class="set-button" id="add<?php echo $i; ?>"><i class="fa fa-plus" style="background: #28a745;"></i></button>
                            <button class="set-button" id="minus5<?php echo $i; ?>"><i class="fa fa-minus" style="background: #dc3545;"></i></button>
                        </div>
                        <input class="form-control" placeholder="เพิ่มเติม" type="text" style="width:300px">
                    </td>
                    <!-- else -->
                    <?php }else{ ?>
                    <td style="border-right-width:3px; border-right-color: black;">
                        <div class="form-inline">
                            <?php $PEOPLE = selectPeople(); ?>
                            <select class="form-control" name="province" id="province" required style="width:300px;">
                                <option value="0">-</option>
                                <?php for($j=1;$j<$PEOPLE[0]['numrow'];$j++){ ?>
                                <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                    <?php echo $PEOPLE[$j]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>
                            <button class="set-button"><i class="fa fa-plus" style="background: #28a745;"></i></button>
                            <button class="set-button"><i class="fa fa-minus" style="background: #dc3545;"></i></button>
                        </div>
                        <input class="form-control" placeholder="เพิ่มเติม" type="text" style="width:300px">
                    </td>
                    <?php } 
                    }?>
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

<?php
    function selectPeople(){
        $sql = "SELECT * FROM `people` ORDER BY `people`.`PName` ASC";
        $data = selectData($sql);
        return $data;
    }
    function selectProvince(){
        $sql = "SELECT * FROM `province`  
        ORDER BY `province`.`Province` ASC";
        $data = selectData($sql);
        return $data;
    }
    function selectServicepoint(){
        $sql = "SELECT * FROM `servicepoint`";
        $data = selectData($sql);
        return $data;
    }
    function selectVehicle(){
        $sql = "SELECT * FROM `vehicle` ORDER BY `vehicle`.`VName` ASC";
        $data = selectData($sql);
        return $data;
    }
?>