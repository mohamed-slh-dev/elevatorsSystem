$(document).ready(function () {
    $(".form--select").each(function () {
        setupValue = $(this).attr("value");

        if (setupValue == undefined) {
            $(this).select2({
                placeholder: "",
                dir: "rtl",
            });

            // :pre-setup value
        } else {
            $(this)
                .select2({
                    placeholder: "",
                    dir: "rtl",
                })
                .val(setupValue)
                .trigger("change");
        } // end else

        console.log(setupValue);
    });
});
