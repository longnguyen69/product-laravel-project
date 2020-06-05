$(document).ready(function () {
    $("#codeColor").on("change",function () {
        let colorLip = $("#codeColor").val();
        console.log(colorLip);
        $('#cart_color').css("background-color",colorLip);
    })
});
