<?php
    require "../../database/confi.php";

    $sql = "SELECT * from `type`  where `id_parent` = 0  order by `id` ASC";
    $types = executeResult($sql);

?>


<link rel="stylesheet" href="./css/type_product.css">
<h1 class="main-title">Thể loại</h1>
<div class="side-nav-categories">
    <?php
    $i =0;
    foreach($types as $type){
        $i++;
    
    echo '
    <ul class="category-tabs" data-id="'.$i.'"
    >
        <li>
            <a ref="javascript:void" class="main-category">
                <span>'.$type['name'].'</span>

                <i class="fa fa-minus"></i>
            </a>
            <button type="button" class="btn btn-primary add-new">Thêm mới</button>
            <ul class="sub-category-tabs">';
            $sql = 'SELECT * from `type`  where `id_parent` = '.$type['id'].'  order by `id` ASC';
            $sub_types = executeResult($sql);
            foreach($sub_types as $sub_type){
                echo
                '<li>
                    <a href="javascript:void" class="sub-category"  data-id="'.$sub_type['id'].'">'.$sub_type['name'].'</a>
                    <div class="crud">
                        <a class="add" data-id="'.$sub_type['id'].'"><i class="fa fa-check"></i></a>
                        <a class="edit" data-id="'.$sub_type['id'].'" ><i class="fa fa-pencil"></i></a>
                        <a class="delete" data-id="'.$sub_type['id'].'" ><i class="fa fa-trash"></i></a>
                    </div>
                </li>';
            }
 

    echo    '</ul>
        </li>
    </ul>';

    }

    ?>


</div>
<script>
// $('.category-tabs>li>a').click(function() {
//     $(this).next('ul').slideToggle('500');
//     $(this).next().next('ul').slideToggle('500');
//     $(this).find('i').toggleClass('fa-minus fa-plus ')
// });


$(document).ready(function() {
    var action = false;
    function edit(id, newname, id_parent){
        if(!id){
            // add type
           


        }else{            
            $.ajax({
                url: './type_product/edit_type.php',
                type: 'GET',
                data: {
                    id: id,
                    name: newname,
                    id_parent: id_parent
                },
                success: function(data){
                    console.log(data);
                }
            });
        }
    }

    //hide the add button to maintain display: inline-block
    $('.crud .add').toggle(false);




    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        if(action) return false;
        $(this).attr("disabled", "disabled");
        action = true;
        var index = $(this).parents(".category-tabs").find('ul.sub-category-tabs li:last-child')
            .index();
        // var index = $("#servers_modal table tbody tr:last-child").index();
        var row = '<li>' +
            '<a href="javascript:void" class="sub-category" ><input type="text"/></a>' +
            '<div class="crud">' +
            '<a class="add"  ><id class="fa fa-check"></id></a>' +
            '<a class="edit" ><i class="fa fa-pencil"></i></a>' +
            '<a class="delete" ><i class="fa fa-trash"></i></a>' +
            '</div>' +
            '</li>';
        $(this).parents('ul.category-tabs').find('ul.sub-category-tabs').append(row);
        $(this).parents(".category-tabs").find('ul.sub-category-tabs li').eq(index + 1).find(" .edit")
            .toggle();
    });

    // Edit row on edit button click
        $(document).on("click", ".edit", function() {
        if(action) return false;
        action = true;

        let str = $(this).parent().prev("a.sub-category").text();
        $(this).parent().prev("a.sub-category").html('<input type="text" class="form-control" value="' +
            $(this).parent().prev("a.sub-category").text() + '">');
     
        let input =  $(this).parent().prev("a.sub-category").find('input[type="text"]');
        input.focus();
        input.text(str);
        input.select();

        $(this).closest("div.crud").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
    });


    // Add row on add button click
    $(document).on("click", ".add", function() {
        var empty = false;
        var input = $(this).parent().prev("a.sub-category").find('input[type="text"]');

        if (!input.val()) {
            input.addClass("error");
            empty = true;
        }
        if (!empty) {
            let name = input.val();
            let id_parent = $(this).parents("ul.category-tabs").data("id");
            let id = $(this).data("id");
            // console.log("id_parent: " + id_parent, "  ||  id: " + id, " || name: " + name);

            input.parents("a").text(input.val());
            input.removeClass("error");

            // if data-id is not empty, then it is an edit row else it is a new row
            if (id) {
                console.log("edit new");
                edit(id, name, id_parent);
            } else {
                // console.log("add new"); 
                $.ajax({
                url: './type_product/add_type.php',
                type: 'GET',
                data: {
                    name: name,
                    id_parent: id_parent
                },
                success: function(data){
                    // console.log(data);
                    a_text.attr("data-id", data);           
                    // condole.log(a_text.attr("data-id"));     
                    a_text.next().find("a").attr("data-id", data);
                }
            });

            }            
            // edit($(this).data('id'), input.val());
            $(this).closest(".crud").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }

        action = false;

    });


    //input enter to add row
    $(document).on("keypress", "input", function(e) {
        if (e.which == 13) {
            let a_text = $(this).closest("a.sub-category");

            let id_parent = $(this).parents("ul.category-tabs").data("id");
            let id = a_text.data("id");
            let name = $(this).val();
            // console.log("id_parent: " + id_parent, "  ||  id: " + id, " || name: " + name);
            // if id is undefined, then it is a new row, else it is an edit row
            if (id) {
                console.log("edit new");
                edit(id, name, id_parent);
            } else {
                // console.log("add new"); 
                $.ajax({
                url: './type_product/add_type.php',
                type: 'GET',
                data: {
                    name: name,
                    id_parent: id_parent
                },
                success: function(data){
                    // console.log(data);
                    a_text.attr("data-id", data);           
                    // condole.log(a_text.attr("data-id"));     
                    a_text.next().find("a").attr("data-id", data);
                }
            });

            }


            a_text.text($(this).val());
            a_text.next().find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }

        action = false;
    });


    // Delete row on delete button click
    $(document).on("click", ".delete", function() {
        if (!confirm("Ban muon xoa khong?")) {
            return false;
        }
        var btn_detele = $(this);
        if(action) return false;
        $.ajax({
            url: './type_product/delete_type.php',
            type: 'GET',
            data: {
                id: $(this).data('id')
            },
            success: function(data){
                // console.log(data);
                btn_detele.parent().parent().remove();

            }
        }
        );

        $(".add-new").removeAttr("disabled");
    });


});
</script>