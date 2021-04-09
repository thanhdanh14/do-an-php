<?php require_once("../header.php"); ?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Thêm tài khoản
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Thêm tài khoản</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">FORM ĐĂNG KÝ</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="../controller/user/user.controller.php?action=dangky" method="POST">
                            <?php
                            if (isset($_GET['regSuccess'])) {
                                echo '<div class="form-group"><label style="color: blue; font-size: 20px;">Đăng ký thành công</label></div>';
                            } else if (isset($_GET['regFail'])) {
                                echo '<div class="form-group"><label style="color: red; font-size: 20px;">Đăng ký thất bại</label></div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="txtHoten">Họ tên</label>
                                <input type="text" class="form-control" name="txtHoTen" id="txtHoten" placeholder="Họ tên" required>
                            </div>
                            <label for="txtGioiTinh">Giới tính</label><br>
                            <div class="radio3 radio-check radio-primary radio-inline">
                                <input type="radio" id="radio4" name="txtGioiTinh" value="1" checked="">
                                <label for="radio4">
                                    Nam
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="txtGioiTinh" value="0">
                                <label for="radio5">
                                    Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="txtSdt">Số điện thoại</label>
                                <input type="number" class="form-control" name="txtSdt" id="txtSdt" placeholder="Số điện thoại" required>
                            </div>
                            <div class="form-group">
                                <label for="txtPassword">Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu" required>
                            </div>
                            <label for="txtChucVu">Chức vụ</label><br>
                            <select class="selectbox" name="txtChucVu">
                                <optgroup label="Chức vụ">
                                    <option value="" selected disabled>Chọn chức vụ</option>
                                    <option value="1">Nhân viên</option>
                                    <option value="2">Admin</option>
                                </optgroup>
                            </select>
                            <p></p>
                            <tr>
                                <td colspan="2"><input type="submit" name="btn_submit" value="Đăng ký"></td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".selectbox").select2();
    });
</script>
<!-- Custom Js -->