<!-- login_admin.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="lib/Jquery/Jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function kiemTraDangNhap() {
            var a = document.getElementById("username").value;
            var b = document.getElementById("password").value;

            if (a == "") {
                alert("Tài khoản không được để trống!");
                document.getElementById("username").focus();
                return false;
            }
            if (b == "") {
                alert("Mật khẩu không được để trống!");
                document.getElementById("password").focus();
                return false;
            }

            $.ajax({
                url: "php/xulidangnhapadmin.php",
                type: "POST",
                data: {
                    data_username: a,
                    data_password: b
                },
                success: function(kq) {
                    if (kq.indexOf("yes") !== -1) {
                        alert("Đăng nhập thành công");
                        window.location = "admin.php";
                    } else {
                        alert("Sai tài khoản hoặc mật khẩu!");
                        document.getElementById("username").value = "";
                        document.getElementById("password").value = "";
                        document.getElementById("username").focus();
                    }
                }
            });
        }
    </script>
</head>

<body class="bg-light">
    <!-- Thêm hiệu ứng sóng nước -->
    <div class="wave-animation"></div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- Thêm lớp login-box và animation -->
                <div class="login-box animate__animated animate__fadeInUp">
                    <h3 class="text-center mb-4">👑 Login Admin</h3>

                    <!-- Form group với hiệu ứng focus -->
                    <div class="form-group floating-label">
                        <input type="text" class="form-control" id="username" required>
                        <label for="username">📧 AdminName</label>
                        <div class="underline"></div>
                    </div>

                    <div class="form-group floating-label">
                        <input type="password" class="form-control" id="password" required>
                        <label for="password">🔒 AdminPass</label>
                        <div class="underline"></div>
                    </div>

                    <!-- Nút đăng nhập với hiệu ứng hover -->
                    <button class="btn-login" onclick="kiemTraDangNhap()">
                        <span class="btn-text">🚀 Login</span>
                        <div class="liquid"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hiệu ứng bong bóng nền -->
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>
</body>

</html>