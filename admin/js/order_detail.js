$(document).ready(function() {
    $(".go-back").click(function() {
        $(".overlay").hide();
        console.log("go back");
        $('.popup').html('');
    });

    $(".handle-order").click(function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        console.log(id, status);
        $.ajax({
            url: "./order/order_status.php",
            type: "GET",
            data: {
                status: status,
                id: id
            },
            success: function(result) {
                // change status of td.h2 > span.h2 class and text
                var status_text = $("td.h2 > span.h2");
                console.log(status_text.text());
                if (result == "1") {
                    status_text.text("Đã xác nhận");
                    status_text.removeClass("color0");
                    status_text.addClass("color1");
                } else if (result == "2") {
                    status_text.text("Đã hủy");
                    status_text.removeClass("color0");
                    status_text.addClass("color2");
                }
                //remove table.content tr:last-child
                var last_child = $("table.content>tbody> tr:last-child");
                last_child.remove();



                // $(".overlay").show();
                // $('.popup').html(result);
            }
        });
    });

});