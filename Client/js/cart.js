// check begin

$('.btn-update-quatity[data-type="sub"]').each(function(index, el) {

    if ($(this).parents('tr').find('.span-quatity').text() <= 1) {
        $(this).prop('disabled', true);

    }
});



// add product to cart
$(document).ready(function($) {
    $(".add-cart").click(function(event) {
        /* Act on the event */
        let id = $(this).data('id');
        setTimeout(function() {
            alert("Đã thêm sản phẩm vài giỏ hàng").fadeOut('slow');
        }, 2000);
        $.ajax({
                url: './cart/add_to_cart.php',
                type: 'GET',
                dataType: 'html',
                data: { id },
            })
            .done(function(data) {
                // console.log("success" + data);
                $('.num-cart-product').text(data);
                // $('num-cart-product').text(num++);
            })
            .fail(function() {
                console.log("error");
            })


    });
});

function commaSeparateNumber(val) {
    // remove sign if negative
    var sign = 1;
    if (val < 0) {
        sign = -1;
        val = -val;
    }

    // trim the number decimal point if it exists
    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();

    while (/(\d+)(\d{3})/.test(num.toString())) {
        // insert comma to 4th last position to the match number
        num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }

    // add number after decimal point
    if (val.toString().includes('.')) {
        num = num + '.' + val.toString().split('.')[1];
    }

    // return result with - sign if negative
    return sign < 0 ? '-' + num : num;
}

// update sum-cost for change quatity item from cart
$(document).ready(function() {
    $(".btn-update-quatity").click(function(event) {
        /* Act on the event */
        let btn = $(this);
        let id = btn.data('id');
        let type = btn.data('type');
        let total_cost = $('.total-cost');
        $.ajax({
                url: './cart/update_quatity.php',
                type: 'GET',
                dataType: '',
                data: { id, type },
            })
            .done(function(data) {
                console.log("success");
                let parent_tr = btn.parents('tr');
                // console.log(parent_tr);
                let cost = parent_tr.find('.span-cost').text();
                let quatity = parent_tr.find('.span-quatity').text();
                // console.log(type);
                if (type == "add") {
                    quatity++;
                    if (quatity > 1) {
                        btn.parent().find('.btn-update-quatity[data-type="sub"]').prop('disabled', "");
                    }
                } else if (type == "sub") {
                    quatity--;
                    if (quatity == 1) {
                        btn.prop('disabled', true);
                    } else if (quatity < 0) {
                        btn.prop('disabled', true);
                        console.log(quatity);
                        quatity = 0;
                    }
                }
                parent_tr.find('.span-quatity').text(quatity);
                cost = cost.replace(",", "");
                cost = cost.replace(",", "");


                let cost_item = cost * quatity;
                parent_tr.find('.span-sum').text(commaSeparateNumber(cost_item));
                totalCost();


            })
            .fail(function(data) {
                console.log("error");
                alert(JSON.stringify(data));

            });

    });
});


// remove product to cart
$(document).ready(function() {
    $('.btn-delete').click(function(event) {
        /* Act on the event */
        let btn = $(this);
        let id = btn.data('id');
        console.log(btn.text() + id);

        $.ajax({
                url: './cart/remove_product.php',
                type: 'GET',
                // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: { id },
            })
            .done(function() {
                console.log("success");
                btn.parents('tr').remove();
                totalCost();
            })
            .fail(function(response) {
                console.log(JSON.stringify(response));
            })
            .always(function() {
                console.log("complete");
            });

    });
});

function totalCost() {
    total = 0;
    $('.span-sum').each(function(index, el) {
        let cost = $(this).text();
        cost = cost.replace(",", "");
        cost = cost.replace(",", "");
        total += parseInt(cost);
    });
    $('.total-cost').text(commaSeparateNumber(total));
}