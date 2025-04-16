<?php
session_start();

// Thêm topnav vào trang
function addTopNav()
{
    echo '
	<div class="top-nav group">
        <section>
            <div class="social-top-nav">
            </div> <!-- End Social Topnav -->

            <ul class="top-nav-quicklink flexContain">
                <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
            </ul> <!-- End Quick link -->
        </section><!-- End Section -->
    </div><!-- End Top Nav  -->';
}

// Thêm header
function addHeader()
{
    echo '        
	<div class="header group">
        <div class="smallmenu" id="openmenu" onclick="smallmenu(1)">≡</div>
        <div style="display: none;" class="smallmenu" id="closemenu" onclick="smallmenu(0)">×</div>
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.jpg" alt="Trang chủ" title="Trang chủ">
            </a>
        </div> <!-- End Logo -->

        <div class="content">
            <div class="search-header">
                <form class="search-form" method="get" action="index.php" style="
                    display: flex;
                    align-items: center;
                    max-width: 400px;
                    margin: auto;
                    border: 1px solid #ccc;
                    border-radius: 25px;
                    padding: 5px 10px;
                    background-color: #fff;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                ">
                    <input id="search-box" name="search" type="text" placeholder="Tìm sản phẩm, danh mục..." autocomplete="off" style="
                        flex: 1;
                        border: none;
                        outline: none;
                        padding: 10px;
                        font-size: 16px;
                        border-radius: 25px;
                    ">
                    <button type="submit" style="
                        background: none;
                        border: none;
                        font-size: 20px;
                        cursor: pointer;
                        color: #333;
                        padding: 5px 10px;
                        transition: color 0.3s;
                    " onmouseover="this.style.color=\'#007BFF\'" onmouseout="this.style.color=\'#333\'">
                        🔍
                    </button>
                </form>
            </div> <!-- End Search header -->

            <div class="tools-member">
                <div class="member">
                    <a onclick="checkTaiKhoan()" id="btnTaiKhoan">
                        <i class="fa fa-user"></i>
                        Tài khoản
                    </a>
                    <div class="menuMember hide">
                        <a href="nguoidung.php">Trang người dùng</a>
                        <a onclick="checkDangXuat();">Đăng xuất</a>
                    </div>
                </div> <!-- End Member -->

                <div class="cart">
                    <a href="giohang.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                        <span class="cart-number"></span>
                    </a>
                </div> <!-- End Cart -->
            </div><!-- End Tools Member -->
        </div> <!-- End Content -->
    </div> <!-- End Header -->';
}


