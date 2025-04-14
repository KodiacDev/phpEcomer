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
        function kiemTraDangNhap(){
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
                success: function(kq){
                    if(kq.indexOf("yes") !== -1){
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center mb-4">Đăng nhập Admin</h3>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                </div>
                <button class="btn btn-primary btn-block" onclick="kiemTraDangNhap()">Đăng nhập</button>
            </div>
        </div>
    </div>
</body>
</html>
