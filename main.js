var check = true;
var id_ar = 1;
Switchpage();

function Switchpage() {
    var show1 = $(".show1");
    var show2 = $(".show2");
    if (check) {
        for (i = 0; i < show1.length; i++) {
            $(show1[i]).show();
        }
        for (i = 0; i < show2.length; i++) {
            $(show2[i]).hide();
        }
    } else {
        for (i = 0; i < show1.length; i++) {
            $(show1[i]).hide();
        }
        for (i = 0; i < show2.length; i++) {
            $(show2[i]).show();
        }
    }
}
$(document).ready(function() {
    ClearWorking();

    $('.js-example-basic-single').select2();
    $('.js-example-basic-single').on('select2:open', function(e) {
        $(this).next().addClass("border-from-control");
    });
    $('.js-example-basic-single').on('select2:close', function(e) {
        $(this).next().removeClass("border-from-control");
    });
    $(document).on("click", ".btn-plus", function() {
        col = $(this).attr("col");
        row = $(this).attr("row");
        check = $(this).attr("check");
        if(check == 13){
            html = $('#x-ray').html();
        }else if(check == 16){
            html = $('#vehicle').html();
        }else{
            html = $('#else').html();
        }
        html =  `<div class="form-inline" id="${id_ar}">${html}
        <button col="${col}" row="${row}"
            check="${check}" class="set-button btn-minus" del="${id_ar}"><i
        class="fa fa-minus" style="background: #dc3545;"></i></button></div>`
        note = $('#note-col'+col+'row'+row).val();
        id_note = 'note-col'+col+'row'+row;
        note_div = `<input class="form-control" placeholder="เพิ่มเติม" id="${id_note}" type="text" style="width:300px">`;
        $('#note-col'+col+'row'+row).remove(); 
        $('#col'+col+'row'+row).append(html);       //เพิ่ม เลือกชื่อ
        $('#col'+col+'row'+row).append(note_div);   //เพิ่ม เพิ่มเติม
        $('#note-col'+col+'row'+row).val(note);     //กำหนดค่าให้เพิ่มเติม
        id_ar++;
    });
    $(document).on("click", ".btn-minus", function() {
        id = $(this).attr("del");
        $('#'+id).remove();
    });

    $(document).on("click", "#btnclear", function() {
        ClearWorking();
        location.reload();
    });
    $(document).on("click", "#btnswitch1", function() {
        check = true;
        Switchpage();
    });
    $(document).on("click", "#btnswitch2", function() {
        check = false;
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
        setSelectCeateName();

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



    function setSelectCeateName() {
        var test = $(".slecetName");
        for (i = 0; i < test.length; i++) {
            var DID = $(test[i]).attr('DID');
            var SPID = $(test[i]).attr('SPID');
            var PID = $(test[i]).attr('PID');
            getTextSelectName(DID, SPID, PID, test[i]);
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

    function setSelectCeateVehicle() {
        var test = $(".slecetVehicle");
        for (i = 0; i < test.length; i++) {
            var VID = $(test[i]).attr('VID');
            getTextSelectVehicle(VID, test[i]);
        }
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