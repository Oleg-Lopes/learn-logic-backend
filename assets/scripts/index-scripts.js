$(document).ready(function() {
    $(".nav-level").click(function() {
        // SHOW/HIDE LISTS
        var level = $(this)
            .attr("id")
            .split("nav-level-");
        if ($("#level-" + level[1]).is(":hidden")) {
            $(".form-boka").hide();
            $(".level").hide();
            $("#level-" + level[1]).show();
        } else {
            $(".form-boka").hide();
            $("#level-" + level[1]).toggle();
        }
    }); // SHOW/HIDE LISTS

    $(".level").on("click", ".btn-boka", function() {
        // SHOW/HIDE FORM FOR EACH LINE IN LIST
        var id = $(this)
            .attr("id")
            .split("-btn-show-form-boka");
        if ($("#" + id[0] + "-form-boka").is(":hidden")) {
            $(".form-boka").hide();
            $("#" + id[0] + "-form-boka").css("display", "table-row");
        } else {
            $(".form-boka").hide();
        }
    }); // SHOW/HIDE FORM FOR EACH LINE IN LIST

    $(".showall").click(function() {
        // SHOW ALL LINES FOR EACH LIST
        var level = $(this)
            .attr("id")
            .split("showall");
        $("#level-" + level[1] + " .table").load(
            "assets/php_assets/level_all.php?level=" + level[1]
        );
        $(this).hide();
    }); // SHOW ALL LINES FOR EACH LIST
});
