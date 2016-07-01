$(function () {


    var i = null;

    $.ajax({
        url: "controller/indexController.php?action=iniciar",
        dataType: 'json',
        type: 'POST',
        data: {
            tempo_id: 1
        },
        success: function (result) {
            i = setInterval(reload, 1000);
        },
        error: function (result) {
        }
    });

    function reload() {
        $.ajax({
            url: "controller/indexController.php?action=buscar",
            dataType: 'json',
            type: 'POST',
            data: {
                tempo_id: 1
            },
            success: function (result) {
                
                if (result.data.error !== null) {
                    clearInterval(i);
                    $("#error").html("<strong>" + result.data.error + "</strong> degrees");
                } else {
                    $("#texto span").html("<strong>" + result.data.value + "</strong>");
                }
            },
            error: function (result) {
                clearInterval(i);
                $("#error").html("<strong>" + result.statusText + "</strong> degrees");
            }
        });
    }

});