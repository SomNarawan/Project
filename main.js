var checkPage = 1;
var id_ar = 1;
var OID = 0;
var DOID = [];
var SPDID = [
    [],
    [],
    [],
    [],
    [],
    [],
    []
];
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
    } else {
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
ClearWorking();
setSelectCeateName("1", "0");
// $('.chosen').select2();
$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});
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
    btn = 1;
    iddiv = "col" + DID + "row" + SPID;

    point = $("#pointcol" + DID + "row" + SPID).val();
    emp = $("#empcol" + DID + "row" + SPID).val();
    $(".minuscol" + DID + "row" + SPID).each(function() {
        btn++;
    });

    if (btn < point) {
        getTextSelectNameAdd(DID, SPID, 0);
        getTextSelectVehicleAdd(0);
        addblankName(DID, SPID);
        if (check == 22) {
            size = "315";
        } else {
            size = "515";
        }

        html = ` <div class="form-inline">`;
        htmlselectName = `<select class="form-control slecetName js-example-basic-single" DID="` + DID + `" SPID="` + SPID + `" 
            PID="0"   required style="width:` + size + `px;">`;
        htmlselectName += selectName;
        htmlselectName += `</select>`;

        if (check == 22) {
            addblankVehicle(DID);
            htmlselectvehicle = `<select class="form-control slecetVehicle js-example-basic-single" VID="0" DID="` + DID + `"  required style="width:200px;">`;
            htmlselectvehicle += selectVehicle;
            htmlselectvehicle += `</select>`;
            html += htmlselectvehicle;
            html += htmlselectName;
        } else {
            html += htmlselectName;
        }
        html += `    <button DID="${DID}" SPID="${SPID}" check="${check}" class="set-button add-remove btn-minus
                      minuscol${DID}row${SPID}">
                             <i class="fa fa-minus" style="background: #dc3545;"></i>
                        </button>
                    </div>`;
        idnote_div = "note-col" + DID + "row" + SPID;
        iddiv = "col" + DID + "row" + SPID;
        note_div = ` <input class="form-control note comment" placeholder="เพิ่มเติม" id="` + idnote_div + `" type="text" style="width:515px">`;
        test = $("#" + idnote_div).val();
        $("#" + idnote_div).remove();
        $("#" + iddiv).append(html); //เพิ่ม เลือกชื่อ
        $("#" + iddiv).append(note_div); //เพิ่ม เพิ่มเติม
        $("#" + idnote_div).val(test);
        $('.js-example-basic-single').select2();
    }

});
$(document).on("click", "#ok", function() {
    $('#date').removeAttr("required");
    $('.th-contact').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-company').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-time').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-timeOparetionStart').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-timeOparetionEnd').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-province').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-date').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-pay').each(function() {
        $(this).removeAttr("required");
    });
    $('.th-round').each(function() {
        $(this).removeAttr("required");
    });
});
$(document).on("click", "#submit-data", function() {
    check = 1;
    $(this).attr("type", "submit");
    $('#date').attr("required", "required");
    // console.log('date = '+$('#date').val());
    if($('#date').val() == ''){
        check = 0;
    }
    $('.th-contact').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-company').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-time').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-timeOparetionStart').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-timeOparetionEnd').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-province').each(function() {
        $(this).attr("required", "required");
        if ($(this).val() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-date').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-pay').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    $('.th-round').each(function() {
        $(this).attr("required", "required");
        if ($(this).val().trim() == '') {
            check = 0;
            checkPage = $(this).attr("page");
            Switchpage();
            return false;
        }
    });
    if (check) {

        $('#submit-data').attr("type", "button");
        let numpoint = $(".numpoint");
        let numpeople = $(".numpeople");
        let text = "";
        let btn = 1;
        for (i = 0; i < numpeople.length; i++) {

            let valnumpoint = $(numpoint[i]).val();
            if (valnumpoint > 0) {
                btn = 1;
                let valDID = $(numpeople[i]).attr('DID');
                let valSPID = $(numpeople[i]).attr('SPID');
                let NameSP = $(numpeople[i]).attr('nameSP');
                $(".minuscol" + valDID + "row" + valSPID).each(function() {
                    btn++;
                });
                if (btn < valnumpoint && valSPID != 15 && valSPID != 16 && valSPID != 21) {
                    text += "จุดบริการ " + NameSP + " ที่หน่วยงานที่ " + valDID + " จำนวนเจ้าหน้าที่ไม่ครบ\n";
                }
            }

        }
        swal({
                title: "คุณยืนยันข้อมูลหรือไม่",
                text: text,
                icon: "warning",
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-secondary",
                buttons: true,

            })
            .then((willDelete) => {
                if (willDelete) {
                    let date = $("#date").val();
                    let num_company = $("#num_company").val();
                    if (OID != 0) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {}
                        };
                        xhttp.open("POST", "manage.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send(`OID=${OID}&action=deletehistory`);
                    }
                    createOperation(date, num_company);
                    createInFoOperation();
                    createInfoServicepoint();
                    createInfoPeople();
                    swal("ยืนยันข้อมูลสำเร็จ", {
                        icon: "success",
                    }).then((confirm) => {

                    });

                } else {

                }
            });
    }

});

