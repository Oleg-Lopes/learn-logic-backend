$(document).ready(function() {
    /*$(".nav-level").click(function() {
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
    });*/ $(
        ".nav-level"
    ).click(function(event) {
        // SHOW/HIDE LISTS
        event.preventDefault();
        var level = $(this)
            .attr("id")
            .split("nav-level-");
        if (
            $("#level-1").is(":hidden") &&
            $("#level-2").is(":hidden") &&
            $("#level-3").is(":hidden")
        ) {
            // this level slide Down
            $("#level-" + level[1]).slideDown();
        } else if ($("#level-" + level[1]).is(":hidden")) {
            $(".form-boka").hide(); // hide forms
            if (level[1] == 1) {
                // show 1 while on 2 or 2
                // all slide to right
                var direction = "left";
            } else if (level[1] == 3) {
                // show 3 while on 1 or 2
                // all slide to left
                var direction = "right";
            } else if (level[1] == 2) {
                if ($("#level-1").is(":visible")) {
                    // show 2 while on 1
                    // slide to left
                    var direction = "right";
                } else if ($("#level-3").is(":visible")) {
                    // show 2 while on 3
                    // slide to right
                    var direction = "left";
                }
            }
            $(".level").hide();
            $("#level-" + level[1]).toggle(
                "slide",
                { direction: direction },
                300
            );
        } else if ($("#level-" + level[1]).is(":visible")) {
            $(".form-boka").hide(); // hide forms
            $(".form-boka-mob")
                .css({
                    transform: "rotateY(0deg)"
                })
                .hide();
            $(".front")
                .show()
                .css({
                    transform: "rotateY(0deg)"
                });
            $("#level-" + level[1]).slideUp(); // this level slide Up
        }
    });

    $(".level").on("click", ".btn-boka", function() {
        // SHOW/HIDE FORM FOR EACH LINE IN LIST
        var id = $(this)
            .attr("id")
            .split("-btn-show-form-boka");
        if ($("#" + id[0] + "-form-boka").is(":hidden")) {
            $(".form-boka").hide();
            $("#" + id[0] + "-form-boka").slideDown();
        } else {
            $(".form-boka").slideUp();
        }
    }); // SHOW/HIDE FORM FOR EACH LINE IN LIST

    $(".level").on("click", ".btn-boka-mob", function() {
        // SHOW/HIDE FORM FOR EACH LINE IN LIST MOBILE
        var id = $(this)
            .attr("id")
            .split("-btn-show-form-boka");
        $(".form-boka-mob")
            .css({
                transform: "rotateY(0deg)"
            })
            .hide();
        $(".front")
            .show()
            .css({
                transform: "rotateY(0deg)"
            });
        $("#front-" + id[0])
            .css({
                transform: "rotateY(180deg)"
            })
            .fadeOut("fast")
            .delay(500)
            .queue(function() {
                $("#" + id[0] + "-form-boka").show();
            })
            .dequeue();
    }); // SHOW/HIDE FORM FOR EACH LINE IN LIST MOBILE

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
