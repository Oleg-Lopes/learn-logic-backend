$(document).ready(function() {
    var sortDir = ["date", "place", "price"]; // SORT LISTS BY ARRAY

    $(".nav-level").click(function() {
        // SHOW/HIDE LISTS
        var level = $(this)
            .attr("id")
            .split("nav-level-");
        if ($("#level-" + level[1]).is(":hidden")) {
            $(".form-change").hide();
            $(".level").hide();
            $("#level-" + level[1]).show();
        } else {
            $(".form-change").hide();
            $("#level-" + level[1]).toggle();
        }

        sortDir = ["date", "place", "price"]; // SORT LISTS RESET
    }); // SHOW/HIDE LISTS

    $(".table").on("click", ".btn-change", function() {
        // SHOW/HIDE FROM FOR EACH LINE IN LIST
        var id = $(this)
            .attr("id")
            .split("-btn-change");
        if ($("#" + id[0] + "-form-change").is(":hidden")) {
            $(".form-change").hide();
            $("#" + id[0] + "-form-change").css("display", "table-row");
        } else {
            $(".form-change").hide();
        }
    }); // SHOW/HIDE FROM FOR EACH LINE IN LIST

    $(".table").on("click", ".th", function() {
        // SORT LISTS BY ..
        var sortLevel = $(this)
            .attr("class")
            .split("th"); // LEVEL [2]
        var sortId = $(this)
            .attr("id")
            .split("sort-"); // sort after date/place/price [1]
        var num = jQuery.inArray(sortId[1], sortDir);
        if (num > -1) {
            // min to max sort
            $(
                "#level-" + sortLevel[2] + " .table"
            ).load(
                "assets/php_assets/admin_sort.php?level=" +
                    sortLevel[2] +
                    "&sort=" +
                    sortId[1],
                function() {
                    $(".fa-caret-down").hide();
                    $("#caret-down-" + sortLevel[2] + "-" + sortId[1]).toggle();
                    sortDir = ["date", "place", "price"]; // next click for all min to max sort
                    sortDir[num] = 0; // next click for this max to min sort
                }
            );
        } else {
            // max to min sort
            $(
                "#level-" + sortLevel[2] + " .table"
            ).load(
                "assets/php_assets/admin_sort_desc.php?level=" +
                    sortLevel[2] +
                    "&sort=" +
                    sortId[1],
                function() {
                    $(".fa-caret-down").hide();
                    $("#caret-up-" + sortLevel[2] + "-" + sortId[1]).toggle();
                    sortDir = ["date", "place", "price"]; // next click for all min to max sort
                }
            );
        }
    }); // SORT LISTS BY ..
});
