<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Thêm sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">THÊM SẢN PHẨM</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="../controller/product/product.controller.php?action=add" method="POST" enctype="multipart/form-data">
                            <?php
                            if (isset($_GET['success'])) {
                                echo '<div class="form-group"><label style="color: blue; font-size: 20px;">Thêm thành công</label></div>';
                            } else if (isset($_GET['fail'])) {
                                echo '<div class="form-group"><label style="color: red; font-size: 20px;">Thêm thất bại</label></div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="txtTenSP">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="txtTenSP" id="txtTenSP" placeholder="Tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label for="txtSLSP">Số lượng sản phẩm</label>
                                <input type="number" class="form-control" name="txtSLSP" id="txtSLSP" placeholder="Số lượng sản phẩm" required min="1">
                            </div>
                            <div class="form-group">
                                <label for="txtGiaSP">Giá sản phẩm</label>
                                <input type="number" class="form-control" name="txtGiaSP" id="txtGiaSP" placeholder="Giá sản phẩm" required min="1">
                            </div>
                            <div class="form-group">
                                <label for="txtMaSP">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="txtMaSP" id="txtMaSP" placeholder="Mã sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label for="txtImage">Hình sản phẩm</label>
                                <input type="file" id="txtImage" name="txtImage" accept=".PNG,.GIF,.JPG" required>
                            </div>
                            <p></p>
                            <tr>
                                <td colspan="2"><input type="submit" name="btnSubmit" value="Thêm sản phẩm"></td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("../footer.php"); ?>