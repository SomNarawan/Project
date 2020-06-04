<?php
include_once("../dbConnect.php");
include_once("./query.php");
$Allname = getNamePeople();
$Allvehicle = getVehicle();
?>
<table border="1px">
    <tr>
        <th>จุดบริการ </th>
        <th>หน่วยที่ 1 </th>
        <th>หน่วยที่ 2 </th>
        <th>หน่วยที่ 3 </th>
        <th>หน่วยที่ 4 </th>
        <th>หน่วยที่ 5 </th>
        <th>หน่วยที่ 6 </th>
    </tr>
    <tr>
        <td>
            จุด 1
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="1" PID="0">
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
        <td>
            <select class="slecetName" DID="4" SPID="1" PID="0">
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
            <select class="slecetName" DID="5" SPID="1" PID="0">
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
            <select class="slecetName" DID="6" SPID="1" PID="0">
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
            จุด 2
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
        <td>
            <select class="slecetName" DID="4" SPID="2" PID="0">
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
            <select class="slecetName" DID="5" SPID="2" PID="0">
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
            <select class="slecetName" DID="6" SPID="2" PID="0">
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
            จุด 3
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
        <td>
            <select class="slecetName" DID="4" SPID="3" PID="0">
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
            <select class="slecetName" DID="5" SPID="3" PID="0">
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
            <select class="slecetName" DID="6" SPID="3" PID="0">
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
            จุด 4
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="4" PID="0">
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
            <select class="slecetName" DID="2" SPID="4" PID="0">
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
            <select class="slecetName" DID="3" SPID="4" PID="0">
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
            <select class="slecetName" DID="4" SPID="4" PID="0">
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
            <select class="slecetName" DID="5" SPID="4" PID="0">
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
            <select class="slecetName" DID="6" SPID="4" PID="0">
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
            จุด 5
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="5" PID="0">
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
            <select class="slecetName" DID="2" SPID="5" PID="0">
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
            <select class="slecetName" DID="3" SPID="5" PID="0">
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
            <select class="slecetName" DID="4" SPID="5" PID="0">
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
            <select class="slecetName" DID="5" SPID="5" PID="0">
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
            <select class="slecetName" DID="6" SPID="5" PID="0">
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
            จุด 6
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="6" PID="0">
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
            <select class="slecetName" DID="2" SPID="6" PID="0">
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
            <select class="slecetName" DID="3" SPID="6" PID="0">
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
            <select class="slecetName" DID="4" SPID="6" PID="0">
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
            <select class="slecetName" DID="5" SPID="6" PID="0">
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
            <select class="slecetName" DID="6" SPID="6" PID="0">
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
            จุด 7
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="7" PID="0">
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
            <select class="slecetName" DID="2" SPID="7" PID="0">
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
            <select class="slecetName" DID="3" SPID="7" PID="0">
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
            <select class="slecetName" DID="4" SPID="7" PID="0">
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
            <select class="slecetName" DID="5" SPID="7" PID="0">
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
            <select class="slecetName" DID="6" SPID="7" PID="0">
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
            จุด 8
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="8" PID="0">
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
            <select class="slecetName" DID="2" SPID="8" PID="0">
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
            <select class="slecetName" DID="3" SPID="8" PID="0">
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
            <select class="slecetName" DID="4" SPID="8" PID="0">
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
            <select class="slecetName" DID="5" SPID="8" PID="0">
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
            <select class="slecetName" DID="6" SPID="8" PID="0">
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
            จุด 9
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="9" PID="0">
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
            <select class="slecetName" DID="2" SPID="9" PID="0">
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
            <select class="slecetName" DID="3" SPID="9" PID="0">
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
            <select class="slecetName" DID="4" SPID="9" PID="0">
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
            <select class="slecetName" DID="5" SPID="9" PID="0">
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
            <select class="slecetName" DID="6" SPID="9" PID="0">
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
            จุด 10
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="10" PID="0">
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
            <select class="slecetName" DID="2" SPID="10" PID="0">
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
            <select class="slecetName" DID="3" SPID="10" PID="0">
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
            <select class="slecetName" DID="4" SPID="10" PID="0">
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
            <select class="slecetName" DID="5" SPID="10" PID="0">
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
            <select class="slecetName" DID="6" SPID="10" PID="0">
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
            จุด 11
        </td>
        <td>
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
        <td>
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
        <td>
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
        <td>
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
        <td>
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
        <td>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
                <option value="0">เลือกรถ</option>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
        <td>
            <select class="slecetVehicle" VID="0">
                <option value="0">เลือกรถ</option>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../main.js"></script>