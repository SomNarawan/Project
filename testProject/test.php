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
            จุด 12
        </td>
        <td>
            <select class="slecetName" DID="1" SPID="12" PID="0">
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
            <select class="slecetName" DID="2" SPID="12" PID="0">
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
            <select class="slecetName" DID="3" SPID="12" PID="0">
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
            <select class="slecetName" DID="4" SPID="12" PID="0">
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
            <select class="slecetName" DID="5" SPID="12" PID="0">
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
            <select class="slecetName" DID="6" SPID="12" PID="0">
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
<button id="btnclear">รีเซ็ต</button>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btnclear", function() {
            ClearWorking();
            location.reload();
        });
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
            $(this).attr('PID', PIDNew);
            setSelectCeate();

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

        function setSelectCeate() {
            var test = $(".slecetName");
            for (i = 0; i < test.length; i++) {
                var DID = $(test[i]).attr('DID');
                var SPID = $(test[i]).attr('SPID');
                var PID = $(test[i]).attr('PID');
                getTextSelect(DID, SPID, PID, test[i]);
            }
        }

        function getTextSelect(DID, SPID, PID, selector) {
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {
                    DID: DID,
                    SPID: SPID,
                    PID: PID,
                    action: "getTextSelect"
                },
                async: false,
                success: function(result) {
                    $(selector).html(result);
                }
            });
        }

        function ClearWorking() {
            $.ajax({
                type: "POST",
                url: "./manage.php",
                data: {

                    action: "ClearWorking"
                },
                async: false,
                success: function(result) {

                }
            });
        }
    });
</script>