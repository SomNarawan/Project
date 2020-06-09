var checkPage = 1;
var id_ar = 1;
Switchpage();

function Switchpage() {
    var show1 = $(".show1");
    var show2 = $(".show2");
    var show3 = $(".show3");

    if (checkPage == 1) {
        for (i = 0; i < show1.length; i++) {
            $(show1[i]).show();
        }
        for (i = 0; i < show2.length; i++) {
            $(show2[i]).hide();
        }
        for (i = 0; i < show3.length; i++) {
            $(show3[i]).hide();
        }
    } else if (checkPage == 2) {
        for (i = 0; i < show1.length; i++) {
            $(show1[i]).hide();
        }
        for (i = 0; i < show2.length; i++) {
            $(show2[i]).show();
        }
        for (i = 0; i < show3.length; i++) {
            $(show3[i]).hide();
        }
    }else{
        for (i = 0; i < show1.length; i++) {
            $(show1[i]).hide();
        }
        for (i = 0; i < show2.length; i++) {
            $(show2[i]).hide();
        }
        for (i = 0; i < show3.length; i++) {
            $(show3[i]).show();
        }

    }
}
$(document).ready(function() {
    ClearWorking();
    // $('.chosen').select2();
    var selectName = "";
    var selectVehicle = "";
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
    
    $(document).on("click", ".btn-plus", function() {
        DID = $(this).attr("DID");
        SPID = $(this).attr("SPID");
        check = $(this).attr("check");
        getTextSelectNameAdd(DID, SPID, 0);
        getTextSelectVehicleAdd(0);
        if (check == 13) {
            size = "155";
        } else if (check == 16) {
            size = "105";
        } else {
            size = "415";
        }

        html = ` <div class="form-inline">`;
        htmlselectName = `<select class="form-control slecetName js-example-basic-single" DID="` + DID + `" SPID="` + SPID + `" PID="0" required style="width:` + size + `px;">`;
        htmlselectName += selectName;
        htmlselectName += `</select>`;

        if (check == 13) {
            html += htmlselectName;
            html += $('#x-ray').html();
        } else if (check == 16) {
            htmlselectvehicle = `<select class="form-control slecetVehicle js-example-basic-single" VID="0" required style="width:200px;">`;
            htmlselectvehicle += selectVehicle;
            htmlselectvehicle += `</select>`;
            html += htmlselectvehicle;
            html += htmlselectName;
        } else {
            html += htmlselectName;
        }
        html += `    <button DID="${DID}" SPID="${SPID}" check="${check}" class="set-button add-remove btn-minus">
                         <i class="fa fa-minus" style="background: #dc3545;"></i>
                    </button>
                </div>`;
        idnote_div = "note-col" + DID + "row" + SPID;
        iddiv = "col" + DID + "row" + SPID;
        note_div = ` <input class="form-control" placeholder="เพิ่มเติม" id="` + idnote_div + `" type="text" style="width:415px">`;

        $("#" + idnote_div).remove();
        $("#" + iddiv).append(html); //เพิ่ม เลือกชื่อ
        $("#" + iddiv).append(note_div); //เพิ่ม เพิ่มเติม
        $('.js-example-basic-single').select2();
    });
    $(document).on("click", ".btn-minus", function() {
        DID = $(this).attr("DID");
        SPID = $(this).attr("SPID");
        check = $(this).attr("check");
        var parent = $(this).parent();
        var PID = $(parent).find(".slecetName").val();

        if (check == 16) {
            var VID = $(parent).find(".slecetVehicle").val();
            if (VID != 0) {
                setVehicle(VID, "notuse");
                setSelectCeateVehicle();
            }

        }

        $(parent).remove();
        if (PID != 0) {
            DeleteWorking(DID, SPID, PID);
            setSelectCeateName(DID, SPID);
        }

        console.log("DID" + DID + "/SPID" + SPID + "/PID" + PID);
    });

    $(document).on("click", "#btnclear", function() {
        ClearWorking();
        location.reload();
    });
    $(document).on("click", "#btnswitch1", function() {
        checkPage = 1;
        Switchpage();
    });
    $(document).on("click", "#btnswitch2", function() {
        checkPage = 2;
        Switchpage();
    });
    $(document).on("click", "#btnswitch3", function() {
        checkPage = 3;
        Switchpage();
    });
    $(document).on("change", ".slecetName", function() {
        var DID = $(this).attr('DID');
        var SPID = $(this).attr('SPID');
        var PIDOld = $(this).attr('PID');
        var PIDNew = $(this).val();
        if (PIDOld != 0) {
            DeleteWorking(DID, SPID, PIDOld);
        }
        InsertWorking(DID, SPID, PIDNew);
        $(this).attr('PID', PIDNew);
        setSelectCeateName(DID, SPID);

    });
    $(document).on("change", ".slecetVehicle", function() {

        var VIDOld = $(this).attr('VID');
        var VIDNew = $(this).val();
        if (VIDOld != 0) {
            setVehicle(VIDOld, "notuse");
        }
        setVehicle(VIDNew, "use");
        $(this).attr('VID', VIDNew);
        setSelectCeateVehicle();

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

    function setVehicle(VID, status) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {

                VID: VID,
                status: status,
                action: "setVehicle"
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



    function setSelectCeateName(DIDPass, SPIDPass) {
        var test = $(".slecetName");
        for (i = 0; i < test.length; i++) {
            var DID = $(test[i]).attr('DID');
            var SPID = $(test[i]).attr('SPID');
            var PID = $(test[i]).attr('PID');
            if (DIDPass != DID || SPID == SPIDPass) {
                getTextSelectName(DID, SPID, PID, test[i]);
            }

        }
    }

    function getTextSelectName(DID, SPID, PID, selector) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {
                DID: DID,
                SPID: SPID,
                PID: PID,
                action: "getTextSelectName"
            },
            async: false,
            success: function(result) {
                $(selector).html(result);
            }
        });
    }

    function getTextSelectNameAdd(DID, SPID, PID) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {
                DID: DID,
                SPID: SPID,
                PID: PID,
                action: "getTextSelectName"
            },
            async: false,
            success: function(result) {
                selectName = result;
            }
        });
    }

    function setSelectCeateVehicle() {
        var test = $(".slecetVehicle");
        for (i = 0; i < test.length; i++) {
            var VID = $(test[i]).attr('VID');
            getTextSelectVehicle(VID, test[i]);
        }
    }

    function getTextSelectVehicleAdd(VID) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {

                VID: VID,
                action: "getTextSelectVehicle"
            },
            async: false,
            success: function(result) {
                selectVehicle = result;
            }
        });
    }

    function getTextSelectVehicle(VID, selector) {
        $.ajax({
            type: "POST",
            url: "./manage.php",
            data: {

                VID: VID,
                action: "getTextSelectVehicle"
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