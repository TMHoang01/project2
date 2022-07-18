// inti
// $(".container-main").load("./product/product.php");
// check form 
function checkForm() {
    console.log("submit in form product.php");
    var name_product = $('#name_product').val();
    var cost_product = $('#cost_product').val();
    var upload_img = $('#upload_img').val();
    var type_product = $('#type_product').val();
    var sub_type_product = $('#sub_type_product').val();
    var description_product = $('#description_product').val();
    if (name_product == '') {
        $('#name_product').addClass('error');
    } else {
        $('#name_product').removeClass('error');
    }
    if (cost_product == '') {
        $('#cost_product').addClass('error');
    } else {
        $('#cost_product').removeClass('error');
    }
    if (upload_img == '') {
        $('#upload_img').addClass('error');
        console.log(" check anh ");

    } else {
        console.log(" check true anh");

        $('#upload_img').removeClass('error');
    }
    if (type_product == 0) {
        $('#type_product').addClass('error');
    } else {
        $('#type_product').removeClass('error');
    }
    if (sub_type_product == 0) {
        $('#sub_type_product').addClass('error');
    } else {
        $('#sub_type_product').removeClass('error');
    }
    if (description_product == '') {
        $('#description_product').addClass('error');
    } else {
        $('#description_product').removeClass('error');
    }
    if (name_product != '' && cost_product != '' && upload_img != '' && type_product != 0 && sub_type_product != 0) {
        console.log(" check true");
        return true;
    } else {
        console.log(" check FALSE");
        alert("vui long dien day du thong tin");
        return false;
    }
}


$(document).ready(function() {

    //  add product
    $("#btn_add_product").click(function() {
        $(".overlay").show();
        $(".overlay").attr("style", "display: block;");
        $(".popup").load("./product/form_product.php", function(argument) {
            $(".popup").find('form').prop('id', 'add_product');

            // add product
            $("form#add_product").submit(function(event) {
                // checkForm
                if (!checkForm()) {
                    return false;
                }

                /* Act on the event */
                event.preventDefault();
                $("button#submit").prop('disabled', true);

                // console.log(dataObj);
                var formData = new FormData($('.form_product')[0]);
                $.ajax({
                        url: './product/add_product.php',
                        type: 'POST',
                        dataType: 'json',
                        data: $(this).serializeArray(),
                        processData: false,
                        contentType: false,
                        async: false,
                        cache: false,
                        data: formData,

                    })
                    .done(function(response) {
                        // console.log(response['image']);
                        window.location.hash = "product";

                        let elemt = '<tr>' +
                            '<td>' + response['id'] + '</td>' +
                            '<td>' +
                            '<img src="./image/' + response['image'] + '" alt="" style="width: 100px; border-radius: 5px;">' +
                            '</td>' +
                            '<td>' + response['name'] + '</td>' +
                            '<td>' + response['cost'] + '</td>' +
                            '<td>' +
                            // '<a class="link-button blue" data-id="' + response['id'] + '">Chi tiết</a>' +
                            '<a class="link-button edit" href="#box-popup" data-id="' + response['id'] + '">Sửa</a>' +
                            '<a class="link-button red" data-id="' + response['id'] + '">Xóa</a>' +
                            '</td>' +
                            '</tr>'
                        $("table.styled-table>tbody").prepend(elemt);
                        $(".overlay").hide();

                    })
                    .fail(function(response) {
                        console.log("error");
                        alert(response);
                    })
            });
        });


    });

    // delete product 
    $("a.link-button.red").click(function() {
        if (!confirm("Bạn có chắc muốn xóa sản phẩm?")) {
            return false;
        }
        var item = $(this);
        var id = item.data('id');
        var img = $(this).parents('tr').find('img').attr('src');
        console.log(img);
        $.ajax({
                url: './product/delete_product.php',
                type: 'POST',
                dataType: 'html',
                data: { id, img },
            })
            .done(function() {
                console.log("success");
                item.parents("tr").remove();

            })
            .fail(function() {
                console.log("error");
            })
    });

    // find product to edit product
    $("a.link-button.edit").click(function() {
        // show box-up
        $(".overlay").show();
        var id = $(this).data("id");
        var row_item = $(this).parents('tr');

        // console.log(id);
        $.ajax({
                url: './product/find_product.php',
                type: 'GET',
                dataType: 'json',
                data: { id },
            })
            .done(function(data) {
                console.log(JSON.stringify(data));
                $(".popup").load("./product/form_product.php", function() {
                    // body...
                    $(".popup").find(".banner").find("h2").text("Sửa sản phẩm");
                    var formEdit = $(".popup").find("form");
                    formEdit.find("input#name_product").val(data["name"]);
                    formEdit.find("input#cost_product").val(data["cost"]);
                    if (!(data["id_parent"] == 0)) {
                        formEdit.find("select#type_product").val(data["id_parent"]).trigger("#type_product");
                        let sub_type_select = formEdit.find("select#sub_type_product");
                        $.ajax({
                            url: './type_product/get_sub_type.php',
                            type: 'GET',
                            data: {
                                id_type: data["id_parent"]
                            },
                            success: function(response) {
                                var sub_types = JSON.parse(response);
                                console.log(sub_types);
                                for (var i = 0; i < sub_types.length; i++) {
                                    sub_type_select.append('<option value="' + sub_types[i].id + '">' + sub_types[i].name + '</option>');
                                }
                                sub_type_select.val(data["type_id"]);
                                // console.log("p.js sub type ", data["type_id"], sub_types.type_id);
                            }
                        });

                    }

                    formEdit.find("input#id_product").val(data["id"]);
                    formEdit.find("input#image_product").val(data["image"]);
                    formEdit.find("textarea#description_product").val(data["description"]);
                    linkImg = "./image/" + data["image"];
                    formEdit.find("#imgPreview").attr('src', linkImg);
                    formEdit.prop('id', 'edit_product');

                    //  sumit

                    $("form#edit_product").submit(function(event) {
                        /* Act on the event */
                        event.preventDefault();
                        $("button#submit").prop('disabled', true);
                        var formData = new FormData($('.form_product')[0]);
                        $.ajax({
                                url: './product/edit_product.php',
                                type: 'POST',
                                dataType: 'json',
                                data: $(this).serializeArray(),
                                processData: false,
                                contentType: false,
                                async: false,
                                cache: false,
                                data: formData,
                            })
                            .done(function(response) {
                                console.log(response);
                                window.location.hash = "product";
                                row_item.find("td.name").text(response['name_product']);
                                row_item.find("td.cost").text(response['cost_product']);
                                row_item.find("img").attr('src', './image/' + response['image_product']);
                                $(".overlay").hide();


                            })
                            .fail(function(response) {
                                console.log("error");
                                alert(response);
                            })
                    });
                });
            })
            .fail(function() {
                console.log("error");
            })
    });




});