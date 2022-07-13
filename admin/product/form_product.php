<?php
    require "../../database/confi.php";


    $sql = "SELECT * from `type` ";
    $types = executeResult($sql);
    $sub_types = [];
    foreach ($types as $type) {
        if($type['id_parent'] == 0){
            $sub_types[$type['id']] = $type['name'];
            $sub_types[$type['id']] = [];
        }else{
            $sub_types[$type['id_parent']][] = $type['id'];
        } 
    }
?>

<!-- <div class="testbox" id="testbox"> -->
    <div class="banner">
        <h2>Thêm sản phẩm</h2>
        <!-- <div><a class="close" href="#product">&times;</a></div> -->
    </div>
    <form class="form_product" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_product" id="id_product" />


        <div class="item">
            <p>Tên mặt hàng</p>
            <input type="text" name="name_product" id="name_product"  />
        </div>

        <div class="item">
            <p>Giá</p>
            <input type="number" name="cost_product" id="cost_product"  />
        </div>
        <div class="item">
            <p>Tải ảnh</p>
            <div class="sub-item">
                <input type="file" name="upload_img" id="upload_img"  accept="image/*"/>
            </div>
            <div><img id="imgPreview"></div>
        <input type="hidden" name="image_product" id="image_product" />
        </div>
        <div class="item">
            <p>Thể loại</p>
            <div class="type-item">
                <select name="type_product" value="" id="type_product"  >
                    <option value="0">Chọn loại</option>
                    <option value="1">Áo</option>
                    <option value="2">Quần</option>
                    <option value="3">Khác</option>
                </select>
                <!-- <input type="number" name="value_product" value="" id="value_product" min="0"  /> -->
                <select name="sub_type_product" value="" id="sub_type_product"  >
                    <option value="0">Chọn loại</option>
                    <!-- <option value="1">Áo</option>
                    <option value="2">Quần</option>
                    <option value="3">Khác</option> -->
                </select>
            </div>
        </div>
        <div class="item">
            <p>Mô tả</p>
            <textarea rows="4" name="description_product" id="description_product"></textarea>
        </div>
        <div class="btn-item">
            <div class="btn-block">
                <button type="submit" id="submit" value="Tạo">Xác nhận</button>
                <button id="close_btn" class="close_btn">Hủy bỏ</button>
            </div>
        </div>
    </form>
<!-- </div> -->
<script type="text/javascript">
    var sub_types = <?php echo json_encode($sub_types); ?>;
    // sub_types = 
    var name_types = <?php echo json_encode($types); ?>;
    // console.log(name_types);

    // if #type_product change value, change #sub_type_product value
    $('#type_product').change(function(){
        var id_type = $(this).val();
        console.log(id_type);
        var sub_type_select = $('#sub_type_product');
        sub_type_select.empty();
        sub_type_select.append('<option value="0">Chọn loại</option>');
        if(id_type != 0)

        if(sub_types[id_type].length > 0){
            // console.log(id_type);
            for(var i = 0; i < sub_types[id_type].length; i++){
                sub_type_select.append('<option value="'+sub_types[id_type][i]+'">'+name_types[sub_types[id_type][i] - 1]["name"]+'</option>');
                // console.log(sub_types[id_type][i]);
                // console.log(name_types[sub_types[id_type][i]]);
            }
        }
    });



    $("button#close_btn").click(function () {
        // body...
        event.preventDefault();
        window.location.hash = "product";

    });



    // $('#upload_img').click(function(){ console.log("img choose");});
    //  load IMG
    $('#upload_img').change(function() {
        // limit 250kb for image size
        var file_size = this.files[0].size;
        var file_size_mb = (file_size / 1024 / 1024).toFixed(2);
        if(file_size_mb > 200){
            alert("File size is too large");
            this.value = "";
            return false;
        }
        const file = this.files[0];
        // console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                // console.log(event.target.result);
                $('#imgPreview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });






 </script>