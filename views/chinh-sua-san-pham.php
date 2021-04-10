<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
$id = $_GET['id'];
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            CHỈNH SỬA SẢN PHẨM
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Chỉnh sửa sản phẩm</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">CHỈNH SỬA SẢN PHẨM</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="../controller/product/product.controller.php?action=update&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            if (isset($_GET['success'])) {
                                echo '<div class="form-group"><label style="color: blue; font-size: 20px;">Chỉnh sửa thành công</label></div>';
                            } else if (isset($_GET['fail'])) {
                                echo '<div class="form-group"><label style="color: red; font-size: 20px;">Chỉnh sửa thất bại</label></div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="txtTenSP">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="txtTenSP" id="txtTenSP" placeholder="Tên sản phẩm" value=<?php echo getInfoProduct($id, "nameProduct"); ?> required>
                            </div>
                            <div class="form-group">
                                <label for="txtSLSP">Số lượng sản phẩm</label>
                                <input type="number" class="form-control" name="txtSLSP" id="txtSLSP" placeholder="Số lượng sản phẩm" value=<?php echo getInfoProduct($id, "quantityProduct"); ?> required min="1">
                            </div>
                            <div class="form-group">
                                <label for="txtGiaSP">Giá sản phẩm</label>
                                <input type="number" class="form-control" name="txtGiaSP" id="txtGiaSP" placeholder="Giá sản phẩm" value=<?php echo getInfoProduct($id, "priceProduct"); ?> required min="1">
                            </div>
                            <div class="form-group">
                                <label for="txtMaSP">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="txtMaSP" id="txtMaSP" placeholder="Mã sản phẩm" value=<?php echo getInfoProduct($id, "codeProduct"); ?> required>
                            </div>
                            <div class="form-group">
                                <label for="txtImage">Hình sản phẩm</label>
                                <input type="file" id="txtImage" name="txtImage" accept=".PNG,.GIF,.JPG">
                            </div>
                            <p></p>
                            <tr>
                                <td colspan="2"><input type="submit" name="btnSubmit" value="Cập nhật sản phẩm"></td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("../footer.php"); ?>