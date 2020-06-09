<?php
include_once("../dbConnect.php");
include_once("./query.php");
$Allname = getNamePeople();
$Allvehicle = getVehicle();
?>
<table border="1px">
    <tr>
        <th>จุดบริการ </th>
        <th class="show1">หน่วยที่ 1 </th>
        <th class="show1">หน่วยที่ 2 </th>
        <th class="show1">หน่วยที่ 3 </th>
        <th class="show2">หน่วยที่ 4 </th>
        <th class="show2">หน่วยที่ 5 </th>
        <th class="show2">หน่วยที่ 6 </th>
    </tr>

    <tr>
        <td>
            จุด 11
        </td>
        <td class="show1">
            <select class="slecetName" DID="1" SPID="11" PID="0">
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
        <td class="show1">
            <select class="slecetName" DID="2" SPID="11" PID="0">
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
        <td class="show1">
            <select class="slecetName" DID="3" SPID="11" PID="0">
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
        <td class="show2">
            <select class="slecetName" DID="4" SPID="11" PID="0">
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
        <td class="show2">
            <select class="slecetName" DID="5" SPID="11" PID="0">
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
        <td class="show2">
            <select class="slecetName" DID="6" SPID="11" PID="0">
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
            รถ
        </td>
        <td class="show1">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="1" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
            <br>
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="1" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>
        </td>
        <td class="show1">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="2" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>

        </td>
        <td class="show1">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="3" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>

        </td>
        <td class="show2">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="4" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>

        </td>
        <td class="show2">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="5" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>

        </td>
        <td class="show2">
            <select class="slecetVehicle" VID="0">
                <option value="0">-</option>
                <?php
                for ($i = 1; $i < count($Allvehicle); $i++) {
                    echo "<option value=\"{$Allvehicle[$i]['VID']}\">{$Allvehicle[$i]['VName']}</option>";
                }
                ?>
            </select>
            <select class="slecetName" DID="6" SPID="12" PID="0">
                <option value="0">เลือกรายชื่อ</option>
                <?php
                for ($i = 1; $i < count($Allname); $i++) {
                    echo "<option value=\"{$Allname[$i]['PID']}\">{$Allname[$i]['PName']}</option>";
                }
                ?>
            </select>

        </td>

    </tr>
</table>
<button id="btnclear">รีเซ็ต</button>
<button id="btnswitch">สลับ</button>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="./main.js"></script>