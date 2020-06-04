<?php
include_once("../dbConnect.php");
include_once("./query.php");
$Allname = getNamePeople();
?>
<table border="1px">
    <tr>
        <th>จุดบริการ </th>
        <th>หน่วยที่ 1 </th>
        <th>หน่วยที่ 2 </th>
        <th>หน่วยที่ 3 </th>
    </tr>
    <tr>
        <td>
            ประสานงาน
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="1" PID="1">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <select class="slecetName" DID="1" SPID="1" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />

        </td>
        <td>
            <select class="slecetName" DID="2" SPID="1" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>
        <td>
            <select class="slecetName" DID="3" SPID="1" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>

    </tr>
    <tr>
        <td>
            วัดความดัน
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="2" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>

            <input type="text" class="inputOtherName" />

        </td>
        <td>
            <select class="slecetName" DID="2" SPID="2" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>
        <td>
            <select class="slecetName" DID="3" SPID="2" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>

    </tr>
    <tr>
        <td>
            การได้ยิน
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="3" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>

            <input type="text" class="inputOtherName" />

        </td>
        <td>
            <select class="slecetName" DID="2" SPID="3" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>
        <td>
            <select class="slecetName" DID="3" SPID="3" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="text" class="inputOtherName" />
        </td>

    </tr>

</table>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).on("change", ".slecetName", function() {
        var DID = $(this).attr('DID');
        var SPID = $(this).attr('SPID');
        var PIDOld = $(this).attr('PID');
        var PIDNew = $(this).val();
        //alert('DID:  ' + DID + '  /SPID:  ' + SPID + '  /PIDOld:  ' + PIDOld + '  /PIDNew:  ' + PIDNew);
        if (PIDOld != 0) {
            DeleteWorking(DID, SPID, PIDOld);
        }
        InsertWorking(DID, SPID, PIDNew);


    });

    function DeleteWorking(DID, SPID, PID) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {
                DID: DID,
                SPID: SPID,
                PID: PID,
                action: "DeleteWorking"
            },
            async: false,
            success: function(result) {

            }
        });

    }

    function InsertWorking(DID, SPID, PID) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {
                DID: DID,
                SPID: SPID,
                PID: PID,
                action: "InsertWorking"
            },
            async: false,
            success: function(result) {

            }
        });

    }
</script>