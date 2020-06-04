var check = true;
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
    if (check) {
        check = false;
    } else {
        check = true;
    }

}
$(document).ready(function() {
    ClearWorking();

    $(document).on("click", "#btnclear", function() {
        ClearWorking();
        location.reload();
    });
    $(document).on("click", "#btnswitch", function() {
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