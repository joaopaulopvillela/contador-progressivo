$(function () {

    var i = null;

    $("#iniciar").on('click', iniciar);
//    $("#buscar").on('click', buscar);
//    $("#stop").on('click', stop);
    
    buscar();
    
    function buscar() {
        i = setInterval(reload, 1000);
    }

    function stop() {
        clearInterval(i);
    }

    function iniciar() {
        $.ajax({
            url: "controller/indexController.php?action=iniciar",
            dataType: 'json',
            type: 'POST',
            data: {
                tempo_id: 3
            },
            success: function (result) {
                buscar();
            },
            error: function (result) {
            }
        });
    }

    function reload() {
        $.ajax({
            url: "controller/indexController.php?action=buscar",
            dataType: 'json',
            type: 'POST',
            data: {
                tempo_id: 3
            },
            success: function (result) {

                if (result.data.error !== null) {
                    stop();
                    $("#error").html("<strong>" + result.data.error + "</strong>");
                } else {
                    $("#error").html('');
                    $("#texto span").html("<strong>" + result.data.value + "</strong>");
                }
            },
            error: function (result) {
                stop()
                $("#error").html("<strong>" + result.statusText + "</strong>");
            }
        });
    }

});