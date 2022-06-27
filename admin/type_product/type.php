<link rel="stylesheet" href="./css/type_product.css">
<h1 class="main-title">Thể loại</h1>
<div class="side-nav-categories">
    <!-- <div class="title"><strong>Category</strong></div> -->
    <ul class="category-tabs">
        <li>
            <a ref="javascript:void" class="main-category">
                <span>Web Applications</span>
                
                <i class="fa fa-minus"></i>
            </a>
            <button type="button" class="btn btn-primary add-new">Thêm mới</button>
            <ul class="sub-category-tabs">
                <li>
                    <a href="javascript:void" class="sub-category">HTML</a>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">CSS</a>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">SCSS</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="category-tabs">
        <li><a href="javascript:void" class="main-category">
                <span>Web Applications</span>
                <button type="button" class="btn btn-primary add-new">
                    Thêm mới
                </button>
                <i class="fa fa-minus"></i>
            </a>
            <ul class="sub-category-tabs">
                <li>
                    <a href="javascript:void" class="sub-category">Javascript</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">jQuery</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">Angular JS</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="category-tabs">
        <li>
            <a href="javascript:void" class="main-category">
                <span>Server JSC</span>
                <button type="button" class="btn btn-primary add-new">Thêm mới</button>
                <i class="fa fa-minus"></i>
            </a>
            <ul class="sub-category-tabs">
                <li>
                    <a href="javascript:void" class="sub-category">C#</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">PHP</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
                <li>
                    <a href="javascript:void" class="sub-category">ASP.Net</a>
                    <div class="crud">
                        <a class="add"><i class="fa fa-check"></i></a>
                        <a class="edit"><i class="fa fa-pencil"></i></a>
                        <a class="delete"><i class="fa fa-trash"></i></a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
<script>
    $('.category-tabs>li>a').click(function() {
        $(this).next('ul').slideToggle('500');
        $(this).next().next('ul').slideToggle('500');
        $(this).find('i').toggleClass('fa-minus fa-plus ')
    });
    $(".add-new").click(function(params) {
        $(this).attr("disabled", "disabled");
    })


$(document).ready(function() {

    //hide the add button to maintain display: inline-block
    $('.crud .add').toggle(false);



    // Append table with add row form on add new button click
    $(".add-new").click(function() {
        


        // $(this).attr("disabled", "disabled");
        var index = $(this).parents(".category-tabs").find('ul.sub-category-tabs li:last-child')
    .index();
        // var index = $("#servers_modal table tbody tr:last-child").index();
        var row = '<li>' +
            '<a href="javascript:void" class="sub-category"><input type="text"/></a>' +
            '<div class="crud">' +
                '<a class="add" ><i class="fa fa-check"></i></a>' +
                '<a class="edit" ><i class="fa fa-pencil"></i></a>' +
                '<a class="delete" ><i class="fa fa-trash"></i></a>' +
                '</div>' +
            '</li>';
        $(this).parents('ul.category-tabs').find('ul.sub-category-tabs').append(row);
        $(this).parents(".category-tabs").find('ul.sub-category-tabs li').eq(index + 1).find(" .edit").toggle();
    });

    // Add row on add button click
    $(document).on("click", ".add", function() {
        var empty = false;
        //var input = $(this).closest("tr").find('input[type="text"]');
        var input = $(this).parent().prev("a.sub-category").find('input[type="text"]');

        if (!input.val()) {
            input.addClass("error");
            empty = true;
        }
        if (!empty) {
            input.parents("a").text(input.val());
            $(this).closest(".crud").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }

    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function() {
        $(this).parent().prev("a.sub-category").html('<input type="text" class="form-control" value="' +
            $(this).parent().prev("a.sub-category").text() + '">');	
        $(this).closest("div.crud").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
    });
    // Delete row on delete button click
    // $(document).on("click", ".delete", function () {      
    //     if (!$(".add-new").prop("disabled")) {
    //         var delable = $("#servers_table").data("delete");
    //         delable += $(this).closest("tr").attr("id").replace("server_", "") + "¬";
    //         $("#servers_table").data("delete", delable);
    //     }
    //         $(this).closest("tr").remove();
    //         $(".add-new").removeAttr("disabled");
    // });
});
</script>