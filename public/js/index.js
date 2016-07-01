$(function () {

    var i = setInterval(reload, 1000);

    function reload() {
        $.ajax({
            url: "controller/indexController.php?action=buscar",
            dataType: 'json',
            type: 'POST',
            data: {
                zipcode: 97201
            },
            success: function (result) {
                clearInterval(i);
                $("#texto span").html("<strong>" + result.data.value + "</strong>");
            },
            error: function (result) {
                clearInterval(i);
                $("#error").html("<strong>" + result.statusText + "</strong> degrees");
            }
        });
    }

});