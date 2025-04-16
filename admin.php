<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="lib/Jquery/Jquery.min.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/admin.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: #f0f2f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #ffffff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }
        header h2 {
            color: #2d3436;
            font-size: 24px;
            flex-grow: 1;
        }
        .sidebar {
            background: #2c3e50;
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            padding-top: 60px;
            color: #fff;
            transition: transform 0.3s;
        }
        .sidebar .nav {
            list-style: none;
            padding: 20px;
        }
        .nav-title {
            font-size: 14px;
            color: #b0b8c1;
            margin-bottom: 10px;
        }
        .nav-item {
            margin-bottom: 10px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            color: #dfe6e9;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.2s;
            cursor: pointer;
        }
        .nav-link:hover, .nav-link.active {
            background: #34495e;
            color: #fff;
        }
        .nav-link i {
            font-size: 18px;
        }
        .nav hr {
            border: none;
            border-top: 1px solid #34495e;
            margin: 20px 0;
        }
        .main {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        .home, .sanpham, .donhang, .khachhang, .thongke {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .table-header {
            width: 100%;
            border-collapse: collapse;
            background: #3498db;
            color: #fff;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
        }
        .table-header th {
            padding: 12px;
            text-align: left;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .table-header th:hover {
            background: #2980b9;
        }
        .table-header th i {
            margin-left: 5px;
        }
        .table-content {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 8px 8px;
        }
        .table-content table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-content tr {
            border-bottom: 1px solid #eee;
        }
        .table-content td {
            padding: 12px;
            font-size: 14px;
            color: #2d3436;
        }
        .table-content tr:hover {
            background: #f8f9fa;
        }
        .table-content img {
            max-width: 50px;
            border-radius: 4px;
        }
        .table-footer {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        .table-footer select, .table-footer input[type="text"], .table-footer input[type="date"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .table-footer input[type="text"] {
            flex-grow: 1;
            max-width: 300px;
        }
        .table-footer button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .table-footer button:hover {
            background: #0056b3;
        }
        .timTheoNgay {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            transform: scale(0);
            transition: transform 0.3s;
            z-index: 1000;
        }
        .overlayTable {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            max-height: 80vh;
            overflow-y: auto;
        }
        .overlayTable th {
            background: #3498db;
            color: #fff;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        .overlayTable td {
            padding: 10px;
            vertical-align: middle;
        }
        .overlayTable input, .overlayTable select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .overlayTable img.hinhDaiDien {
            max-width: 100px;
            display: block;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .overlayTable button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s;
        }
        .overlayTable button:hover {
            background: #218838;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #2d3436;
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }
        .tooltip .tooltiptext {
            visibility: hidden;
            background: #2d3436;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        .tooltip i {
            font-size: 16px;
            color: #007bff;
            cursor: pointer;
            margin: 0 5px;
        }
        .tooltip i.fa-trash {
            color: #dc3545;
        }
        .canvasContainer {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        canvas {
            max-width: 100%;
        }
        footer {
            background: #ffffff;
            padding: 15px;
            text-align: center;
            color: #636e72;
            font-size: 14px;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }
            .main {
                margin-left: 0;
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Admin Dashboard</h2>
    </header>
    <aside class="sidebar">
        <ul class="nav">
            <li class="nav-title">MENU</li>
            <li class="nav-item" onclick="refreshTableSanPham()"><a class="nav-link"><i class="fa fa-th-large"></i> Sản Phẩm</a></li>
            <li class="nav-item" onclick="refreshTableDonHang()"><a class="nav-link"><i class="fa fa-file-text-o"></i> Đơn Hàng</a></li>
            <li class="nav-item" onclick="refreshTableKhachHang()"><a class="nav-link"><i class="fa fa-address-book-o"></i> Khách Hàng</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-bar-chart-o"></i> Thống Kê</a></li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" id="btnDangXuat">
                    <i class="fa fa-arrow-left"></i>
                    Đăng xuất
                </a>
            </li>
        </ul>
    </aside>
    <div class="main">
        <div class="home"></div>
        <div class="sanpham">
            <table class="table-header">
                <tr>
                    <th style="width: 5%" onclick="sortProductsTable('stt')">Stt <i class="fa fa-sort"></i></th>
                    <th style="width: 10%" onclick="sortProductsTable('masp')">Mã <i class="fa fa-sort"></i></th>
                    <th style="width: 40%" onclick="sortProductsTable('ten')">Tên <i class="fa fa-sort"></i></th>
                    <th style="width: 15%" onclick="sortProductsTable('gia')">Giá <i class="fa fa-sort"></i></th>
                    <th style="width: 10%" onclick="sortProductsTable('khuyenmai')">Khuyến mãi <i class="fa fa-sort"></i></th>
                    <th style="width: 10%" onclick="sortProductsTable('gia')">Trạng thái <i class="fa fa-sort"></i></th>
                    <th style="width: 10%">Hành động</th>
                </tr>
            </table>
            <div class="table-content"></div>
            <div class="table-footer">
                <select name="kieuTimSanPham">
                    <option value="ma">Tìm theo mã</option>
                    <option value="ten">Tìm theo tên</option>
                </select>
                <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemSanPham(this)">
                <button onclick="document.getElementById('khungThemSanPham').style.transform = 'scale(1)'; autoMaSanPham()">
                    <i class="fa fa-plus-square"></i> Thêm sản phẩm
                </button>
                <button onclick="refreshTableSanPham()">
                    <i class="fa fa-refresh"></i> Làm mới
                </button>
            </div>
            <div id="khungThemSanPham" class="overlay">
                <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
                <form method="post" action="" enctype="multipart/form-data" onsubmit="return themSanPham();">
                    <table class="overlayTable table-outline table-content table-header">
                        <tr>
                            <th colspan="2">Thêm Sản Phẩm</th>
                        </tr>
                        <tr>
                            <td>Mã sản phẩm:</td>
                            <td><input disabled="disabled" type="text" id="maspThem" name="maspThem"></td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Hãng:</td>
                            <td>
                                <select name="chonCompany" onchange="autoMaSanPham(this.value)">
                                    <script>
                                        ajaxLoaiSanPham();
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Hình:</td>
                            <td>
                                <img class="hinhDaiDien" id="anhDaiDienSanPhamThem" src="">
                                <input type="file" name="hinhanh" onchange="capNhatAnhSanPham(this.files, 'anhDaiDienSanPhamThem', '')">
                                <input style="display: none;" type="text" id="hinhanh" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Giá tiền:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Số lượng:</td>
                            <td><input type="text" value="0"></td>
                        </tr>
                        <tr>
                            <td>Số sao:</td>
                            <td><input disabled="disabled" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td>Đánh giá:</td>
                            <td><input disabled="disabled" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td>Khuyến mãi:</td>
                            <td>
                                <select name="chonKhuyenMai" onchange="showGTKM()">
                                    <script type="text/javascript">
                                        ajaxKhuyenMai();
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Giá trị khuyến mãi:</td>
                            <td><input id="giatrikm" type="text"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Thông số kỹ thuật</th>
                        </tr>
                        <tr>
                            <td>Màn hình:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Camara sau:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Camara trước:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>CPU:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>RAM:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ trong:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Thẻ nhớ:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Dung lượng Pin:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-footer"><button name="submit">THÊM</button></td>
                        </tr>
                    </table>
                </form>
                <div style="display: none;" id="hinhanh"></div>
            </div>
            <div id="khungSuaSanPham" class="overlay"></div>
        </div>
        <div class="donhang">
            <table class="table-header">
                <tr>
                    <th style="width: 5%" onclick="sortDonHangTable('stt')">Stt <i class="fa fa-sort"></i></th>
                    <th style="width: 13%" onclick="sortDonHangTable('madon')">Mã đơn <i class="fa fa-sort"></i></th>
                    <th style="width: 7%" onclick="sortDonHangTable('khach')">Khách <i class="fa fa-sort"></i></th>
                    <th style="width: 20%" onclick="sortDonHangTable('sanpham')">Sản phẩm <i class="fa fa-sort"></i></th>
                    <th style="width: 15%" onclick="sortDonHangTable('tongtien')">Tổng tiền <i class="fa fa-sort"></i></th>
                    <th style="width: 10%" onclick="sortDonHangTable('ngaygio')">Ngày giờ <i class="fa fa-sort"></i></th>
                    <th style="width: 10%" onclick="sortDonHangTable('trangthai')">Trạng thái <i class="fa fa-sort"></i></th>
                    <th style="width: 10%">Hành động</th>
                </tr>
            </table>
            <div class="table-content"></div>
            <div class="table-footer">
                <div class="timTheoNgay">
                    Từ ngày: <input type="date" id="fromDate">
                    Đến ngày: <input type="date" id="toDate">
                    <button onclick="locDonHangTheoKhoangNgay()"><i class="fa fa-search"></i> Tìm</button>
                </div>
                <select name="kieuTimDonHang">
                    <option value="ma">Tìm theo mã đơn</option>
                    <option value="khachhang">Tìm theo tên khách hàng</option>
                    <option value="trangThai">Tìm theo trạng thái</option>
                </select>
                <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemDonHang(this)">
            </div>
        </div>
        <div class="khachhang">
            <table class="table-header">
                <tr>
                    <th onclick="sortKhachHangTable('stt')">Stt <i class="fa fa-sort"></i></th>
                    <th onclick="sortKhachHangTable('hoten')">Họ tên <i class="fa fa-sort"></i></th>
                    <th onclick="sortKhachHangTable('email')">Email <i class="fa fa-sort"></i></th>
                    <th onclick="sortKhachHangTable('taikhoan')">Tài khoản <i class="fa fa-sort"></i></th>
                    <th style="width: 10%">Hành động</th>
                </tr>
            </table>
            <div class="table-content"></div>
            <div class="table-footer">
                <select name="kieuTimKhachHang">
                    <option value="ten">Tìm theo họ tên</option>
                    <option value="email">Tìm theo email</option>
                    <option value="taikhoan">Tìm theo tài khoản</option>
                </select>
                <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemNguoiDung(this)">
                <button onclick="openThemNguoiDung()"><i class="fa fa-plus-square"></i> Thêm người dùng</button>
            </div>
        </div>
        <div class="thongke">
            <div class="canvasContainer">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="canvasContainer">
                <canvas id="myChart2"></canvas>
            </div>
            <div class="canvasContainer">
                <canvas id="myChart3"></canvas>
            </div>
            <div class="canvasContainer">
                <canvas id="myChart4"></canvas>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2025 Admin Dashboard
    </footer>
</body>
</html>