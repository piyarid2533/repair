$(function() {
    renderCorner();
    renderGrid();
    renderTextBox();
});
function renderTextBox() {
    if (window.XMLHttpRequest) {
        $(".textbox").each(function() {
            $(this).focus(function() {
                $(this).addClass("focus").removeClass("textbox");
            });
            $(this).blur(function() {
                $(this).removeClass("focus").addClass("textbox");
            });
        });
    }
}
function renderCorner() {
    $(".login .panel .panel_header").corner("top");
    $(".login .panel").corner();
    $(".login .panel .panel_body").corner("bottom");
    $("input[type=text]").addClass("textbox");
    $("input[type=password]").addClass("textbox");
    $("textarea").addClass("textbox");
}
function renderPreload() {
    $("#content").ajaxSend(function() {
        $("#preload").show();
    });
    $("#content").ajaxSuccess(function() {
        $("#preload").hide();
    });
}
function renderGrid() {
    // render header row
    $("table.grid thead tr").each(function() {
        $(this).find("input[type=checkbox]").each(function(index) {
            var checkbox = $(this);
            
            // check all
            checkbox.click(function() {
                var checked = checkbox.attr("checked");
                
                $("table.grid tbody tr").each(function() {
                    var cell_checkbox = $(this).find("td:eq(" + index + ") input[type=checkbox]");
                    var row = $(this);
                    
                    cell_checkbox.attr("checked", checked);

                    if (checked) {
                        row.addClass("grid_row_selected");
                    } else {
                        row.removeClass("grid_row_selected");
                    }
                });
            });
        });
    });

    // render body row
    $("table.grid tbody tr").each(function() {
        $(this).mouseover(function() {
            $(this).find("td").addClass("grid_row_over");
        });
        $(this).mouseout(function() {
            $(this).find("td").removeClass("grid_row_over");
        });
        $(this).click(function(sender) {
            if (sender.target.type == "checkbox") {
                // click checkbox
                if (sender.target.checked) {
                    $(this).addClass("grid_row_selected");
                } else {
                    $(this).removeClass("grid_row_selected");
                }
            } else if (!(sender.target instanceof HTMLImageElement)) {
                // chick row
                var chk = $(this).find("input[type=checkbox]");
                chk.attr("checked", !chk.attr("checked"));

                if (chk.attr("checked") == true) {
                    $(this).find("td").addClass("grid_row_selected");
                } else {
                    $(this).find("td").removeClass("grid_row_selected");
                }
            }
        });
    });
}
function renderPagination() {
    $("p.pagination a").each(function() {
        var href = $(this).attr("href");
        var a = $(this);

        a.attr("href", "#");
        a.attr("lang", href);
        a.click(function() {
            $("#div_grid").load(href);
            return false;
        });
    });
}
function openModalDialog(url) {
    var dialogWidth = 650;
    var dialogHeight = 480;
    var dialogTop = (screen.availHeight / 2) - (dialogHeight / 2);
    var dialogLeft = (screen.availWidth / 2) - (dialogWidth / 2);
    var options = "dialogWidth: " + dialogWidth + "; dialogHeight: " + dialogHeight + "; dialogTop: " + dialogTop + "; dialogLeft: " + dialogLeft + " ;";
    
    var w = window.showModalDialog(url, null, options);

    return w;
}