$(document).on("click", ".btn-minus", function() {
    DID = $(this).attr("DID");
    SPID = $(this).attr("SPID");
    check = $(this).attr("check");
    var parent = $(this).parent();
    var PID = $(parent).find(".slecetName").val();

    if (check == 22) {
        var VID = $(parent).find(".slecetVehicle").val();
        if (VID != 0) {
            setVehicle(VID, "notuse");
            setSelectCeateVehicle();
        }
        DeleteWorkingVehicle(DID, VID, PID);

    }

    $(parent).remove();
    if (PID != 0) {
        DeleteWorking(DID, SPID, PID);
        setSelectCeateName(DID, SPID);
    } else {
        DeleteWorking(DID, SPID, PID);
    }

});

$(document).on("click", "#btnswitch1", function() {
    checkPage = 1;
    Switchpage();
});
$(document).on("click", "#btnswitch2", function() {
    console.log('btnswitch2');
    checkPage = 2;
    Switchpage();
});
$(document).on("click", "#btnswitch3", function() {
    checkPage = 3;
    Switchpage();
});
$(document).on("click", ".selectOption", function() {
    var DID = $(this).attr('DID');
    var OSID = $(this).attr('OSID');
    var typeCK = $(this).attr('typeCK');
    var check = $(this).is(":checked");
    if (typeCK == "C") {
        if (check) {
            setWorkingOption(DID, OSID, "C");
        } else {
            setWorkingOption(DID, OSID, "D");
        }
    } else {
        if (OSID == 1) {
            setWorkingOption(DID, "2", "D");
            setWorkingOption(DID, "1", "C");
        } else {
            setWorkingOption(DID, "1", "D");
            setWorkingOption(DID, "2", "C");
        }
    }


});
$(document).on("change", ".numpoint", function() {
    setSelectCeateName("1", "0");
});
$(document).on("change", ".slecetName", function() {
    var DID = $(this).attr('DID');
    var SPID = $(this).attr('SPID');
    var PIDOld = $(this).attr('PID');
    var PIDNew = $(this).val();
    var parent = $(this).parent();
    var VID = $(parent).find(".slecetVehicle").val();
    if (PIDNew != 0) {
        CheckNameSelect(PIDNew);
    }

    DeleteWorking(DID, SPID, PIDOld);
    InsertWorking(DID, SPID, PIDNew);
    $(this).attr('PID', PIDNew);
    setSelectCeateName(DID, SPID);
    if (SPID == 22) {
        DeleteWorkingVehicle(DID, VID, PIDOld);
        InsertWorkingVehicle(DID, VID, PIDNew);
    }

});
$(document).on("change", ".slecetVehicle", function() {
    var DID = $(this).attr('DID');
    var VIDOld = $(this).attr('VID');
    var VIDNew = $(this).val();
    var parent = $(this).parent();
    var PID = $(parent).find(".slecetName").val();
    if (VIDOld != 0) {
        setVehicle(VIDOld, "notuse");
    }
    setVehicle(VIDNew, "use");
    $(this).attr('VID', VIDNew);
    setSelectCeateVehicle();
    DeleteWorkingVehicle(DID, VIDOld, PID);
    InsertWorkingVehicle(DID, VIDNew, PID);

});

