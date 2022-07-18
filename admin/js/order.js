$(document).ready(function() {
    // var hide = 0;
    console.log(hide, " hide");
    if (hide == 0) {
        $("#hide").text("Ẩn đơn đã xử lý");
    } else {
        $("#hide").text("Hiện tất cả đơn");
    }

    $(".show-order").click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: "./order/order_detail.php",
            type: "GET",
            data: {
                order_id: id
            },
            success: function(result) {
                $(".overlay").show();
                $('.popup').html(result);
            }
        });
    });

    $('.page_number>a').click(function() {
        var page = $(this).attr('data-page');
        $.ajax({
            url: "./order/order.php",
            type: "GET",
            data: {
                page: page,
                hide: hide
            },
            success: function(result) {
                $('.container-main').html(result);
            }
        });
    });

    $("a#hide.link-button").click(function() {
        hide = 1 - hide;
        console.log("hide:", hide);
        $.ajax({
            url: "./order/order.php",
            type: "GET",
            data: {
                hide: hide
            },
            success: function(result) {
                $('.container-main').html(result);
            }
        });
    });




});