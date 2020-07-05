<?php
include_once("dbConnect.php");
include_once("./query.php");
$PEOPLE = getAllPeople();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- Select2 CSS -->
    <link href="./css/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="./css/select2/style-select2.css" rel="stylesheet" type="text/css">
    <script src="./js/select2/select2.min.js"></script>

    <style>
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
    <?php include_once("./header.php"); ?>

    <div class="container-fluid" style="position: absolute; top: 80px;">
        <h2>รายงานการออกปฏิบัติงานรายบุคคล</h2>
        <div class="card bg-dark text-white">
            <div class="card-body">
                <form action="./reportfile1.php" method="post" id="form-comment">
                    <div class="row">
                        <div class="col-lg-3 form-inline">
                            <label for="">เจ้าหน้าที่&nbsp;</label>
                            <select class="form-control js-example-basic-single" name="IDPeople" required style="width:275px;">
                                <option value="0">เลือกชื่อ</option>
                                <?php for ($j = 1; $j < $PEOPLE[0]['numrow']; $j++) { ?>
                                    <option value="<?php echo $PEOPLE[$j]['PID']; ?>">
                                        <?php echo $PEOPLE[$j]['Title'] . " " . $PEOPLE[$j]['FName'] . " " . $PEOPLE[$j]['LName'] . " (" . $PEOPLE[$j]['NName'] . ")"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6" style="padding-left:80px;">
                            <div class="form-inline">
                                <label for="">วันที่เริ่ม&nbsp;</label>
                                <input name="date1" class="form-control" type="date" value="">
                                <label for="" style="padding-left:50px; padding-right:50px;">-</label>
                                <label for="">วันที่สิ้นสุด&nbsp;</label>
                                <input name="date2" class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="col-lg-3" align="center">
                            <button class="btn btn-success set-button" id="submit-data" type="submit" style="width:50%; ">report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $('.js-example-basic-single').select2();
    $(document).on("bind", ".js-example-basic-single", function() {
        $(this).select2();
    });
    $(document).on("select2:open", ".js-example-basic-single", function() {
        $(this).next().addClass("border-from-control");
    });
    $(document).on("select2:close", ".js-example-basic-single", function() {
        $(this).next().removeClass("border-from-control");
    });
</script>