function CheckNameSelect(PIDNew) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            PID: PIDNew,
            action: "CheckNameSelect"
        },
        async: false,
        success: function(result) {
            let DATA = JSON.parse(result);
            let value = DATA[1].count;
            if (value > 0) {
                swal("รายชื่อซ้ำจุดบริการอื่นๆ " + value + " จุด", {
                    icon: "warning",
                }).then((confirm) => {

                });

            }
        }
    });
}

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
    let emp = 0;
    for (i = 0; i < test.length; i++) {
        var DID = $(test[i]).attr('DID');
        var SPID = $(test[i]).attr('SPID');
        var PID = $(test[i]).attr('PID');
        emp = $("#pointcol" + DID + "row" + SPID).val();
        if (emp > 0) {
            if (SPIDPass == 0) {
                getTextSelectName(DID, SPID, PID, test[i]);
            } else if (DIDPass != DID || SPID == SPIDPass) {
                getTextSelectName(DID, SPID, PID, test[i]);
            }
        } else {
            getTextSelectName(DID, 0, PID, test[i]);
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

function addblankName(DID, SPID) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DID: DID,
            SPID: SPID,
            action: "addblankName"
        },
        async: false,
        success: function(result) {

        }
    });
}

function addblankVehicle(DID) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DID: DID,
            action: "addblankVehicle"
        },
        async: false,
        success: function(result) {

        }
    });
}

function DeleteWorkingVehicle(DID, VID, PID) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DID: DID,
            VID: VID,
            PID: PID,
            action: "DeleteWorkingVehicle"
        },
        async: false,
        success: function(result) {

        }
    });
}

function InsertWorkingVehicle(DID, VID, PID) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DID: DID,
            VID: VID,
            PID: PID,
            action: "InsertWorkingVehicle"
        },
        async: false,
        success: function(result) {

        }
    });
}

function setWorkingOption(DID, OSID, type) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DID: DID,
            OSID: OSID,
            type: type,
            action: "setWorkingOption"
        },
        async: false,
        success: function(result) {

        }
    });
}

function createOperation(date, num_company) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            date: date,
            num: num_company,
            action: "createOperation"
        },
        async: false,
        success: function(result) {
            OID = JSON.parse(result);

        }
    });
}

function createInFoOperation() {
    let company = $(".th-company");
    let time = $(".th-time");
    let timeOparetionStart = $(".th-timeOparetionStart");
    let timeOparetionEnd = $(".th-timeOparetionEnd");
    let province = $(".th-province");
    DOID = [];
    for (i = 0; i < company.length; i++) {
        let valcompany = $(company[i]).val();
        let valDID = $(company[i]).attr('DID');
        let valtime = $(time[i]).val();
        var valtimeOparetion = $(timeOparetionStart[i]).val() + " - " + $(timeOparetionEnd[i]).val();
        let valprovince = $(province[i]).val();
        let valOID = OID;
        createdep_of_opera(valOID, valDID, valcompany, valprovince, valtime, valtimeOparetion);
    }

}

function createdep_of_opera(valOID, valDID, valcompany, valprovince, valtime, valtimeOparetion) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            valOID: valOID,
            valDID: valDID,
            valcompany: valcompany,
            valprovince: valprovince,
            valtime: valtime,
            valtimeOparetion: valtimeOparetion,
            action: "createdep_of_opera"
        },
        async: false,
        success: function(result) {
            DOID[valDID] = Number(JSON.parse(result));
        }
    });
}

function createInfoServicepoint() {
    let numpeople = $(".numpeople");
    let numpoint = $(".numpoint");
    let comment = $(".comment");
    SPDID = [
        [],
        [],
        [],
        [],
        [],
        [],
        []
    ];
    for (i = 0; i < numpeople.length; i++) {
        let valnumpoint = $(numpoint[i]).val();
        if (valnumpoint > 0) {
            let valnumpeople = $(numpeople[i]).val();
            let valDID = $(numpeople[i]).attr('DID');
            let valSPID = $(numpeople[i]).attr('SPID');
            let valcomment = $(comment[i]).val();

            createserv_of_dep(DOID[valDID], valDID, valSPID, valnumpeople, valnumpoint, valcomment);
        }

    }

}

function createserv_of_dep(DOID, valDID, valSPID, valnumpeople, valnumpoint, valcomment) {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            DOID: DOID,
            valSPID: valSPID,
            valnumpeople: valnumpeople,
            valnumpoint: valnumpoint,
            valcomment: valcomment,
            action: "createserv_of_dep"
        },
        async: false,
        success: function(result) {
            SPDID[valDID][valSPID] = Number(JSON.parse(result));
        }
    });
}

function createInfoPeople() {
    $.ajax({
        type: "POST",
        url: "./manage.php",
        data: {
            ArrayDOID: JSON.stringify(DOID),
            ArraySPDID: JSON.stringify(SPDID),
            action: "createInfoPeople"
        },
        async: false,
        success: function(result) {

            window.open("./createPDF.php?OID=" + OID + "&DOWLOAD=1");
            window.open("./createPDF.php?OID=" + OID);
        }
    });
}


console.log("pass");