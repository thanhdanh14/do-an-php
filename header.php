<?php
session_start();
require_once(__DIR__ . "\controller\auth.php");
require_once(__DIR__ . "\controller\user\user.controller.php");
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
    <title>Cửa hàng</title>
    <!-- Bootstrap Styles-->
    <link href="/do-an-php/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/do-an-php/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="/do-an-php/assets/css/select2.min.css" rel="stylesheet">
    <link href="/do-an-php/assets/css/checkbox3.min.css" rel="stylesheet">
    <!-- Morris Chart Styles-->
    <link href="/do-an-php/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/do-an-php/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/do-an-php/assets/js/Lightweight-Chart/cssCharts.css">
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
                <a class="navbar-brand" href="index.html"><strong>Cửa hàng</strong></a>

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
                        <li>
                            <a href="#"><?php echo $_SESSION['email']; ?></a>
                        </li>
                        <li><a href="/do-an-php/views/thong-tin-ca-nhan.php"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/do-an-php/views/logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
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
                    <?php if (checkRole() == 2) { ?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i> Quản lý tài khoản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/do-an-php/views/quan-ly-tai-khoan.php"><i class="fa fa-users"></i> Danh sách tài khoản</a>
                                </li>
                                <li>
                                    <a href="/do-an-php/views/them-tai-khoan.php"><i class="fa fa-user"></i> Thêm tài khoản</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="/do-an-php/views/quan-ly-san-pham.php"><i class="fa fa-cloud"></i> Quản lý sản phẩm</a>
                    </li>
                    <li>
                        <a href="/do-an-php/views/them-san-pham.php"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
                    </li>
                    <li>
                        <a href="/do-an-php/views/gio-hang-va-thanh-toan.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng & thanh toán</a>
                    </li>
                    <li>
                        <a href="/do-an-php/index.php"><i class="fa fa-dashboard"></i> Thống kê cửa hàng</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>