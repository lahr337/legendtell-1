$(document).ready(function () {
    $(document).on("click", ".vistdashboard", function () {
        var carid = this.id;

        localStorage.removeItem("myredirecturl");
        var url_vin = "/account-settings/vindashboard/" + carid;
        let chkauth = document.getElementById("chkauth").value.trim();
        if (chkauth == "nochk") {

            var formData = new FormData();
            formData.append('url_vin',url_vin);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/store-session",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    window.location.replace('/auth/login');
                },
            });
            return;
        } else {
            window.location.href = url_vin;
        }
        Session["roleID"] = "sdsds";

        sessionStorage.setItem("myredirecturl", url);
        // window.location.href = url;
    });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
});
