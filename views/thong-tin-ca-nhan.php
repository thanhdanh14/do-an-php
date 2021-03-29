<?php
require("../controller/user/user.controller.php");
?>
<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>THÔNG TIN CÁ NHÂN</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />

    <link href="../assets/css/select2.min.css" rel="stylesheet">
    <link href="../assets/css/checkbox3.min.css" rel="stylesheet">
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../assets/js/Lightweight-Chart/cssCharts.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>Cửa hàng</strong></a>

                <div id="sideNav" href="">
                    <i class="fa fa-bars icon"></i>
                </div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><?php if (isset($_SESSION['email'])) echo $_SESSION['email'];  ?></a></li>
                        <li><a href="./thong-tin-ca-nhan.php"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../views/logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#" class="active-menu"><i class="fa fa-sitemap"></i>Quản lý tài khoản<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="./quan-ly-tai-khoan.php"><i class="fa fa-users"></i> Danh sách tài khoản</a>
                            </li>
                            <li>
                                <a href="./them-tai-khoan.php"><i class="fa fa-user"></i> Thêm tài khoản</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../index.php"><i class="fa fa-dashboard"></i> Thống kê cửa hàng</a>
                    </li>
                    <li>
                        <a href="../#"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header">
                <h1 class="page-header">
                    THÔNG TIN CÁ NHÂN
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Cửa hàng</a></li>
                    <li class="active">Thông tin cá nhân</li>
                </ol>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="card-title">
                                    <div class="title">Trang thông tin cá nhân</div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                if (isset($_GET['updateSuccess'])) {
                                    echo '<div class="form-group"><label style="color: blue; font-size: 20px;">Cập nhật thành công</label></div>';
                                } else if (isset($_GET['updateFail'])) {
                                    echo '<div class="form-group"><label style="color: red; font-size: 20px;">Cập nhật thất bại</label></div>';
                                }
                                ?>
                                <form action="../controller//user/user.controller.php?action=updateInfo" method="POST">

                                    <div class="form-group">
                                        <label for="txtHoten">Họ tên</label>
                                        <input type="text" class="form-control" name="txtHoTen" id="txtHoten" placeholder="Họ tên" value="<?php echo InfoUser("Username"); ?>" required>
                                    </div>
                                    <label for="txtGioiTinh">Giới tính</label><br>
                                    <div class="radio3 radio-check radio-primary radio-inline">
                                        <input type="radio" id="radio4" name="txtGioiTinh" value="1" <?php if (InfoUser("Gender") == 1) echo "checked"; ?>>
                                        <label for="radio4">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="radio3 radio-check radio-success radio-inline">
                                        <input type="radio" id="radio5" name="txtGioiTinh" value="0" <?php if (InfoUser("Gender") == 0) echo "checked"; ?>>
                                        <label for="radio5">
                                            Nữ
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo InfoUser("Email"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtSdt">Số điện thoại</label>
                                        <input type="number" class="form-control" name="txtSdt" id="txtSdt" placeholder="Số điện thoại" value="<?php echo InfoUser("PhoneNumber"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtChucVu">Chức vụ</label>
                                        <input type="text" class="form-control" name="txtChucVu" id="txtChucVu" placeholder="Chức vụ" value="<?php echo InfoUser("nameRole"); ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtPassword">Mật khẩu</label>
                                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu">
                                    </div>
                                    <tr>
                                        <td colspan="2"><input type="submit" name="btn_submit" value="Cập nhật"></td>
                                    </tr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->

        <footer>
            <p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p>
        </footer>
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".selectbox").select2();
        });
    </script>
    <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
</body>

</html>