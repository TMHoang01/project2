
   
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
                <input type="file" name="upload_img" id="upload_img" value="Chọn ảnh" accept="image/*"/>
            </div>
            <div><img id="imgPreview"></div>
        <input type="hidden" name="image_product" id="image_product" />
        </div>
        <div class="item">
            <p>Thể loại</p>
            <div class="type-item">
                <select name="type_product" value="" id="type_product"  >
                    <!-- <option value="0">Chọn loại</option> -->
                    <option value="1">Áo</option>
                    <option value="2">Quần</option>
                    <option value="3">Khác</option>
                </select>
                <input type="number" name="value_product" value="" id="value_product" min="0"  />
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

    $("button#close_btn").click(function () {
        // body...
        event.preventDefault();
        window.location.hash = "product";

    });



    // $('#upload_img').click(function(){ console.log("img choose");});
    //  load IMG
    $('#upload_img').change(function() {
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