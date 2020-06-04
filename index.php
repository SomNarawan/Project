<?php 
    include_once("dbConnect.php");
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
    <style>
        i.fa {
            display: inline-block;
            border-radius: 60px;
            box-shadow: 0px 0px 2px #888;
            padding: 0.5em 0.6em;
        }
        .set-button{
            background: #FFFFFF;
            border: 0px;
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
                        <input class="form-control" style="width:250px" type="text" placeholder="กรอกชื่อบริษัท"  required>
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
                        <label style="width:100px">จำนวนบริษัท</label>
                        <input class="form-control" style="width:90px" type="number"  min=0 value="0" required>
                        <button class="btn btn-success" style="width:90px">ตกลง</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-info" style="width:100%; height:100%">ยืนยันข้อมูล</button>
            </div>
        </div><br>
        <div align="center">
            <table class="table-bordered">
                <tr align="center">
                    <th>ลำดับ</th>
                    <th>จุดบริการ</th>
                    <th>จุดที่ตรวจ</th>
                    <th>ยอดพนักงาน</th>
                    <th><input class="form-control"  placeholder="กรอกชื่อบริษัท" type="text" style="width:260px">
                        <div class="form-inline">
                            <input class="form-control" type="time" style="width:100px;">
                            <?php $PROVINCE = selectProvince(); ?>
                            <select class="form-control" name="province" id="province" required
                                style="width:160px;">
                                <option value="0">เลือกจังหวัด</option>
                                <?php for($i=1;$i<$PROVINCE[0]['numrow'];$i++){ ?>
                                <option value="<?php echo $PROVINCE[$i]['AD1ID']; ?>">
                                    <?php echo $PROVINCE[$i]['Province']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </th>
                </tr>
                <?php $SERVICE = selectServicepoint(); 
                for($i=1;$i<=$SERVICE[0]['numrow'];$i++){?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $SERVICE[$i]['SPName']; ?></td>
                    <td><input class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <td><input class="form-control" style="width:90px" type="number" min=0 value="0"></td>
                    <td>
                        <div class="form-inline">
                            <?php $PEOPLE = selectPeople(); ?>
                            <select class="form-control" name="province" id="province" required
                                style="width:172px;">
                                <option value="0">-</option>
                                <?php for($i=1;$i<$PEOPLE[0]['numrow'];$i++){ ?>
                                <option value="<?php echo $PEOPLE[$i]['PID']; ?>">
                                    <?php echo $PEOPLE[$i]['PName']; ?>
                                </option>
                                <?php } ?>
                            </select>  
                            <button class="set-button"><i class="fa fa-plus" style="background: #28a745;"></i></button>
                            <button class="set-button"><i class="fa fa-minus" style="background: #dc3545;"></i></button>
                        </div>
                        <input class="form-control"  placeholder="กรอกชื่อบริษัท" type="text" style="width:260px">
                    </td>
                </tr>
                <?php } ?>

            </table>
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
?>