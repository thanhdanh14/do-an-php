<?php
require_once("../header.php");
$getEmail = $_GET['Email'];
?>

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
                        <form action="../controller/user/user.controller.php?action=updateInfoEmail&Email=<?php echo $getEmail; ?>" method="POST">

                            <div class="form-group">
                                <label for="txtHoten">Họ tên</label>
                                <input type="text" class="form-control" name="txtHoTen" id="txtHoten" placeholder="Họ tên" value="<?php echo InfoUserByEmail("Username", $getEmail); ?>" required>
                            </div>
                            <label for="txtGioiTinh">Giới tính</label><br>
                            <div class="radio3 radio-check radio-primary radio-inline">
                                <input type="radio" id="radio4" name="txtGioiTinh" value="1" <?php if (InfoUserByEmail("Gender", $getEmail) == 1) echo "checked"; ?>>
                                <label for="radio4">
                                    Nam
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="txtGioiTinh" value="0" <?php if (InfoUserByEmail("Gender", $getEmail) == 0) echo "checked"; ?>>
                                <label for="radio5">
                                    Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo InfoUserByEmail("Email", $getEmail); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="txtSdt">Số điện thoại</label>
                                <input type="number" class="form-control" name="txtSdt" id="txtSdt" placeholder="Số điện thoại" value="<?php echo InfoUserByEmail("PhoneNumber", $getEmail); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="txtChucVu">Chức vụ</label>
                                <input type="text" class="form-control" name="txtChucVu" id="txtChucVu" placeholder="Chức vụ" value="<?php echo InfoUserByEmail("nameRole", $getEmail); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtPassword">Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu" value="">
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
<?php require_once("../footer.php"); ?>