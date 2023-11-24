$(document).ready(function () {
    $(".form--select").each(function () {
        setupValue = $(this).attr("value");
        setupClear = $(this).attr("data-clear") ? true : false;

        if (setupValue == undefined) {
            $(this).select2({
                allowClear: setupClear,
                placeholder: "",
                dir: "rtl",
            });

            // :pre-setup value
        } else {
            $(this)
                .select2({
                    allowClear: setupClear,
                    placeholder: "",
                    dir: "rtl",
                })
                .val(setupValue)
                .trigger("change");
        } // end else

        console.log(setupValue);
    });
});
