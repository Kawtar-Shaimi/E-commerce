$(document).ready(function () {
    $("#email").on("input", function () {
        var email = $(this).val();
        if (email.length < 3) {
            $("#emailErr").text("Email must be at least 3 characters");
            $("#email")
                .removeClass(
                    "border-green-500  focus:ring focus:ring-green-300"
                )
                .addClass("border-red-500  focus:ring focus:ring-red-300");
            $("#send-reset-link").prop("disabled", true);
        } else if (email.length > 150) {
            $("#emailErr").text("Email must be less than 150 characters");
            $("#email")
                .removeClass(
                    "border-green-500  focus:ring focus:ring-green-300"
                )
                .addClass("border-red-500  focus:ring focus:ring-red-300");
            $("#send-reset-link").prop("disabled", true);
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            $("#emailErr").text("Invalid email format");
            $("#email")
                .removeClass(
                    "border-green-500  focus:ring focus:ring-green-300"
                )
                .addClass("border-red-500  focus:ring focus:ring-red-300");
            $("#send-reset-link").prop("disabled", true);
        } else {
            $("#emailErr").text("");
            $("#email")
                .removeClass("border-red-500  focus:ring focus:ring-red-300")
                .addClass("border-green-500  focus:ring focus:ring-green-300");
            $("#send-reset-link").prop("disabled", false);
        }
    });
});
