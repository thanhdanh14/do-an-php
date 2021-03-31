﻿<?php
require("../controller/user/user.controller.php");

?>
<?php session_start(); ?>



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
    <title>Cửa hàng</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
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
                    Danh sách tài khoản
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Cửa hàng</a></li>
                    <li class="active">Danh sách tài khoản</li>
                </ol>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Advanced Tables
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Họ tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Giới tính</th>
                                                <th>Chức vụ</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 0;
                                        foreach (listInfo() as $item) {
                                            $i++;
                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item["Username"]; ?></td>
                                                <td><?php echo $item['Email']; ?></td>
                                                <td><?php echo $item['PhoneNumber']; ?></td>
                                                <td class="center"><?php echo $item['Gender'] == 1 ? "Nam" : "Nữ"; ?></td>
                                                <td class="center"><?php echo $item['nameRole']; ?></td>
                                                <td class="center"><a href="./chinh-sua-thong-tin.php?Email=<?php echo $item['Email']; ?>">Chỉnh sửa</a> | <a onclick="return confirm('are you sure?')" href="../controller/user/user.controller.php?action=deleteInfoByEmail&Email=<?php echo $item['Email'];?>">Xóa</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <footer>
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
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
</body>

</html>