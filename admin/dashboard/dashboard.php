<!-- <h1 class="main-title">Thống kê trong năm</h1>
<div class="year-activity">
    <div class="year-activity-item">
        <div class="chart-data">
            <p class="month-data">6718000</p>
            <p class="month-data">4615000</p>
            <p class="month-data">606000</p>
            <p class="month-data">0</p>
            <p class="month-data">1000000</p>
            <p class="month-data">3924000</p>
            <p class="month-data">2218000</p>
            <p class="month-data">112000</p>
            <p class="month-data">0</p>
            <p class="month-data">0</p>
            <p class="month-data">0</p>
            <p class="month-data">0</p>
        </div>
        <canvas id="yearChart" width="1007" height="365"
            style="display: block; box-sizing: border-box; height: 292px; width: 805.6px;"></canvas>
    </div>
</div> -->

<h1 class="main-title">Hoạt động hôm nay</h1>
<div class="today-activity">
    <div class="today-activity-item">
        <p>Tiền bán hàng</p>
        <p>0 VND</p>
    </div>
    <div class="today-activity-item">
        <p>Số đơn hàng thành công</p>
        <p>0</p>
    </div>
    <div class="today-activity-item">
        <p>Số đơn hủy</p>
        <p>0</p>
    </div>
</div>

<h1 class="main-title">Hoạt động tháng này</h1>
<div class="monthly-activity">
    <div class="monthly-activity-item">
        <p> <i class="far fa-chart-bar"></i> Hoạt động</p>
        <table>
            <tbody>
                <tr>
                    <th class="collumn-right">
                        Tiền bán hàng
                    </th>
                    <th class="collumn-left">₫
                        0 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Số đơn hàng
                    </th>
                    <th class="collumn-left">
                        0 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Số đơn thành công
                    </th>
                    <th class="collumn-left">
                        0 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Số đơn hủy
                    </th>
                    <th class="collumn-left">
                        0 </th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="monthly-activity-item">
        <p> <i class="fas fa-tags"></i> Thông tin kho</p>
        <table>
            <tbody>
                <tr>
                    <th class="collumn-right">
                        Nhà sản xuất
                    </th>
                    <th class="collumn-left">
                        8 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Còn hàng
                    </th>
                    <th class="collumn-left">
                        5 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Sắp hết hàng
                    </th>
                    <th class="collumn-left">
                        1 </th>
                </tr>
                <tr>
                    <th class="collumn-right">
                        Hết hàng
                    </th>
                    <th class="collumn-left">
                        0 </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- <h1 class="main-title">Hoạt động trong năm</h1>
<div class="year-activity">
    <div class="year-activity-item">
        <form action="" method="get">
            <label for="year">Chọn năm: </label>
            <table>
                <tbody>
                    <tr>
                        <th class="collumn-right">
                            <select id="year" name="year">
                                <option value="0" selected="">Chọn năm</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                        </th>
                        <th class="collumn-right">
                        </th>
                    </tr>
                </tbody>
            </table>
        </form>

        <br>


        <div id="result" style="width: 100%;"></div>

    </div>
</div> -->

<h1 id="potential_customers" class="main-title">Khách hàng </h1>
<div class="year-activity">
    <div class="year-activity-item">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Chi tiêu</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>ecec</td>
                    <td>Nam</td>
                    <td>2022-01-02</td>
                    <td>19.879.000₫</td>
                    <td><a href="#box-popup" class="link-button" onclick="user_bill(1);">Xem</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Anh tri deep try</td>
                    <td>Nam</td>
                    <td>2022-01-26</td>
                    <td>₫1.278.000</td>
                    <td><a href="#box-popup" class="link-button" onclick="user_bill(2);">Xem</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- <h1 class="main-title">Sản phẩm tiêu biểu</h1>
<div class="year-activity">
    <div class="year-activity-item">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Đã bán</th>
                    <th>Đánh giá</th>
                    <th>Xem chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>3
                    </td>
                    <td>Anh người yêu siêu cấp vjp pro</td>
                    <td>12</td>
                    <td>5<span style="color: #FFED85 !important;" class="fa fa-star"></span></td>
                    <td><a class="link-button" href="./view-infomation/item-information.php?id=3">Xem</a>
                    </td>
                </tr>
                <tr>
                    <td>1
                    </td>
                    <td>Áo khoác đen màu hường nam tính</td>
                    <td>9</td>
                    <td>3<span style="color: #FFED85 !important;" class="fa fa-star"></span></td>
                    <td><a class="link-button" href="./view-infomation/item-information.php?id=1">Xem</a>
                    </td>
                </tr>
                <tr>
                    <td>2
                    </td>
                    <td>Áo phông 100% cottton được làm từ lụa</td>
                    <td>6</td>
                    <td>3<span style="color: #FFED85 !important;" class="fa fa-star"></span></td>
                    <td><a class="link-button" href="./view-infomation/item-information.php?id=2">Xem</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div> -->




