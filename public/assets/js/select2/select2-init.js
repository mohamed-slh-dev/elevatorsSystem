$(document).ready(function () {
    $(".form--select").each(function () {
        $(this).select2({
            placeholder: "",
            dir: "rtl",
        });
    });
});
