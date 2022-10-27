$(document).ready(function () {
    $(document).on("click", ".cnf", function (event) {
        var id = $(this).attr("data-close");
        Swal.fire({
            title: "Warning!",
            text: "The changes aren't saved yet. Are you sure you want to close it?",
            icon: "error",
            confirmButtonText: "Yes",
            showCancelButton: true,
            cancelButtonText: "No",
        }).then(function (status) {
            if (status.isConfirmed) {
                $("#" + id).modal("toggle");
                $(".vehicle_inp").val("");
            }
        });
    });

    $(".vehicle_inp").on("keyup", function () {
        var inp_val = $(this).val().trim();
        if (inp_val != "") {
            $(this).addClass("filled");
        } else {
            $(this).removeClass("filled");
        }
    });

    $("#vehicle_type").on("change", function () {
        var id = $("option:selected", this).attr("data-id");
        $(".vehicle_inp").val("");
        if (id == "camper-lg") {
            $(".vehicle_mod").addClass("d-none");
            $("#camper-lg2").removeClass("d-none");
        }
        if (id == "bus") {
            $(".vehicle_mod").addClass("d-none");
            $("#bus1").removeClass("d-none");
        }
        if (id == "wheeler-cab") {
            $(".vehicle_mod").addClass("d-none");
            $("#wheeler-cab1").removeClass("d-none");
        }
        var vehicle = $(".vehicle").removeClass("d-none");
        $(".vehicle").addClass("d-none");
        $("#" + id).removeClass("d-none");
    });

    $("#type_vehicle").on("change", function () {
        var id = $("option:selected", this).attr("data-id");
        var servicedata = $("#servicedata").val().trim();
        var url =
            "/shop-settings/detailing-correction?servicedata=" +
            servicedata +
            "&vehicle_type=" +
            id +
            "";
        window.location.href = url;
    });

    $("#bus").on("click", function () {
        $(".vehicle-3").addClass("d-none");
        $(".vehicle-2").removeClass("d-none");
    });
    // driver_front_break

    $(".driver_front_break").click(function () {
        var id = $(this).attr("id");

        if (
            $("#" + id).prop("checked") === true &&
            $("#" + id).hasClass("checked")
        ) {
            $(this).removeClass("checked");
            $(this).prop("checked", true);
        } else {
            $(this).addClass("checked");
            $(this).prop("checked", false);
        }
    });

    // Car Select All start
    $(".selectallcar").click(function () {
        $(".car_check").prop("checked", this.checked);
    });

    $(".car_check").change(function () {
        var check =
            $(".car_check").filter(":checked").length == $(".car_check").length;
        $(".selectallcar").prop("checked", check);
    });

    $(".check_car").change(function () {
        var check =
            $(".car_check").filter(":checked").length == $(".car_check").length;
        $(".selectallcar").prop("checked", check);
    });

    // Car select all end

    // van select all start

    $(".vanselectall").click(function () {
        $(".van_check").prop("checked", this.checked);
    });

    $(".van_check").change(function () {
        var check =
            $(".van_check").filter(":checked").length == $(".van_check").length;
        $(".vanselectall").prop("checked", check);
    });

    $(".check_van").change(function () {
        var check =
            $(".van_check").filter(":checked").length == $(".van_check").length;
        $(".vanselectall").prop("checked", check);
    });

    // van select all end

    // rv select all start

    $(".rvselectall").click(function () {
        $(".rv_check").prop("checked", this.checked);
    });

    $(".rv_check").change(function () {
        var check =
            $(".rv_check").filter(":checked").length == $(".rv_check").length;
        $(".rvselectall").prop("checked", check);
    });

    $(".check_rv").change(function () {
        var check =
            $(".rv_check").filter(":checked").length == $(".rv_check").length;
        $(".rvselectall").prop("checked", check);
    });

    // rv select all end

    // trailer select all start

    $(".trailorselectall").click(function () {
        $(".trailor_check").prop("checked", this.checked);
    });

    $(".trailor_check").change(function () {
        var check =
            $(".trailor_check").filter(":checked").length ==
            $(".trailor_check").length;
        $(".trailorselectall").prop("checked", check);
    });

    $(".check_trailor").change(function () {
        var check =
            $(".trailor_check").filter(":checked").length ==
            $(".trailor_check").length;
        $(".trailorselectall").prop("checked", check);
    });

    // trailer select all end

    // bus select all start
    $(".busselectall").click(function () {
        $(".bus_check").prop("checked", this.checked);
    });

    $(".bus_check").change(function () {
        var check =
            $(".bus_check").filter(":checked").length == $(".bus_check").length;
        $(".busselectall").prop("checked", check);
    });

    $(".check_bus").change(function () {
        var check =
            $(".bus_check").filter(":checked").length == $(".bus_check").length;
        $(".busselectall").prop("checked", check);
    });

    // bus select all end

    // Waranty readyonly start for all types
    $(".yes_waranty_car").on("click", function () {
        $(".company_waranty").val("");
        $(".company_waranty").prop("readonly", false);
    });

    $(".no_waranty_car").on("click", function () {
        $(".company_waranty").val("");
        $(".company_waranty").prop("readonly", true);
    });

    $(".yes_waranty_van").on("click", function () {
        $(".company_waranty_van").val("");
        $(".company_waranty_van").prop("readonly", false);
    });

    $(".no_waranty_van").on("click", function () {
        $(".company_waranty_van").val("");
        $(".company_waranty_van").prop("readonly", true);
    });

    $(".yes_waranty_rv").on("click", function () {
        $(".company_waranty_rv").val("");
        $(".company_waranty_rv").prop("readonly", false);
    });

    $(".no_waranty_rv").on("click", function () {
        $(".company_waranty_rv").val("");
        $(".company_waranty_rv").prop("readonly", true);
    });

    $(".yes_waranty_trailer").on("click", function () {
        $(".company_waranty_trailer").val("");
        $(".company_waranty_trailer").prop("readonly", false);
    });

    $(".no_waranty_trailer").on("click", function () {
        $(".company_waranty_trailer").val("");
        $(".company_waranty_trailer").prop("readonly", true);
    });

    $(".yes_waranty_bus").on("click", function () {
        $(".company_waranty_bus").val("");
        $(".company_waranty_bus").prop("readonly", false);
    });

    $(".no_waranty_bus").on("click", function () {
        $(".company_waranty_bus").val("");
        $(".company_waranty_bus").prop("readonly", true);
    });

    $(".yes_waranty_other").on("click", function () {
        $(".company_waranty_other").val("");
        $(".company_waranty_other").prop("readonly", false);
    });

    $(".no_waranty_other").on("click", function () {
        $(".company_waranty_other").val("");
        $(".company_waranty_other").prop("readonly", true);
    });

    $(".check_waranty_yes").on("click", function () {
        $(".waranty_company").val("");
        $(".waranty_company").prop("readonly", false);
    });

    $(".check_waranty_no").on("click", function () {
        $(".waranty_company").val("");
        $(".waranty_company").prop("readonly", true);
    });

    $(".check_register_yes").on("click", function () {
        $(".registered_company").val("");
        $(".registered_company").prop("readonly", false);
    });

    $(".check_register_no").on("click", function () {
        $(".registered_company").val("");
        $(".registered_company").prop("readonly", true);
    });

    $(".yes_incident_condition").on("click", function () {
        $(".incident_detail").val("");
        $(".incident_detail").prop("readonly", false);
    });

    $(".no_incident_condition").on("click", function () {
        $(".incident_detail").val("");
        $(".incident_detail").prop("readonly", true);
    });

    // Waranty readyonly end for all types

    $(".reset").on("click", function () {
        $(".uncheck").prop("checked", false);
        $("#display_image_list ul").html("");
        $("#paintless_note").html("");
    });

    $(".static_pressure_low_check").on("click", function () {
        if ($(".static_pressure_low_check:checkbox:checked").length > 0) {
            $(".static_pressure_low").removeAttr("readonly");
        } else {
            $(".static_pressure_low").val("");
            $(".static_pressure_low").prop("readonly", true);
        }
    });

    $(".static_pressure_high_check").on("click", function () {
        if ($(".static_pressure_high_check:checkbox:checked").length > 0) {
            $(".static_pressure_high").removeAttr("readonly");
        } else {
            $(".static_pressure_high").val("");
            $(".static_pressure_high").prop("readonly", true);
        }
    });

    $(".dynamic_pressure_low_check").on("click", function () {
        if ($(".dynamic_pressure_low_check:checkbox:checked").length > 0) {
            $(".dynamic_pressure_low").removeAttr("readonly");
        } else {
            $(".dynamic_pressure_low").val("");
            $(".dynamic_pressure_low").prop("readonly", true);
        }
    });

    $(".dynamic_pressure_high_check").on("click", function () {
        if ($(".dynamic_pressure_high_check:checkbox:checked").length > 0) {
            $(".dynamic_pressure_high").removeAttr("readonly");
        } else {
            $(".dynamic_pressure_high").val("");

            $(".dynamic_pressure_high").prop("readonly", true);
        }
    });

    $(function () {
        var today = new Date();
        $("#datepicker")
            .datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                endDate: "today",
                maxDate: today,
            })
            .on("changeDate", function (ev) {
                $(this).datepicker("hide");
            });
    });

    // only float number allowed

    $(function () {
        $("input.decimal").bind("change keyup input", function () {
            var position = this.selectionStart - 1;
            //remove all but number and .
            var fixed = this.value.replace(/[^0-9\.]/g, "");
            if (fixed.charAt(0) === ".")
                //can't start with .
                fixed = fixed.slice(1);

            var pos = fixed.indexOf(".") + 1;
            if (pos >= 0)
                //avoid more than one .
                fixed =
                    fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

            if (this.value !== fixed) {
                this.value = fixed;
                this.selectionStart = position;
                this.selectionEnd = position;
            }
        });
    });

    //End float number only script

    var remove_products_ids = [];
    var image_dynamic_id = 0;
    var image_dynamic_id2 = 100;
    var image_dynamic_id3 = 200;
    var image_dynamic_id4 = 300;
    var image_dynamic_id5 = 400;
    var image_dynamic_id6 = 500;
    var tab_index = 0;
    $(document).on("click", ".issueBtn", function () {
        var attr = $("#text_" + this.id).attr("tabindex");
      
        // if ($("#text_" + this.id).hasClass("issuetabclose")) {
        //     $("#text_" + this.id).removeClass("issuetabclose");
        // }else{
        //     $("#text_" + this.id).addClass("issuetabclose");
        // }

        var tab_type = $("#text_" + this.id).attr("tab-type");

        if (typeof attr !== "undefined" && attr !== false) {
          
            $("#text_" + this.id).removeAttr("tabindex", false);
            if ($("#text_" + this.id).hasClass("tabing")) {
                $("#text_" + this.id).removeClass("tabing");
                $("#text_" + this.id).removeClass("tabing");
            } else {
                $("#text_" + this.id).addClass("tabing");
            }
        } else {
            if ($("#text_" + this.id).hasClass("tabing")) {
                $("#text_" + this.id).removeClass("tabing");
            } else {
                $("#text_" + this.id).addClass("tabing");
            }
        }
        $("#" + this.id).toggleClass("mynewcl");
        $("#text_" + this.id).val("");
        $("#" + this.id).toggleClass("active");
        $("#text_" + this.id).toggleClass("active");
        $("#text_" + this.id).toggleClass("mynewactive");
        $("#text_" + this.id).toggleClass("mynewcsl");
        var readonly_attr = $("#text_" + this.id).attr("readonly");
        if (typeof readonly_attr !== "undefined" && readonly_attr !== false) {
            $("#text_" + this.id).removeAttr("readonly", true);
        }else{
            $("#text_" + this.id).attr("readonly", true);
        } 
        var i = 1;
        $('.tabing').each(function(){
            $("#"+this.id).attr("tabindex", i);
            i++;
        });
    });
    $(document).on("click", ".insertussueform", function () {
        var error = 0;
        $(".mynewactive").each(function () {
            console.log("chkid", this.id);
            if ($("#" + this.id).val() == "") {
                error++;

                $("#" + this.id).css("border", "2px solid red");
            } else {
                $("#" + this.id).css("border", "");
            }
        });

        if (error == 0) {
            let _token = $('meta[name="csrf-token"]').attr("content");
            var formdataIssue = new FormData(
                document.getElementById("saveIssueForm")
            );

            $.ajax({
                url: "/shop-settings/save-issue-repair",
                type: "POST",
                data: formdataIssue,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    window.location.replace(response);
                    toastr.success(
                        "Issue/Repair successfully!",
                        "Shop Settings"
                    );
                },
            });
        }
        console.log("error", error);
    });
    $(document).on("click", ".insertAcdata", function () {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var formdataAC = new FormData(document.getElementById("saveACForm"));
        formdataAC.append("remove_products_ids", remove_products_ids);
        $(".loader").show();
        $.ajax({
            url: "/shop-settings/save-ac-service",
            type: "POST",
            data: formdataAC,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);
                $(".loader").hide();
                window.location.replace(response);
                toastr.success("Service added successfully", "Shop Settings");
            },
        });
    });

    // car wash
    $(document).on("click", ".insertHandle", function () {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var formdataCarHandle = new FormData(
            document.getElementById("saveCarHandleForm")
        );
        formdataCarHandle.append("remove_products_ids", remove_products_ids);
        $(".loader").show();
        $.ajax({
            url: "/shop-settings/save-car-handle",
            type: "POST",
            data: formdataCarHandle,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log("esfds", response);
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });
    $(document).on("click", ".inserttunnel", function () {
        console.log("click data");
        let _token = $('meta[name="csrf-token"]').attr("content");
        var formdataTunnelHandle = new FormData(
            document.getElementById("saveCarTunnelForm")
        );
        formdataTunnelHandle.append(
            "remove_products_ids",
            remove_products_ids_two
        );
        $(".loader").show();
        $.ajax({
            url: "/shop-settings/save-car-tunnel",
            type: "POST",
            data: formdataTunnelHandle,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);
                $(".loader").hide();

                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });
    $(document).on("click", ".inserttouchless", function () {
        console.log("click data");
        let _token = $('meta[name="csrf-token"]').attr("content");
        var formdataTunnelHandle = new FormData(
            document.getElementById("saveCarTouchlessForm")
        );
        formdataTunnelHandle.append(
            "remove_products_ids",
            remove_products_ids_one
        );
        $(".loader").show();
        $.ajax({
            url: "/shop-settings/save-car-tunnel",
            type: "POST",
            data: formdataTunnelHandle,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log("fggg", response);
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });
    // end car wash
    //function image uploaded

    $(".image_uploaded").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;

        for (var j = 0; j < len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }
            $(".display_image_list ul").append(
                " <li id='" +
                    image_dynamic_id +
                    "'><span><button type='button' class='btn cross'  id='" +
                    image_dynamic_id +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id++;
        }
    });
    //image2
    $(".image_uploaded2").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list2 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list2 ul").append(
                " <li id='" +
                    image_dynamic_id2 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id2 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id2 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id2++;
        }
    });

    //image2
    $(".image_uploaded3").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list3 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list3 ul").append(
                " <li id='" +
                    image_dynamic_id3 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id3 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id3 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id3++;
        }
    });

    $(".image_uploaded4").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list4 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list4 ul").append(
                " <li id='" +
                    image_dynamic_id4 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id4 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id4 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id4++;
        }
    });
    $(".image_uploaded5").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list5 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list5 ul").append(
                " <li id='" +
                    image_dynamic_id5 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id5 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id4 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id5++;
        }
    });

    $(".image_uploaded6").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list6 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list6 ul").append(
                " <li id='" +
                    image_dynamic_id6 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id6 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id6 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id6++;
        }
    });
    //end img2
    //image3
    $(".products_uploaded").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list3 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list3 ul").append(
                " <li id='" +
                    image_dynamic_id2 +
                    "'><span><button class='btn cross'  id='" +
                    image_dynamic_id2 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id2 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id2++;
        }
    });
    //end image 3

    //image3
    $(".products_uploaded_image").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list3 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list3 ul").append(
                " <li id='" +
                    image_dynamic_id2 +
                    "'><span><button class='btn cross_img'  id='" +
                    image_dynamic_id2 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id2 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id2++;
        }
    });
    //end image 3
    $(".products_uploaded_img").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list4 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list4 ul").append(
                " <li id='" +
                    image_dynamic_id2 +
                    "'><span><button class='btn cross_img'  id='" +
                    image_dynamic_id2 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id2 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id2++;
        }
    });
    //image3
    $(".file_upload").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_image_list5 ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";

            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }

            $(".display_image_list5 ul").append(
                " <li id='" +
                    image_dynamic_id2 +
                    "'><span><button class='btn cross_img'  id='" +
                    image_dynamic_id2 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id2 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id2++;
        }
    });
    //end image 4

    $(".before_image").change(function (event) {
        console.log("tst", this.id);
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);
        console.log("click", input_file);
        console.log("click22");
        var len = input_file.files.length;
        $(".display_product_list_before ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }
            $(".display_product_list_before ul").append(
                " <li id='before" +
                    image_dynamic_id3 +
                    "'><span><button class='btn cross_before' type='button'  id='" +
                    image_dynamic_id3 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id3 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id3++;
        }
    });

    $(".estimated_document").change(function (event) {
        console.log("tst", this.id);
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);
        var len = input_file.files.length;
        $(".display_product_list_estimate ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }
            $(".display_product_list_estimate ul").append(
                " <li id='estimate" +
                    image_dynamic_id4 +
                    "'><span><button class='btn cross_one' type='button'  id='" +
                    image_dynamic_id4 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id4 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id4++;
        }
    });

    $(".repair_document").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);

        var len = input_file.files.length;
        $(".display_product_list_repair_document ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }
            $(".display_product_list_repair_document ul").append(
                " <li id='" +
                    image_dynamic_id5 +
                    "'><span><button class='btn cross' type='button'  id='" +
                    image_dynamic_id5 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id5 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id5++;
        }
    });

    $(".after_image").change(function (event) {
        var pro_id = this.id;
        var input_file = document.getElementById(pro_id);
        console.log("click", input_file);
        console.log("click22");
        var len = input_file.files.length;
        $(".display_product_list_after_image ul").html("");

        for (var j = 0; j < len; j++) {
            var src = "";
            var name = event.target.files[j].name;
            var mime_type = event.target.files[j].type.split("/");
            if (mime_type[0] == "image") {
                src = "/assets/images/jpg.png";
                //  src = URL.createObjectURL(event.target.files[j]);
            } else if (mime_type[0] == "application") {
                src = "/assets/images/pdf.png";
            } else {
                src = "icons/file.png";
            }
            $(".display_product_list_after_image ul").append(
                " <li id='" +
                    image_dynamic_id5 +
                    "'><span><button class='btn cross' type='button'  id='" +
                    image_dynamic_id5 +
                    "'>&nbsp;</button><img id='" +
                    image_dynamic_id5 +
                    "' src='" +
                    src +
                    "' title='" +
                    name +
                    "' class='imgupdate'></span></li>"
            );

            image_dynamic_id5++;
        }
    });
    var remove_products_ids_one = [];
    var remove_products_ids_two = [];
    var remove_products_ids_three = [];
    var remove_products_ids_four = [];

    $(document).on("click", ".cross", function () {
        var id = $(this).attr("id");
        remove_products_ids.push(id);
        console.log("hererere", remove_products_ids);
        $("li#" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    $(document).on("click", ".cross_before", function () {
        var id = $(this).attr("id");
        remove_products_ids_four.push(id);
        console.log("hererere", remove_products_ids_four);
        $("li#before" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    $(document).on("click", ".cross_img", function () {
        var id = $(this).attr("id");
        remove_products_ids.push(id);
        $("li#" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    $(document).on("click", ".cross_one", function () {
        var id = $(this).attr("id");
        remove_products_ids_one.push(id);
        $("li#estimate" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    $(document).on("click", ".cross_two", function () {
        var id = $(this).attr("id");
        remove_products_ids_two.push(id);
        $("li#repair" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    $(document).on("click", ".cross_three", function () {
        console.log("ida", this.id);
        var id = $(this).attr("id");
        var data_id = $(this).attr("data-id");
        remove_products_ids_three.push(data_id);
        $("li#after" + id).remove();
        if ("li".length == 0)
            document.getElementById("products_uploaded").value = "";
    });

    //end uploaded
    $(document).on("click", ".appiralsubmit", function () {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var formdataTunnelHandle = new FormData(
            document.getElementById("apperialapproved")
        );

        $(".loader").show();
        $.ajax({
            url: "/shop-settings/save-apperisalstored",
            type: "POST",
            data: formdataTunnelHandle,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });
    $(document).on("click", ".saveVinly", function () {
        // return;
        var msg = "";
        let _token = $('meta[name="csrf-token"]').attr("content");
        if (this.id == "saveCarVinly") {
            var err = 0;
            if ($(".wrap_brand_car").val().trim() == "") {
                $(".wrap_brand_err_car").addClass("erradd");
                err++;
            } else {
                $(".wrap_brand_err_car").removeClass("erradd");
            }
            if ($(".wrap_color_car").val().trim() == "") {
                $(".wrap_color_err_car").addClass("erradd");
                err++;
            } else {
                $(".wrap_color_err_car").removeClass("erradd");
            }

            if ($("input[name=warranty_radio]:checked").length > 0) {
                $(".is_waranty_car").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_car").addClass("erradd");
            }
            var action_waranty = $("input[name=warranty_radio]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty").val().trim() == "") {
                    err++;
                    $(".company_waranty").addClass("erradd");
                } else {
                    $(".company_waranty").removeClass("erradd");
                }
            }
            var formdataTunnelHandle = new FormData(
                document.getElementById("carvinlyIn")
            );
            msg = "Car/Truck/Suv Added successfully!";
        } else if (this.id == "saveVanVinly") {
            var err = 0;
            if ($(".wrap_brand_van").val().trim() == "") {
                $(".wrap_brand_err_van").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_van").val().trim() == "") {
                $(".wrap_color_err_van").addClass("erradd");
                err++;
            }

            if ($("input[name=vantab7]:checked").length > 0) {
                $(".is_waranty_van").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_van").addClass("erradd");
            }
            var action_waranty = $("input[name=vantab7]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_van").val().trim() == "") {
                    err++;
                    $(".company_waranty_van").addClass("erradd");
                } else {
                    $(".company_waranty_van").removeClass("erradd");
                }
            }

            var formdataTunnelHandle = new FormData(
                document.getElementById("InsertVanVinly")
            );
            msg = "Van Added successfully!";
        } else if (this.id == "saveRvVinly") {
            var err = 0;
            if ($(".wrap_brand_rv").val().trim() == "") {
                $(".wrap_brand_err_rv").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_rv").val().trim() == "") {
                $(".wrap_color_err_rv").addClass("erradd");
                err++;
            }

            if ($("input[name=rvtab4]:checked").length > 0) {
                $(".is_waranty_rv").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_rv").addClass("erradd");
            }
            var action_waranty = $("input[name=rvtab4]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_rv").val().trim() == "") {
                    err++;
                    $(".company_waranty_rv").addClass("erradd");
                } else {
                    $(".company_waranty_rv").removeClass("erradd");
                }
            }

            var formdataTunnelHandle = new FormData(
                document.getElementById("InsertRvVinly1")
            );
            msg = "RV Added successfully!";
        } else if (this.id == "savetrailerVinly") {
            var err = 0;
            if ($(".wrap_brand_trailer").val().trim() == "") {
                $(".wrap_brand_err_trailer").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_trailer").val().trim() == "") {
                $(".wrap_color_err_trailer").addClass("erradd");
                err++;
            }

            if ($("input[name=trailertab4]:checked").length > 0) {
                $(".is_waranty_trailer").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_trailer").addClass("erradd");
            }
            var action_waranty = $("input[name=trailertab4]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_trailer").val().trim() == "") {
                    err++;
                    $(".company_waranty_trailer").addClass("erradd");
                } else {
                    $(".company_waranty_trailer").removeClass("erradd");
                }
            }

            msg = "Trailer Added successfully!";
            var formdataTunnelHandle = new FormData(
                document.getElementById("InsertTrailerVinly")
            );
        } else if (this.id == "saveBusVinly") {
            var err = 0;
            if ($(".wrap_brand_bus").val().trim() == "") {
                $(".wrap_brand_err_bus").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_bus").val().trim() == "") {
                $(".wrap_color_err_bus").addClass("erradd");
                err++;
            }

            if ($("input[name=bustab4]:checked").length > 0) {
                $(".is_waranty_bus").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_bus").addClass("erradd");
            }
            var action_waranty = $("input[name=bustab4]:checked").val();
            if (action_waranty == "Yes") {
                if ($(".company_waranty_bus").val().trim() == "") {
                    err++;
                    $(".company_waranty_bus").addClass("erradd");
                } else {
                    $(".company_waranty_bus").removeClass("erradd");
                }
            }

            msg = "Bus Added successfully!";
            var formdataTunnelHandle = new FormData(
                document.getElementById("InsertBusVinly")
            );
        } else if (this.id == "saveOtherVinly") {
            var err = 0;
            if ($(".wrap_brand_other").val().trim() == "") {
                $(".wrap_brand_err_other").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_other").val().trim() == "") {
                $(".wrap_color_err_other").addClass("erradd");
                err++;
            }

            if ($("input[name=vinyl_other_warranty]:checked").length > 0) {
                $(".is_waranty_other").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_other").addClass("erradd");
            }
            var action_waranty = $(
                "input[name=vinyl_other_warranty]:checked"
            ).val();
            if (action_waranty == "Yes") {
                if ($(".company_waranty_other").val().trim() == "") {
                    err++;
                    $(".company_waranty_other").addClass("erradd");
                } else {
                    $(".company_waranty_other").removeClass("erradd");
                }
            }

            msg = "Other Added successfully!";
            var formdataTunnelHandle = new FormData(
                document.getElementById("InsertOtherVinly")
            );
        }

        formdataTunnelHandle.append("remove_products_ids", remove_products_ids);
        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-vinly-car",
                type: "POST",
                data: formdataTunnelHandle,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });
    $(document).on("click", ".insertTireForm", function () {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var err = 0;
        $(".myerr").removeClass("erradd");
        if ($("#driver_front_psi").val().trim() != "") {
            if ($("#driver_front_psi").val().trim() == "") {
                err++;
                $("#driver_front_psi").addClass("erradd");
            }
            if ($("#driver_front_depth").val().trim() == "") {
                err++;
                $("#driver_front_depth").addClass("erradd");
            }
            if ($("#driver_front_brand").val().trim() == "") {
                err++;
                $("#driver_front_brand").addClass("erradd");
            }
            if ($("#driver_front_tire_size").val().trim() == "") {
                err++;
                $("#driver_front_tire_size").addClass("erradd");
            }
        }
        //rear
        if ($("#driver_rear_psi").val().trim() != "") {
            if ($("#driver_rear_psi").val().trim() == "") {
                err++;
                $("#driver_rear_psi").addClass("erradd");
            }
            if ($("#driver_rear_depth").val().trim() == "") {
                err++;
                $("#driver_rear_depth").addClass("erradd");
            }
            if ($("#driver_rear_brand").val().trim() == "") {
                err++;
                $("#driver_rear_brand").addClass("erradd");
            }
            if ($("#driver_rear_size").val().trim() == "") {
                err++;
                $("#driver_rear_size").addClass("erradd");
            }
        }
        //passenger
        if ($("#passenger_front_psi").val().trim() != "") {
            if ($("#passenger_front_psi").val().trim() == "") {
                err++;
                $("#passenger_front_psi").addClass("erradd");
            }
            if ($("#passenger_front_depth").val().trim() == "") {
                err++;
                $("#passenger_front_depth").addClass("erradd");
            }
            if ($("#passenger_front_brand").val().trim() == "") {
                err++;
                $("#passenger_front_brand").addClass("erradd");
            }
            if ($("#passenger_front_size").val().trim() == "") {
                err++;
                $("#passenger_front_size").addClass("erradd");
            }
        }
        //passenger rear
        if ($("#passenger_rear_psi").val().trim() != "") {
            if ($("#passenger_rear_psi").val().trim() == "") {
                err++;
                $("#passenger_rear_psi").addClass("erradd");
            }
            if ($("#passenger_rear_depth").val().trim() == "") {
                err++;
                $("#passenger_rear_depth").addClass("erradd");
            }
            if ($("#passenger_rear_brand").val().trim() == "") {
                err++;
                $("#passenger_rear_brand").addClass("erradd");
            }
            if ($("#passenger_rear_size").val().trim() == "") {
                err++;
                $("#passenger_rear_size").addClass("erradd");
            }
        }
        if (err == 0) {
            var formDataTire = new FormData(
                document.getElementById("saveTires")
            );
            formDataTire.append("remove_products_ids", remove_products_ids);
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-tires",
                type: "POST",
                data: formDataTire,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#tintSave", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");
        if ($("#tint_id").val().trim() == "") {
            if ($(".tint_manufacture").val().trim() == "") {
                err++;
                $(".tint_manufacture").addClass("erradd");
            } else {
                $(".tint_manufacture").removeClass("erradd");
            }
            if ($("input[name=tint_type]:checked").length > 0) {
                $(".tint_types").removeClass("erradd");
            } else {
                err++;
                $(".tint_types").addClass("erradd");
            }
            if ($("input[name=tint_oem_match]:checked").length > 0) {
                $("#tint_oem_matchs").removeClass("erradd");
            } else {
                err++;
                $("#tint_oem_matchs").addClass("erradd");
            }
            if ($(".oem_manufacturer").val().trim() == "") {
                err++;
                $(".oem_manufacturer").addClass("erradd");
            } else {
                $(".oem_manufacturer").removeClass("erradd");
            }

            // if ($("input[name=tint_warranty]:checked").length > 0) {
            //     $(".tints_warranty").removeClass("erradd");
            // } else {
            //     err++;
            //     $(".tints_warranty").addClass("erradd");
            // }

            // if ($(".waranty_company").val().trim() == "") {
            //     err++;
            //     $(".waranty_company").addClass("erradd");
            // } else {
            //     $(".waranty_company").removeClass("erradd");
            // }
        } else {
            // if ($(".waranty_company").val().trim() == "") {
            //     err++;
            //     $(".waranty_company").addClass("erradd");
            // } else {
            //     $(".waranty_company").removeClass("erradd");
            // }
            if ($(".oem_manufacturer").val().trim() == "") {
                err++;
                $(".oem_manufacturer").addClass("erradd");
            } else {
                $(".oem_manufacturer").removeClass("erradd");
            }
            if ($(".tint_manufacture").val().trim() == "") {
                err++;
                $(".tint_manufacture").addClass("erradd");
            } else {
                $(".tint_manufacture").removeClass("erradd");
            }
        }
        var formDatatint = new FormData(document.getElementById("saveTint"));
        if (err === 0) {
            $(".loader").show();

            formDatatint.append("remove_products_ids", remove_products_ids);
            $.ajax({
                url: "/shop-settings/save-tintService",
                type: "POST",
                data: formDatatint,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveCollision", function () {
        var err = 0;

        var formDatacollision = new FormData(
            document.getElementById("collisionSave")
        );

        $(".loader").show();

        formDatacollision.append(
            "remove_products_ids_four",
            remove_products_ids_four
        );
        formDatacollision.append(
            "remove_products_ids_one",
            remove_products_ids_one
        );
        formDatacollision.append(
            "remove_products_ids_two",
            remove_products_ids_two
        );
        formDatacollision.append(
            "remove_products_ids_three",
            remove_products_ids_three
        );
        $.ajax({
            url: "/shop-settings/save-collision-repair",
            type: "POST",
            data: formDatacollision,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#electricSave", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".system").val().trim() == "") {
            err++;
            $(".system").addClass("erradd");
        } else {
            $(".system").removeClass("erradd");
        }
        if ($(".diagnosis-electric").val().trim() == "") {
            err++;
            $(".diagnosis-electric").addClass("erradd");
        } else {
            $(".diagnosis-electric").removeClass("erradd");
        }
        if ($("input[name=action]:checked").length > 0) {
            $(".electric-action").removeClass("erradd");
        } else {
            err++;
            $(".electric-action").addClass("erradd");
        }

        if ($("input[name=is_waranty]:checked").length > 0) {
            $(".is_waranty").removeClass("erradd");
        } else {
            err++;
            $(".is_waranty").addClass("erradd");
        }

        var action_electric = $("input[name=is_waranty]:checked").val();

        if (action_electric == "Yes") {
            if ($(".waranty_company").val().trim() == "") {
                err++;
                $(".waranty_company").addClass("erradd");
            } else {
                $(".waranty_company").removeClass("erradd");
            }
        }

        if ($(".manufacturer_by").val().trim() == "") {
            err++;
            $(".manufacturer_by").addClass("erradd");
        } else {
            $(".manufacturer_by").removeClass("erradd");
        }
        if (err == 0) {
            var formDataelectriccontrol = new FormData(
                document.getElementById("electricData")
            );

            $(".loader").show();

            formDataelectriccontrol.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-electric-control",
                type: "POST",
                data: formDataelectriccontrol,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    function modalError() {
        const modal_error = `<div class="modal fade" id="modal_pdf_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Error</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="error_modal">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue</button>
            </div>
          </div>
        </div>
      </div>`;
        return modal_error;
    }

    $(document).on("click", "#specialtyOtherSave", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".detail_of_services").val().trim() == "") {
            err++;
            $(".detail_of_services").addClass("erradd");
        } else {
            $(".detail_of_services").removeClass("erradd");
        }
        if ($(".list_of_specialty").val().trim() == "") {
            err++;
            $(".list_of_specialty").addClass("erradd");
        } else {
            $(".list_of_specialty").removeClass("erradd");
        }

        if (err == 0) {
            var formDataspecialty = new FormData(
                document.getElementById("specialtyData")
            );

            $(".loader").show();

            formDataspecialty.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-specialty-other",
                type: "POST",
                data: formDataspecialty,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    // response = JSON.parse(response);
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#savePowderCoating", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".was_powder_coating").val().trim() == "") {
            err++;
            $(".was_powder_coating").addClass("erradd");
        } else {
            $(".was_powder_coating").removeClass("erradd");
        }
        if ($(".pc_system").val().trim() == "") {
            err++;
            $(".pc_system").addClass("erradd");
        } else {
            $(".pc_system").removeClass("erradd");
        }
        if ($(".color_code").val().trim() == "") {
            err++;
            $(".color_code").addClass("erradd");
        } else {
            $(".color_code").removeClass("erradd");
        }
        if ($(".paint_color").val().trim() == "") {
            err++;
            $(".paint_color").addClass("erradd");
        } else {
            $(".paint_color").removeClass("erradd");
        }
        if ($("input[name=is_waranty]:checked").length > 0) {
            $(".is_waranty").removeClass("erradd");
        } else {
            err++;
            $(".is_waranty").addClass("erradd");
        }

        // if ($(".waranty_company").val().trim() == "") {
        //     err++;
        //     $(".waranty_company").addClass("erradd");
        // } else {
        //     $(".waranty_company").removeClass("erradd");
        // }
        var action_waranty = $("input[name=is_waranty]:checked").val();
        if (action_waranty == "Yes") {
            if ($(".waranty_company").val().trim() == "") {
                err++;
                $(".waranty_company").addClass("erradd");
            } else {
                $(".waranty_company").removeClass("erradd");
            }
        }
        if ($(".manufacturer_by").val().trim() == "") {
            err++;
            $(".manufacturer_by").addClass("erradd");
        } else {
            $(".manufacturer_by").removeClass("erradd");
        }
        if (err == 0) {
            var formpowderCoatingData = new FormData(
                document.getElementById("powderCoatingData")
            );

            $(".loader").show();

            formpowderCoatingData.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-powder-coating",
                type: "POST",
                data: formpowderCoatingData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#transmissionSave", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".fluid_type").val().trim() == "") {
            err++;
            $(".fluid_type").addClass("erradd");
        } else {
            $(".fluid_type").removeClass("erradd");
        }
        if ($(".filter_brand").val().trim() == "") {
            err++;
            $(".filter_brand").addClass("erradd");
        } else {
            $(".filter_brand").removeClass("erradd");
        }
        if ($(".mileage").val().trim() == "") {
            err++;
            $(".mileage").addClass("erradd");
        } else {
            $(".mileage").removeClass("erradd");
        }

        if ($("input[name=service_type]:checked").length > 0) {
            $(".service_type").removeClass("erradd");
        } else {
            err++;
            $(".service_type").addClass("erradd");
        }

        if (err == 0) {
            var formTransmissionData = new FormData(
                document.getElementById("transmissionData")
            );

            $(".loader").show();

            formTransmissionData.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-transmission",
                type: "POST",
                data: formTransmissionData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveSuspension", function () {
        var err = 0;
        if (err == 0) {
            var formsuspensionData = new FormData(
                document.getElementById("suspensionData")
            );

            $(".loader").show();

            formsuspensionData.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-suspension",
                type: "POST",
                data: formsuspensionData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveRaceTrack", function () {
        let track_name = $("#track_name").val();
        let track_location = $("#track_location").val();
        let track_type = $("#track_type").val();
        let zero_to_sixty_mph = $(".zero_to_sixty_mph").val();
        let lap_one_min = $(".lap_one_min").val();
        let lap_one_sec = $(".lap_one_sec").val();
        let lap_two_min = $(".lap_two_min").val();
        let lap_two_sec = $(".lap_two_sec").val();
        let lap_three_min = $(".lap_three_min").val();
        let lap_three_sec = $(".lap_three_sec").val();
        let lap_four_min = $(".lap_four_min").val();
        let lap_four_sec = $(".lap_four_sec").val();
        let products_uploaded = $(".products_uploaded_image")[0].files;
        let carShopService = $("#servicedata").val();
        let race_track_id = $(".race_track_id").val();
        let l = products_uploaded.length;

        var formdataRace = new FormData();
        for (let i = 0; i <= l - 1; i++) {
            formdataRace.append(
                `products_uploaded[${i}]`,
                products_uploaded[i]
            );
        }
        formdataRace.append("race_track_id", race_track_id);
        formdataRace.append("track_name", track_name);
        formdataRace.append("track_location", track_location);
        formdataRace.append("track_type", track_type);
        formdataRace.append("zero_to_sixty_mph", zero_to_sixty_mph);
        formdataRace.append("lap_one_min", lap_one_min);
        formdataRace.append("lap_one_sec", lap_one_sec);
        formdataRace.append("lap_two_min", lap_two_min);
        formdataRace.append("lap_two_sec", lap_two_sec);
        formdataRace.append("lap_three_min", lap_three_min);
        formdataRace.append("lap_three_sec", lap_three_sec);
        formdataRace.append("lap_four_min", lap_four_min);
        formdataRace.append("lap_four_sec", lap_four_sec);
        formdataRace.append("products_uploaded", products_uploaded);
        formdataRace.append("carShopService", carShopService);
        var err = 0;
        if ($("#track_name").val().trim() == "") {
            err++;
            $("#track_name").addClass("erradd");
        } else {
            $("#track_name").removeClass("erradd");
        }
        if ($("#track_location").val().trim() == "") {
            err++;
            $("#track_location").addClass("erradd");
        } else {
            $("#track_location").removeClass("erradd");
        }
        if ($("#track_type").val().trim() == "") {
            err++;
            $("#track_type").addClass("erradd");
        } else {
            $("#track_type").removeClass("erradd");
        }
        if (err == 0) {
            $(".loader").show();

            formdataRace.append("remove_products_ids", remove_products_ids);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/shop-settings/save-race-track",
                type: "POST",
                data: formdataRace,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveRunOne", function () {
        let stripe_name_run_one = $("#stripe_name_run_one").val();
        let stripe_location_run_one = $("#stripe_location_run_one").val();
        let stripe_opponent_run_one = $("#stripe_opponent_run_one").val();
        let stripe_r_or_t_run_one = $("#stripe_r_or_t_run_one").val();
        let stripe_sixty_degree_run_one = $(
            "#stripe_sixty_degree_run_one"
        ).val();
        let stripe_three_hundred_degree_run_one = $(
            "#stripe_three_hundred_degree_run_one"
        ).val();
        let zero_to_sixty_mph_run_one = $("#zero_to_sixty_mph_run_one").val();
        let one_or_eight_mile_run_one = $("#one_or_eight_mile_run_one").val();
        let mph_run_one = $("#mph_run_one").val();
        let one_or_four_mile_run_one = $("#one_or_four_mile_run_one").val();
        let status = $("input[name='status']:checked").val();

        let carShopService = $("#servicedata").val();

        var formdataRace_run_one = new FormData();

        formdataRace_run_one.append("stripe_name_run_one", stripe_name_run_one);
        formdataRace_run_one.append(
            "stripe_location_run_one",
            stripe_location_run_one
        );
        formdataRace_run_one.append(
            "stripe_opponent_run_one",
            stripe_opponent_run_one
        );
        formdataRace_run_one.append(
            "stripe_r_or_t_run_one",
            stripe_r_or_t_run_one
        );
        formdataRace_run_one.append(
            "stripe_sixty_degree_run_one",
            stripe_sixty_degree_run_one
        );
        formdataRace_run_one.append(
            "stripe_three_hundred_degree_run_one",
            stripe_three_hundred_degree_run_one
        );
        formdataRace_run_one.append(
            "zero_to_sixty_mph_run_one",
            zero_to_sixty_mph_run_one
        );
        formdataRace_run_one.append(
            "one_or_eight_mile_run_one",
            one_or_eight_mile_run_one
        );
        formdataRace_run_one.append("mph_run_one", mph_run_one);
        formdataRace_run_one.append(
            "one_or_four_mile_run_one",
            one_or_four_mile_run_one
        );
        let track_name = $("#track_name").val();
        let track_location = $("#track_location").val();
        let track_type = $("#track_type").val();
        formdataRace_run_one.append("track_name", track_name);
        formdataRace_run_one.append("track_location", track_location);
        formdataRace_run_one.append("track_type", track_type);
        formdataRace_run_one.append("status", status);
        formdataRace_run_one.append("tab", $(".tab_one").val());
        formdataRace_run_one.append("carShopService", carShopService);
        var err = 0;
        if (stripe_name_run_one == "") {
            err++;
        }

        if ($("#stripe_name_run_one").val().trim() == "") {
            err++;
            $("#stripe_name_run_one").addClass("erradd");
        } else {
            $("#stripe_name_run_one").removeClass("erradd");
        }
        if ($("#track_name").val().trim() == "") {
            err++;
            $("#track_name").addClass("erradd");
        } else {
            $("#track_name").removeClass("erradd");
        }
        if ($("#track_location").val().trim() == "") {
            err++;
            $("#track_location").addClass("erradd");
        } else {
            $("#track_location").removeClass("erradd");
        }
        if ($("#track_type").val().trim() == "") {
            err++;
            $("#track_type").addClass("erradd");
        } else {
            $("#track_type").removeClass("erradd");
        }
        if (err == 0) {
            $(".loader").show();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/shop-settings/save-race-track",
                type: "POST",
                data: formdataRace_run_one,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    var data = JSON.parse(response);
                    if (data.status == "tab") {
                        $(".race_track_id").val(data.id);
                    }
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        $(".run_two").css("pointer-events", "auto");

                        toastr.success(
                            "Run 1 Added Successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveRunTwo", function () {
        let stripe_name_run_two = $(".stripe_name_run_two").val();
        let stripe_location_run_two = $(".stripe_location_run_two").val();
        let stripe_opponent_run_two = $(".stripe_opponent_run_two").val();
        let stripe_r_or_t_run_two = $(".stripe_r_or_t_run_two").val();
        let stripe_sixty_degree_run_two = $(
            ".stripe_sixty_degree_run_two"
        ).val();
        let stripe_three_hundred_degree_run_two = $(
            ".stripe_three_hundred_degree_run_two"
        ).val();
        let zero_to_sixty_mph_run_two = $(".zero_to_sixty_mph_run_two").val();
        let one_or_eight_mile_run_two = $(".one_or_eight_mile_run_two").val();
        let mph_run_two = $(".mph_run_two").val();
        let one_or_four_mile_run_two = $(".one_or_four_mile_run_two").val();
        let status_two = $("input[name='status_two']:checked").val();
        let race_track_id = $(".race_track_id").val();
        let carShopService = $("#servicedata").val();

        var formdataRace_run_one = new FormData();

        formdataRace_run_one.append("stripe_name_run_two", stripe_name_run_two);
        formdataRace_run_one.append(
            "stripe_location_run_two",
            stripe_location_run_two
        );
        formdataRace_run_one.append("race_track_id", race_track_id);
        formdataRace_run_one.append(
            "stripe_opponent_run_two",
            stripe_opponent_run_two
        );
        formdataRace_run_one.append(
            "stripe_r_or_t_run_two",
            stripe_r_or_t_run_two
        );
        formdataRace_run_one.append(
            "stripe_sixty_degree_run_two",
            stripe_sixty_degree_run_two
        );
        formdataRace_run_one.append(
            "stripe_three_hundred_degree_run_two",
            stripe_three_hundred_degree_run_two
        );
        formdataRace_run_one.append(
            "zero_to_sixty_mph_run_two",
            zero_to_sixty_mph_run_two
        );
        formdataRace_run_one.append(
            "one_or_eight_mile_run_two",
            one_or_eight_mile_run_two
        );
        formdataRace_run_one.append("mph_run_two", mph_run_two);
        formdataRace_run_one.append(
            "one_or_four_mile_run_two",
            one_or_four_mile_run_two
        );
        let track_name = $("#track_name").val();
        let track_location = $("#track_location").val();
        let track_type = $("#track_type").val();
        formdataRace_run_one.append("track_name", track_name);
        formdataRace_run_one.append("track_location", track_location);
        formdataRace_run_one.append("track_type", track_type);
        formdataRace_run_one.append("status_two", status_two);
        formdataRace_run_one.append("tab", $(".tab_two").val());
        formdataRace_run_one.append("carShopService", carShopService);
        formdataRace_run_one.append(
            "runonecheck",
            $("#stripe_name_run_one").val().trim()
        );
        var err = 0;

        if ($(".stripe_name_run_two").val().trim() == "") {
            err++;
            $(".stripe_name_run_two").addClass("erradd");
        } else {
            $(".stripe_name_run_two").removeClass("erradd");
        }
        if ($("#track_name").val().trim() == "") {
            err++;
            $("#track_name").addClass("erradd");
        } else {
            $("#track_name").removeClass("erradd");
        }
        if ($("#track_location").val().trim() == "") {
            err++;
            $("#track_location").addClass("erradd");
        } else {
            $("#track_location").removeClass("erradd");
        }
        if ($("#track_type").val().trim() == "") {
            err++;
            $("#track_type").addClass("erradd");
        } else {
            $("#track_type").removeClass("erradd");
        }
        if (err == 0) {
            // $(".loader").show();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/shop-settings/save-race-track",
                type: "POST",
                data: formdataRace_run_one,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    var data = JSON.parse(response);
                    if (data.status == "tab") {
                        $(".race_track_id").val(data.id);
                    }

                    if (response.trim() == "runout1") {
                        toastr.error(
                            "Please Enter Run 1 First",
                            "Shop Settings"
                        );
                    } else {
                        $(".run_three").css("pointer-events", "auto");

                        toastr.success(
                            "Run 2 Added Successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveRunThree", function () {
        let stripe_name_run_three = $(".stripe_name_run_three").val();
        let stripe_location_run_three = $(".stripe_location_run_three").val();
        let stripe_opponent_run_three = $(".stripe_opponent_run_three").val();
        let stripe_r_or_t_run_three = $(".stripe_r_or_t_run_three").val();
        let race_track_id = $(".race_track_id").val();
        let stripe_sixty_degree_run_three = $(
            ".stripe_sixty_degree_run_three"
        ).val();
        let stripe_three_hundred_degree_run_three = $(
            ".stripe_three_hundred_degree_run_three"
        ).val();
        let zero_to_sixty_mph_run_three = $(
            ".zero_to_sixty_mph_run_three"
        ).val();
        let one_or_eight_mile_run_three = $(
            ".one_or_eight_mile_run_three"
        ).val();
        let mph_run_three = $(".mph_run_three").val();
        let one_or_four_mile_run_three = $(".one_or_four_mile_run_three").val();
        let status_three = $("input[name='status_three']:checked").val();

        let carShopService = $("#servicedata").val();

        var formdataRace_run_one = new FormData();

        formdataRace_run_one.append(
            "stripe_name_run_three",
            stripe_name_run_three
        );
        formdataRace_run_one.append("race_track_id", race_track_id);
        formdataRace_run_one.append(
            "stripe_location_run_three",
            stripe_location_run_three
        );
        formdataRace_run_one.append(
            "stripe_opponent_run_three",
            stripe_opponent_run_three
        );
        formdataRace_run_one.append(
            "stripe_r_or_t_run_three",
            stripe_r_or_t_run_three
        );
        formdataRace_run_one.append(
            "stripe_sixty_degree_run_three",
            stripe_sixty_degree_run_three
        );
        formdataRace_run_one.append(
            "stripe_three_hundred_degree_run_three",
            stripe_three_hundred_degree_run_three
        );
        formdataRace_run_one.append(
            "zero_to_sixty_mph_run_three",
            zero_to_sixty_mph_run_three
        );
        formdataRace_run_one.append(
            "one_or_eight_mile_run_three",
            one_or_eight_mile_run_three
        );
        formdataRace_run_one.append("mph_run_three", mph_run_three);
        formdataRace_run_one.append(
            "one_or_four_mile_run_three",
            one_or_four_mile_run_three
        );
        let track_name = $("#track_name").val();
        let track_location = $("#track_location").val();
        let track_type = $("#track_type").val();
        formdataRace_run_one.append("track_name", track_name);
        formdataRace_run_one.append("track_location", track_location);
        formdataRace_run_one.append("track_type", track_type);
        formdataRace_run_one.append("status_three", status_three);
        formdataRace_run_one.append("tab", $(".tab_three").val());
        formdataRace_run_one.append("carShopService", carShopService);
        formdataRace_run_one.append(
            "runtwocheck",
            $(".stripe_name_run_two").val().trim()
        );
        formdataRace_run_one.append(
            "runonecheck",
            $("#stripe_name_run_one").val().trim()
        );
        var err = 0;
        if ($(".stripe_name_run_three").val().trim() == "") {
            err++;
            $(".stripe_name_run_three").addClass("erradd");
        } else {
            $(".stripe_name_run_three").removeClass("erradd");
        }
        if (err == 0) {
            $(".loader").show();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/shop-settings/save-race-track",
                type: "POST",
                data: formdataRace_run_one,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    var data = JSON.parse(response);
                    if (data.status == "tab") {
                        $(".race_track_id").val(data.id);
                    }
                    if (response.trim() == "runtwocheck") {
                        toastr.error(
                            "Please enter run 2 first",
                            "Shop Settings"
                        );
                    } else {
                        toastr.success(
                            "Run 3 successfully add",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#savePaintBody", function () {
        var formPaintBodyData = new FormData(
            document.getElementById("paintbodyData")
        );
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".body_panels_repaired_or_replaced").val().trim() == "") {
            err++;
            $(".body_panels_repaired_or_replaced").addClass("erradd");
        } else {
            $(".body_panels_repaired_or_replaced").removeClass("erradd");
        }
        if ($(".paint_manufacturer").val().trim() == "") {
            err++;
            $(".paint_manufacturer").addClass("erradd");
        } else {
            $(".paint_manufacturer").removeClass("erradd");
        }

        if ($(".paint_code").val().trim() == "") {
            $(".paint_code").addClass("erradd");
        } else {
            $(".paint_code").removeClass("erradd");
        }

        if ($(".paint_color").val().trim() == "") {
            err++;
            $(".paint_color").addClass("erradd");
        } else {
            $(".paint_color").removeClass("erradd");
        }

        if (err == 0) {
            $(".loader").show();

            formPaintBodyData.append(
                "remove_products_ids",
                remove_products_ids
            );
            $.ajax({
                url: "/shop-settings/save-paint-body",
                type: "POST",
                data: formPaintBodyData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveMechanic", function () {
        var formMechanicData = new FormData(
            document.getElementById("mechanicData")
        );

        $(".loader").show();

        formMechanicData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-mechanic",
            type: "POST",
            data: formMechanicData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveFabricationWelding", function () {
        var formfabricationweldingData = new FormData(
            document.getElementById("fabricationweldingData")
        );

        $(".loader").show();

        formfabricationweldingData.append(
            "remove_products_ids",
            remove_products_ids
        );
        $.ajax({
            url: "/shop-settings/save-fabrication-welding",
            type: "POST",
            data: formfabricationweldingData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveFuelSystem", function () {
        var fuelsystemData = new FormData(
            document.getElementById("fuelsystemData")
        );

        $(".loader").show();

        fuelsystemData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-fuel-system",
            type: "POST",
            data: fuelsystemData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveFuelSystem", function () {
        var fuelsystemData = new FormData(
            document.getElementById("fuelsystemData")
        );

        $(".loader").show();

        fuelsystemData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-fuel-system",
            type: "POST",
            data: fuelsystemData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveNitrous", function () {
        var nitrousData = new FormData(document.getElementById("nitrousData"));

        $(".loader").show();

        nitrousData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-nitrous",
            type: "POST",
            data: nitrousData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#savePDT", function () {
        var pdtData = new FormData(document.getElementById("pdtData"));

        $(".loader").show();

        pdtData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-performance-dyno-tuning",
            type: "POST",
            data: pdtData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveCustomBuildBody", function () {
        var formcustombuildbodyData = new FormData(
            document.getElementById("custombuildbodyData")
        );

        $(".loader").show();

        formcustombuildbodyData.append(
            "remove_products_ids",
            remove_products_ids
        );
        $.ajax({
            url: "/shop-settings/save-custom-build-body",
            type: "POST",
            data: formcustombuildbodyData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveDealerShip", function () {
        var formdealerShipData = new FormData(
            document.getElementById("dealerShipData")
        );

        $(".loader").show();

        formdealerShipData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-dealership-service",
            type: "POST",
            data: formdealerShipData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveLubrication", function () {
        var lubricationData = new FormData(
            document.getElementById("lubricationData")
        );

        $(".loader").show();

        lubricationData.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-lubrication",
            type: "POST",
            data: lubricationData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#saveBatteryService", function () {
        var formbatteryServiceData = new FormData(
            document.getElementById("batteryServiceData")
        );

        $(".loader").show();

        formbatteryServiceData.append(
            "remove_products_ids",
            remove_products_ids
        );
        $.ajax({
            url: "/shop-settings/save-battery-service",
            type: "POST",
            data: formbatteryServiceData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#rimRepairSave", function () {
        var formrimRepairData = new FormData(
            document.getElementById("rimRepairData")
        );

        $(".loader").show();

        formrimRepairData.append(
            "remove_products_ids_four",
            remove_products_ids_four
        );
        formrimRepairData.append(
            "remove_products_ids_three",
            remove_products_ids_three
        );
        $.ajax({
            url: "/shop-settings/save-rim-repair",
            type: "POST",
            data: formrimRepairData,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (response) {
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(
                        "Service added successfully",
                        "Shop Settings"
                    );
                }
            },
        });
    });

    $(document).on("click", "#savePart", function () {
        var err = 0;
        $(".myerr").removeClass("erradd");

        if ($(".system").val().trim() == "") {
            err++;
            $(".system").addClass("erradd");
        } else {
            $(".system").removeClass("erradd");
        }
        if ($(".diagnosis").val().trim() == "") {
            err++;
            $(".diagnosis").addClass("erradd");
        } else {
            $(".diagnosis").removeClass("erradd");
        }
        if ($("input[name=part]:checked").length > 0) {
            $(".part_cl").removeClass("erradd");
        } else {
            err++;
            $(".part_cl").addClass("erradd");
        }

        if ($("input[name=is_waranty]:checked").length > 0) {
            $(".is_waranty").removeClass("erradd");
        } else {
            err++;
            $(".is_waranty").addClass("erradd");
        }

        var action_waranty = $("input[name=is_waranty]:checked").val();

        if (action_waranty == "Yes") {
            if ($(".waranty_company").val().trim() == "") {
                err++;
                $(".waranty_company").addClass("erradd");
            } else {
                $(".waranty_company").removeClass("erradd");
            }
        }

        if ($(".manufacturer_by").val().trim() == "") {
            err++;
            $(".manufacturer_by").addClass("erradd");
        } else {
            $(".manufacturer_by").removeClass("erradd");
        }

        if ($(".part_number").val().trim() == "") {
            err++;
            $(".part_number").addClass("erradd");
        } else {
            $(".part_number").removeClass("erradd");
        }
        if (err == 0) {
            var formDatapart = new FormData(
                document.getElementById("partData")
            );

            $(".loader").show();

            formDatapart.append("remove_products_ids", remove_products_ids);
            $.ajax({
                url: "/shop-settings/save-parts",
                type: "POST",
                data: formDatapart,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", ".insertOilServices", function () {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var err = 0;
        var favProgramming = [];
        $(".myerr").removeClass("erradd");
        if ($("#oil_mileage").val().trim() == "") {
            err++;
            $("#oil_mileage").addClass("erradd");
        }
        if ($("#oil_type").val().trim() == "") {
            err++;
            $("#oil_type").addClass("erradd");
        }
        if ($("#oil_brand").val().trim() == "") {
            err++;
            $("#oil_brand").addClass("erradd");
        }
        if ($("#oil_amount_added").val().trim() == "") {
            err++;
            $("#oil_amount_added").addClass("erradd");
        }
        if ($("#oil_filter_type").val().trim() == "") {
            err++;
            $("#oil_filter_type").addClass("erradd");
        }
        if ($("#oil_filter_brand").val().trim() == "") {
            err++;
            $("#oil_filter_brand").addClass("erradd");
        }
        if (
            $("input[type='checkbox'][name='oil_fluid_service']:checked").length
        ) {
            $(".newerrr").hide();
        } else {
            err++;
            $(".newerrr").show();
        }

        if (err == 0) {
            var fluidServices = $("input[name='oil_fluid_service']:checked")
                .map(function () {
                    return this.value;
                })
                .get()
                .join(", ");
            var formDataOil = new FormData(
                document.getElementById("SaveOilData")
            );
            formDataOil.append("remove_products_ids", remove_products_ids);
            formDataOil.append("fluid_chk_services", fluidServices);
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-OilServices",
                type: "POST",
                data: formDataOil,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", ".InsertBreakService", function () {
        var formDataOil = new FormData(document.getElementById("saveBreak"));
        formDataOil.append("remove_products_ids", remove_products_ids);
        var err = 0;
        $("#brake_fluid").removeClass("erradd");
        if ($("#chkfluiddate").val() == 0) {
            if ($("#brake_fluid").val().trim() == "") {
                err++;
                $("#brake_fluid").addClass("erradd");
            }
        }

        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-break",
                type: "POST",
                data: formDataOil,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(".vehicle_type").on("click", function () {
        var type = $(this).attr("aria-controls");
        $("#vehicle_type").val(type);
    });

    $(document).on("click", "#savePaintlessDentRepair", function () {
        var formDataPaintlessDentRepair = new FormData(
            document.getElementById("storePaintlessDentRepair")
        );
        formDataPaintlessDentRepair.append(
            "remove_products_ids",
            remove_products_ids
        );
        var err = 0;
        var damage_type = $("input[name=damage_type]:checked").val();
        if (damage_type === undefined) {
            err++;
            $("#damage_type_err").addClass("erradd");
        }

        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-paintless-dent-repair-pdr",
                type: "POST",
                data: formDataPaintlessDentRepair,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(".check_inp").on("keyup", function () {
        var inputs = $(".check_inp");
        var check_input = 0;
        for (var i = 0; i < inputs.length; i++) {
            var val = $(inputs[i]).val().trim();
            if (val == "") {
                check_input++;
                $(".next-btn").prop("disabled", true);
                $(".current").prop("disabled", true);
            }
        }
        if (check_input == 0) {
            $(".next-btn").prop("disabled", false);
            $(".current").prop("disabled", false);
        }
    });

    $(document).ready(function () {
        var inputs = $(".check_inp");
        var check_input = 0;
        for (var i = 0; i < inputs.length; i++) {
            var val = $(inputs[i]).val().trim();
            if (val == "") {
                check_input++;
                $(".next-btn").prop("disabled", true);
                $(".current").prop("disabled", true);
            }
        }

        if (check_input == 0) {
            $(".next-btn").prop("disabled", false);
            $(".current").prop("disabled", false);
        }
    });

    $(".next-btn").on("click", function () {
        $("#align-after-tab").click();
    });

    $("#align-after-tab").click(function () {
        $("#align-before-tab").removeClass("active");
        $("#align-before-tab").removeClass("show");
        $("#align-before").removeClass("active");
        $("#align-before").removeClass("show");
        $(this).addClass("show");
        $(this).addClass("active");
        $("#align-after").addClass("active");
        $("#align-after").addClass("show");
    });

    $(document).on("click", "#saveFrameAlignment", function () {
        var formDataFrameAlignment = new FormData(
            document.getElementById("storeFrameAlignment")
        );
        var err = 0;

        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-frame-alignment",
                type: "POST",
                data: formDataFrameAlignment,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveCreamicCoating", function () {
        var err = 0;

        if ($(".coating_manufacturer").val().trim() == "") {
            err++;
            $(".coating_manufacturer").addClass("erradd");
        }

        if ($("input[name=registered]:checked").length > 0) {
            $(".registered_err").removeClass("erradd");
        } else {
            err++;
            $(".registered_err").addClass("erradd");
        }

        var action_registered_company = $(
            "input[name=registered]:checked"
        ).val();

        if (action_registered_company == "Yes") {
            if ($(".registered_company").val().trim() == "") {
                err++;
                $(".registered_company").addClass("erradd");
            } else {
                $(".registered_company").removeClass("erradd");
            }
        }

        if ($("input[name=is_waranty]:checked").length > 0) {
            $(".is_waranty").removeClass("erradd");
        } else {
            err++;
            $(".is_waranty").addClass("erradd");
        }

        var action_waranty = $("input[name=is_waranty]:checked").val();

        if (action_waranty == "Yes") {
            if ($(".company_waranty").val().trim() == "") {
                err++;
                $(".company_waranty").addClass("erradd");
            } else {
                $(".company_waranty").removeClass("erradd");
            }
        }

        if ($("input[name=annual_required]:checked").length > 0) {
            $(".annual_required").removeClass("erradd");
        } else {
            err++;
            $(".annual_required").addClass("erradd");
        }

        var formDataCreamicCoating = new FormData(
            document.getElementById("creamicCoatingData")
        );
        formDataCreamicCoating.append(
            "remove_products_ids",
            remove_products_ids
        );
        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-ceramic-coating",
                type: "POST",
                data: formDataCreamicCoating,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", ".saveVehicle", function () {
        var err = 0;

        var id = $(this).attr("id");

        if (id == "Wheeler-cab") {
            var formDataVehicle = new FormData(
                document.getElementById("wheelercabData")
            );
        }
        if (id == "saveBus") {
            var formDataVehicle = new FormData(
                document.getElementById("busData")
            );
        }

        if (id == "saveCamperLG") {
            var formDataVehicle = new FormData(
                document.getElementById("camperLargeData")
            );
        }

        var unit = $("input[name=units1]:checked").val();
        formDataVehicle.append("unit", unit);
        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-vehicle-data",
                type: "POST",
                data: formDataVehicle,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveCorrection", function () {
        var err = 0;
        var formDatacorrectionData = new FormData(
            document.getElementById("correctionData")
        );
        formDatacorrectionData.append(
            "remove_products_ids",
            remove_products_ids
        );
        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-detailing",
                type: "POST",
                data: formDatacorrectionData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#saveCleaning", function () {
        var err = 0;
        var formDatacleaningData = new FormData(
            document.getElementById("cleaningData")
        );
        formDatacleaningData.append("remove_products_ids", remove_products_ids);
        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-detailing",
                type: "POST",
                data: formDatacleaningData,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", "#savePPF", function () {
        var err = 0;

        if ($(".film_manufacturer").val().trim() == "") {
            err++;
            $(".film_manufacturer_err").addClass("erradd");
        }

        if ($("input[name=film_thickness]:checked").length > 0) {
            $(".film_thickness_err").removeClass("erradd");
        } else {
            err++;
            $(".film_thickness_err").addClass("erradd");
        }

        if ($("input[name=registered]:checked").length > 0) {
            $(".registered_err").removeClass("erradd");
        } else {
            err++;
            $(".registered_err").addClass("erradd");
        }

        var action_registered_company = $(
            "input[name=registered]:checked"
        ).val();

        if (action_registered_company == "Yes") {
            if ($(".registered_company").val().trim() == "") {
                err++;
                $(".registered_company").addClass("erradd");
            } else {
                $(".registered_company").removeClass("erradd");
            }
        }

        if ($("input[name=is_waranty]:checked").length > 0) {
            $(".is_waranty").removeClass("erradd");
        } else {
            err++;
            $(".is_waranty").addClass("erradd");
        }
        var action_waranty = $("input[name=is_waranty]:checked").val();

        if (action_waranty == "Yes") {
            if ($(".waranty_company").val().trim() == "") {
                err++;
                $(".waranty_company").addClass("erradd");
            } else {
                $(".waranty_company").removeClass("erradd");
            }
        }

        if ($("input[name=annual_required]:checked").length > 0) {
            $(".annual_required").removeClass("erradd");
        } else {
            err++;
            $(".annual_required").addClass("erradd");
        }

        var formDataPPF = new FormData(document.getElementById("storePPF"));
        formDataPPF.append("remove_products_ids", remove_products_ids);

        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-paint-protection-film-ppf",
                type: "POST",
                data: formDataPPF,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        $(".url-disable").attr("href", response);
                        $(".url-disable").css("pointer-events", "auto");

                        // window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", ".saveCarDataInsertDetail", function () {
        var msg = "";
        let _token = $('meta[name="csrf-token"]').attr("content");
        if (this.id == "saveCarDataPPF") {
            var err = 0;
            if ($(".wrap_brand_car").val().trim() == "") {
                $(".wrap_brand_err_car").addClass("erradd");
                err++;
            } else {
                $(".wrap_brand_err_car").removeClass("erradd");
            }
            if ($(".wrap_color_car").val().trim() == "") {
                $(".wrap_color_err_car").addClass("erradd");
                err++;
            } else {
                $(".wrap_color_err_car").removeClass("erradd");
            }

            if ($("input[name=is_waranty_car]:checked").length > 0) {
                $(".is_waranty_car").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_car").addClass("erradd");
            }
            var action_waranty = $("input[name=is_waranty_car]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty").val().trim() == "") {
                    err++;
                    $(".company_waranty").addClass("erradd");
                } else {
                    $(".company_waranty").removeClass("erradd");
                }
            }

            var formdataPPF = new FormData(
                document.getElementById("savecarPPF")
            );
            msg = "Car/Truck/Suv Added successfully!";
        } else if (this.id == "saveVan") {
            var err = 0;
            if ($(".wrap_brand_van").val().trim() == "") {
                $(".wrap_brand_err_van").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_van").val().trim() == "") {
                $(".wrap_color_err_van").addClass("erradd");
                err++;
            }

            if ($("input[name=is_waranty_van]:checked").length > 0) {
                $(".is_waranty_van").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_van").addClass("erradd");
            }
            var action_waranty = $("input[name=is_waranty_van]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_van").val().trim() == "") {
                    err++;
                    $(".company_waranty_van").addClass("erradd");
                } else {
                    $(".company_waranty_van").removeClass("erradd");
                }
            }

            var formdataPPF = new FormData(
                document.getElementById("savevanPPF")
            );
            msg = "Van Added successfully!";
        } else if (this.id == "saveRV") {
            var err = 0;
            if ($(".wrap_brand_rv").val().trim() == "") {
                $(".wrap_brand_err_rv").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_rv").val().trim() == "") {
                $(".wrap_color_err_rv").addClass("erradd");
                err++;
            }

            if ($("input[name=is_waranty_rv]:checked").length > 0) {
                $(".is_waranty_rv").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_rv").addClass("erradd");
            }
            var action_waranty = $("input[name=is_waranty_rv]:checked").val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_rv").val().trim() == "") {
                    err++;
                    $(".company_waranty_rv").addClass("erradd");
                } else {
                    $(".company_waranty_rv").removeClass("erradd");
                }
            }

            var formdataPPF = new FormData(
                document.getElementById("savervPPF")
            );
            msg = "RV Added successfully!";
        } else if (this.id == "saveTrailer") {
            var err = 0;
            if ($(".wrap_brand_trailer").val().trim() == "") {
                $(".wrap_brand_err_trailer").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_trailer").val().trim() == "") {
                $(".wrap_color_err_trailer").addClass("erradd");
                err++;
            }

            if ($("input[name=is_waranty_trailer]:checked").length > 0) {
                $(".is_waranty_trailer").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_trailer").addClass("erradd");
            }
            var action_waranty = $(
                "input[name=is_waranty_trailer]:checked"
            ).val();
            if (action_waranty == "YES") {
                if ($(".company_waranty_trailer").val().trim() == "") {
                    err++;
                    $(".company_waranty_trailer").addClass("erradd");
                } else {
                    $(".company_waranty_trailer").removeClass("erradd");
                }
            }

            msg = "Trailer Added successfully!";
            var formdataPPF = new FormData(
                document.getElementById("savetrailerPPF")
            );
        } else if (this.id == "saveBus") {
            var err = 0;
            if ($(".wrap_brand_bus").val().trim() == "") {
                $(".wrap_brand_err_bus").addClass("erradd");
                err++;
            }
            if ($(".wrap_color_bus").val().trim() == "") {
                $(".wrap_color_err_bus").addClass("erradd");
                err++;
            }

            if ($("input[name=is_waranty_bus]:checked").length > 0) {
                $(".is_waranty_bus").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_bus").addClass("erradd");
            }
            var action_waranty = $("input[name=is_waranty_bus]:checked").val();
            if (action_waranty == "Yes") {
                if ($(".company_waranty_bus").val().trim() == "") {
                    err++;
                    $(".company_waranty_bus").addClass("erradd");
                } else {
                    $(".company_waranty_bus").removeClass("erradd");
                }
            }

            msg = "Bus Added successfully!";
            var formdataPPF = new FormData(
                document.getElementById("savebusPPF")
            );
        } else if (this.id == "saveOther") {
            var err = 0;
            if ($(".wrap_brand_other").val().trim() == "") {
                $(".wrap_brand_err_other").addClass("erradd");
                err++;
            }

            if ($("input[name=is_waranty_other]:checked").length > 0) {
                $(".is_waranty_other").removeClass("erradd");
            } else {
                err++;
                $(".is_waranty_other").addClass("erradd");
            }
            var action_waranty = $(
                "input[name=is_waranty_other]:checked"
            ).val();
            if (action_waranty == "Yes") {
                if ($(".company_waranty_other").val().trim() == "") {
                    err++;
                    $(".company_waranty_other").addClass("erradd");
                } else {
                    $(".company_waranty_other").removeClass("erradd");
                }
            }

            msg = "Other Added successfully!";
            var formdataPPF = new FormData(
                document.getElementById("saveotherPPF")
            );
        }

        formdataPPF.append("remove_products_ids", remove_products_ids);
        var err = 0;

        if (err == 0) {
            $(".loader").show();
            $.ajax({
                url: "/shop-settings/save-ppf-install-details",
                type: "POST",
                data: formdataPPF,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
    });

    $(document).on("click", ".cartabdata", function () {
        console.log("chkid", this.id);
        var newserviceid = this.id.split("%%%");
        var car_id = $("#last_Car_id").val();
        console.log("newss", newserviceid[1]);
        $.ajax({
            url: "/shop-settings/stab-change-carwash",
            type: "GET",
            data: {
                car_id: car_id,
                service_id: newserviceid[1],
            },

            success: function (response) {
                console.log(response);
            },
        });
        // var lastserviceid = $('#testservicedata').val();
        // console.log('lastid', lastserviceid);
    });
    $(document).on("click", "#SaveServicesnew", function () {
        if ($(".myallservices:checked").length) {
            $(".myserviceerr").hide();
            $(".loader").show();
            var formDataservices = new FormData(
                document.getElementById("SaveServicesForm")
            );
            $.ajax({
                url: "/shop-settings/save-shop-service",
                type: "POST",
                data: formDataservices,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == 1) {
                        toastr.success(
                            "save type successfully!",
                            "Shop Settings"
                        );
                        // ModalClass.removeActiveModalClass(document.getElementById('addserviceModal'));
                        window.location.href = "/shop-settings/editProfile";
                    } else {
                        toastr.error(
                            "Please Select Shop Type",
                            "Shop Settings"
                        );
                    }
                },
            });
        } else {
            $(".myserviceerr").show();
        }
    });

    $(document).on("click", ".insertconcierge", function () {
        var error = 0;
        var timeOptions = {
            timeFormat: "h:i A",
            minTime: getCurrentTime(new Date()),
        };
        // var dt = new Date();
        var dtToday = getCurrentTime(new Date());
        var tripbegin = $("#trip_begin").val() + ":00";

        var tripend = $("#trip_end").val() + ":00";

        // var checkbegentime = chkcurrentdate(dtToday, tripbegin, "current");
        // var checkbegen = chkcurrentdate(tripbegin, tripend, "trip");

        $(".myrequire").each(function () {
            if ($("#" + this.id).val() == "") {
                error++;
                $("#" + this.id).addClass("erradd");
                $("#" + this.id).css("border", "2px solid red !important");
            } else {
                $("#" + this.id).removeClass("erradd");
            }
        });

        if (error == 0) {
            $("#trip_begin").removeClass("erradd");
            $("#trip_end").removeClass("erradd");
            $(".loader").show();
            var formDataservices = new FormData(
                document.getElementById("saveConcierge")
            );
            formDataservices.append("remove_products_ids", remove_products_ids);
            $.ajax({
                url: "/shop-settings/save-concierge",
                type: "POST",
                data: formDataservices,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(
                            "Service added successfully",
                            "Shop Settings"
                        );
                    }
                },
            });
        }
        console.log("ee", error);
    });

    function getCurrentTime(date) {
        var hours = date.getHours(),
            minutes = date.getMinutes(),
            ampm = hours >= 12 ? "pm" : "am";

        hours = hours % 24;
        hours = hours ? hours : 24; // the hour '0' should be '12'
        minutes = minutes < 10 ? "0" + minutes : minutes;
        var time = {
            hours: hours,
            minutes: minutes,
            ampm: ampm,
        };
        return hours + ":" + minutes + ":00";
    }

    //time fun
    function chkcurrentdate(start_time, end_time, status) {
        var dt = new Date();

        //convert both time into timestamp
        var stt = new Date(
            dt.getMonth() +
                1 +
                "/" +
                dt.getDate() +
                "/" +
                dt.getFullYear() +
                " " +
                start_time
        );

        stt = stt.getTime();
        var endt = new Date(
            dt.getMonth() +
                1 +
                "/" +
                dt.getDate() +
                "/" +
                dt.getFullYear() +
                " " +
                end_time
        );

        endt = endt.getTime();

        var time = dt.getTime();

        if (status == "current") {
            if (time > stt && time < endt) {
                return "showbox";
            } else {
                return "expire";
            }
        }
        if (status == "trip") {
            if (stt < endt) {
                return "showbox";
            } else {
                return "expire";
            }
        }
    }
    $(".myallservices").change(function () {
        if ($(this).is(":checked")) {
            $("#mm-" + this.id).addClass("mychkcls");
        } else {
            $("#mm-" + this.id).removeClass("mychkcls");
        }
    });

    $(document).on("click", ".fluidactive", function () {
        $(".brake_fluid").toggleClass("mynewcsl");
        $(this).toggleClass("disable_btn");
        $("#brake_fluid").val("");
        var chkdfluid = $("#chkfluiddate").val();
        if ($("#chkfluiddate").val() == 0) {
            $("#chkfluiddate").val(1);
        } else {
            $("#chkfluiddate").val(0);
        }
    });

    $(document).on("click", ".InsertExhaust", function () {
        $(".loader").show();
        var formDataservices = new FormData(
            document.getElementById("saveExhaust")
        );
        formDataservices.append("remove_products_ids", remove_products_ids);
        $.ajax({
            url: "/shop-settings/save-exhaust",
            type: "POST",
            data: formDataservices,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);
                $(".loader").hide();
                if (response == "fail") {
                    toastr.error("Services not added", "Shop Settings");
                } else {
                    window.location.replace(response);
                    toastr.success(" Services Added", "Shop Settings");
                }
            },
        });
    });
    $(document).on("click", ".insertglassServices", function () {
        var err = 0;
        if ($("#brand").val() == "") {
            $("#brand").addClass("erradd");
            err++;
        } else {
            $("#brand").removeClass("erradd");
        }
        if ($("input[type='checkbox'][name='windhshield[]']:checked").length) {
            $(".newerr").hide();
        } else {
            err++;
            $(".newerr").show();
        }
        var action_electric = $("input[name=warranty]:checked").val();

        if (action_electric == "Yes") {
            if ($(".glasswarentycompany").val().trim() == "") {
                err++;
                $(".glasswarentycompany").addClass("erradd");
            } else {
                $(".glasswarentycompany").removeClass("erradd");
            }
        }
        console.log("errrr", err);
        if (err == 0) {
            var windServices = $("input[name='windhshield']:checked")
                .map(function () {
                    return this.value;
                })
                .get()
                .join(", ");
            var serviced = $("input[name='sensor_data']:checked")
                .map(function () {
                    return this.value;
                })
                .get()
                .join(", ");
            $(".loader").show();
            var formDataservices = new FormData(
                document.getElementById("saveGlassServices")
            );
            formDataservices.append("winshieldServices", windServices);
            formDataservices.append("serviced", serviced);
            formDataservices.append("remove_products_ids", remove_products_ids);
            $.ajax({
                url: "/shop-settings/save-glass",
                type: "POST",
                data: formDataservices,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(" Services Added", "Shop Settings");
                    }
                },
            });
        }
    });
    $(document).on("click", ".insertEngine", function () {
        var err = 0;
        if ($("#issue_diagnosis").val() == "") {
            $("#issue_diagnosis").addClass("erradd");
            err++;
        } else {
            $("#issue_diagnosis").removeClass("erradd");
        }
        if (
            $("input[type='checkbox'][name='engine_services']:checked").length
        ) {
            $(".newerr").hide();
        } else {
            err++;
            $(".newerr").show();
        }
        if (err == 0) {
            var engineServices = $("input[name='engine_services']:checked")
                .map(function () {
                    return this.value;
                })
                .get()
                .join(", ");

            $(".loader").show();
            var formDataservices = new FormData(
                document.getElementById("saveEngineBlock")
            );
            formDataservices.append("engineServices", engineServices);
            formDataservices.append("remove_products_ids", remove_products_ids);
            $.ajax({
                url: "/shop-settings/save-engine-block",
                type: "POST",
                data: formDataservices,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,

                success: function (response) {
                    console.log(response);
                    $(".loader").hide();
                    if (response == "fail") {
                        toastr.error("Services not added", "Shop Settings");
                    } else {
                        window.location.replace(response);
                        toastr.success(" Services Added", "Shop Settings");
                    }
                },
            });
        }
    });

    $(document).on("change", ".powderWarrenty", function () {
        var powderct = $("input[name=is_waranty]:checked").val();
        $(".powderwarentycompany").val("");
        if (powderct == "Yes") {
            $(".powderwarentycompany").attr("readonly", false);
        } else {
            $(".powderwarentycompany").attr("readonly", true);
        }
    });

    $(document).on("change", ".partWarrenty", function () {
        var powderct = $("input[name=is_waranty]:checked").val();
        $(".powderwarentycompany").val("");

        if (powderct == "Yes") {
            $(".powderwarentycompany").attr("readonly", false);
        } else {
            $(".powderwarentycompany").attr("readonly", true);
        }
    });
    $(document).on("change", ".elictricalWarrenty", function () {
        var electricalct = $("input[name=is_waranty]:checked").val();
        $(".electricalwarentycompany").val("");

        if (electricalct == "Yes") {
            $(".electricalwarentycompany").attr("readonly", false);
        } else {
            $(".electricalwarentycompany").attr("readonly", true);
        }
    });

    $(document).on("change", ".oem_check", function () {
        var oem_check = $("input[name=tint_oem_match]:checked").val();
        $(".oem_manufacturer").val("");

        if (oem_check == "Yes") {
            $(".oem_manufacturer").attr("readonly", false);
        } else {
            $(".oem_manufacturer").attr("readonly", true);
        }
    });

    $(document).on("change", ".tintWarrenty", function () {
        var tintct = $("input[name=tint_warranty]:checked").val();
        $(".tintwarentycompany").val("");

        if (tintct == "Yes") {
            $(".tintwarentycompany").attr("readonly", false);
        } else {
            $(".tintwarentycompany").attr("readonly", true);
        }
    });

    $(document).on("change", ".elictricalWarrenty", function () {
        var electricalct = $("input[name=is_waranty]:checked").val();
        $(".electricalwarentycompany").val("");
        $(".electricalwarentycompany").attr("readonly", true);

        if (electricalct == "Yes") {
            $(".electricalwarentycompany").attr("readonly", false);
        } else {
            $(".electricalwarentycompany").attr("readonly", true);
        }
    });

    $(document).on("change", ".glassWarrenty", function () {
        var glassct = $("input[name=warranty]:checked").val();
        $(".glasswarentycompany").val("");

        if (glassct == "Yes") {
            $(".glasswarentycompany").attr("readonly", false);
        } else {
            $(".glasswarentycompany").attr("readonly", true);
        }
    });

    $(".numberonly").keypress(function (e) {
        var charCode = e.which ? e.which : event.keyCode;

        if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
    });
    $(document).on("keydown", ".issuetabclose", function (t) {
        // if (t.which == 9) {
        //     return false;
        // }
    });
});