// thêm home
function addHome()
{
    echo '
    <div class="banner">
        <div class="owl-carousel owl-theme"></div>
    </div> <!-- End Banner -->
    <!-- Mặc định mới vào trang sẽ ẩn đi, nế có filter thì mới hiện lên -->
    <div class="contain-products" style="display:none">
<div class="filterName">
    <div id="divSoLuongSanPham">Tất cả sản phẩm</div>
    <!-- Nếu không cần lọc, có thể ẩn hoặc xóa input -->
    <!-- <input type="text" placeholder="Lọc trong trang theo tên..." onkeyup="filterProductsName(this)"> -->
    <div class="loader" style="display: none"></div>
</div> <!-- End FilterName -->

    <ul id="products" class="homeproduct group flexContain">
        <div id="khongCoSanPham">
            <i class="fa fa-times-circle"></i>
            Không có sản phẩm nào
        </div> <!-- End Khong co san pham -->
    </ul><!-- End products -->

    <div class="pagination"></div>
    </div>

    <!-- Div hiển thị khung sp hot, khuyến mãi, mới ra mắt ... -->
    <div class="contain-khungSanPham"></div>';
}
function addChiTietSanPham()
{
    echo '
    <style>
        .chitietSanpham {
            min-height: 85vh;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .chitietSanpham h1 {
            color: #2d3436;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .rowdetail {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        .picture {
            flex: 1;
            min-width: 300px;
            text-align: center;
        }
        .picture img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .price_sale {
            flex: 1;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .area_price {
            font-size: 24px;
            color: #e74c3c;
            font-weight: bold;
        }
        .ship {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #2ecc71;
            font-size: 14px;
            background: #e9f7ef;
            padding: 8px;
            border-radius: 4px;
        }
        .area_promo {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
        }
        .area_promo strong {
            color: #2d3436;
            font-size: 16px;
        }
        .promo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #2ecc71;
            margin-top: 8px;
        }
        .policy {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 14px;
            color: #636e72;
        }
        .policy div {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
        }
        .policy i {
            color: #007bff;
        }
        .area_order {
            margin-top: 20px;
        }
        .buy_now {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .buy_now:hover {
            background: #0056b3;
        }
        .buy_now h3 {
            margin: 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .info_product {
            flex: 1;
            min-width: 300px;
        }
        .info_product h2 {
            color: #2d3436;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .info_product ul {
            list-style: none;
            padding: 0;
            background: #f8f9fa;
            border-radius: 4px;
            padding: 15px;
        }
        .info_product ul li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
    <div class="chitietSanpham">
        <h1>Điện thoại</h1>
        <div class="rowdetail group">
            <div class="picture">
                <img src="">
            </div>
            <div class="price_sale">
                <div class="area_price"></div>
                <div class="ship" style="display: none;">
                    <i class="fa fa-clock-o"></i>
                    <div>NHẬN HÀNG TRONG 1 GIỜ</div>
                </div>
                <div class="area_promo">
                    <strong>Khuyến mãi</strong>
                    <div class="promo">
                        <i class="fa fa-check-circle"></i>
                        <div id="detailPromo"></div>
                    </div>
                </div>
                <div class="policy">
                    <div>
                        <i class="fa fa-archive"></i>
                        <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng</p>
                    </div>
                    <div>
                        <i class="fa fa-star"></i>
                        <p>Bảo hành chính hãng 12 tháng.</p>
                    </div>
                    <div class="last">
                        <i class="fa fa-retweet"></i>
                        <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                    </div>
                </div>
                <div class="area_order">
                    <a class="buy_now" onclick="themVaoGioHang(maProduct, nameProduct);">
                        <h3><i class="fa fa-plus"></i> Thêm vào giỏ hàng</h3>
                    </a>
                </div>
            </div>
            <div class="info_product">
                <h2>Thông số kỹ thuật</h2>
                <ul class="info"></ul>
            </div>
        </div>
        <hr>
        <div class="comment-area">
            <div class="guiBinhLuan">
                <div class="stars">
                    <form action="">
                        <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                        <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4" title="Tốt"></label>

                        <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3" title="Tạm"></label>

                        <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2" title="Khá"></label>

                        <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1" title="Tệ"></label>
                    </form>
                </div>
                <textarea maxlength="250" id="inpBinhLuan" placeholder="Viết suy nghĩ của bạn vào đây..."></textarea>
                <input id="btnBinhLuan" type="button" onclick="checkGuiBinhLuan()" value="GỬI BÌNH LUẬN">
            </div>
            <!-- <h2>Bình luận</h2> -->
            <div class="container-comment">
                <div class="rating"></div>
                <div class="comment-content">
                </div>
            </div>
        </div>
    </div>';
}
// Thêm footer
function addFooter()
{
    echo '
    <!-- ============== Alert Box ============= -->
    <div id="alert">
        <span id="closebtn">&otimes;</span>
    </div>

    <!-- ============== Footer ============= -->
    <div class="copy-right">
        <p>
           Nhóm 5 - Khoa - Tuấn - Chí - 2 Đạt - Hoàng - Thiện
        </p>
    </div>';
}

// Thêm contain Taikhoan
function addContainTaiKhoan()
{
    echo '
	<div class="containTaikhoan">
    <span class="close" onclick="showTaiKhoan(false);">&times;</span> 
        <div class=" taikhoan">
            <ul class="tab-group">
                <li class="tab active"><a href="#login">Đăng nhập</a></li>
                <li class="tab"><a href="#signup">Đăng kí</a></li>
            </ul> <!-- /tab group -->
            <div class="tab-content">
                <div id="login">
                    <h1>Chào mừng bạn trở lại!</h1>
                    <!-- <form onsubmit="return logIn(this);"> -->
                    <form action="" method="post" name="formDangNhap" onsubmit="return checkDangNhap();">
                        <div class="field-wrap">
                            <label>
                            
                                Tên đăng nhập<span class="req">*</span>
                            </label>
                            <input name="username" type="text" id="username" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Mật khẩu<span class="req">*</span>
                            </label>
                            <input name="pass" type="password" id="pass" required autocomplete="off" />
                        </div> <!-- pass -->
                        <p class="forgot"><a href="#">Quên mật khẩu?</a></p>
                        <button type="submit" class="button button-block" />Tiếp tục</button>
                    </form> <!-- /form -->
                </div> <!-- /log in -->
                <div id="signup">
                    <h1>Đăng kí miễn phí</h1>
                    <!-- <form onsubmit="return signUp(this);"> -->
                    <form action="" method="post" name="formDangKy" onsubmit="return checkDangKy();">
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Họ<span class="req">*</span>
                                </label>
                                <input name="ho" type="text" id="ho" required autocomplete="off" />
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Tên<span class="req">*</span>
                                </label>
                                <input name="ten" id="ten" type="text" required autocomplete="off" />
                            </div>
                        </div> <!-- / ho ten -->
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    Điện thoại<span class="req">*</span>
                                </label>
                                <input name="sdt" id="sdt" type="text" pattern="\d*" minlength="10" maxlength="12" required autocomplete="off" />
                            </div> <!-- /sdt -->
                            <div class="field-wrap">
                                <label>
                                    Email<span class="req">*</span>
                                </label>
                                <input name="email" id="email" type="email" required autocomplete="off" />
                            </div> <!-- /email -->
                        </div>
                        <div class="field-wrap">
                            <label>
                                Địa chỉ<span class="req">*</span>
                            </label>
                            <input name="diachi" id="diachi" type="text" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Tên đăng nhập<span class="req">*</span>
                            </label>
                            <input name="newUser" id="newUser" type="text" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Mật khẩu<span class="req">*</span>
                            </label>
                            <input name="newPass" id="newPass" type="password" required autocomplete="off" />
                        </div> <!-- /pass -->
                        <button type="submit" class="button button-block" />Tạo tài khoản</button>
                    </form> <!-- /form -->
                </div> <!-- /sign up -->
            </div><!-- tab-content -->
        </div> <!-- /taikhoan -->
    </div>
';
}

// Thêm plc (phần giới thiệu trước footer)
function addPlc()
{
    echo '
    <div class="plc">
       
    </div>';
}