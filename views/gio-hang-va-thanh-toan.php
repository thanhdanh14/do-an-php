<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Giỏ hàng & thanh toán
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Giỏ hàng & thanh toán</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách giỏ hàng
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Tổng tiền</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <?php
                                $total_money = 0;
                                $i = 0;
                                if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                                    foreach ($_SESSION["cart_items"] as $item) {
                                        $i++;
                                        $id = $item["idProduct"];
                                        $total = $item["total"];
                                        $total_money += $item["quantityProduct"] * getInfoProduct($id, "priceProduct");
                                ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo getInfoProduct($id, "nameProduct"); ?></td>
                                            <td><input name="txtSoLuong" id="txtSoLuong<?php echo $i; ?>" value="<?php echo $item['quantityProduct']; ?>" type="number" min="1"></td>
                                            <td><?php echo number_format(getInfoProduct($id, "priceProduct"), 0, '', ',') . "đ"; ?></td>
                                            <td><img src="../assets/imageProduct/<?php echo getInfoProduct($id, "imageProduct"); ?>" style="width: 100px; height: 100px;"></td>
                                            <td><?php echo number_format($total, 0, '', ',') . "đ"; ?></td>
                                            <td>
                                                <a href="#" onclick="CapNhat(<?php echo $item['idProduct'] ?>, <?php echo $i; ?>); return false;" class="btn btn-warning">Cập nhật</a>
                                                <a href="../controller/product/product.controller.php?action=removeItem&id=<?php echo $item["idProduct"]; ?>" class="btn btn-danger">Hủy</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <p>
                                <span class="btn btn-primary">Tổng số tiền trong giỏ hàng: <?php echo number_format($total_money, 0, '', ',') . "đ"; ?></span>
                                <a href="../controller/product/product.controller.php?action=payCart">
                                    <span class="btn btn-success">Thanh toán</span>
                                </a>
                            </p>
                            <p>
                                <a href="../controller/product/product.controller.php?action=removeCart"><span class="btn btn-danger">Hủy giỏ hàng</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách sản phẩm
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="GioHang">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Hình ảnh</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                foreach (listProduct() as $item) {
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item["nameProduct"]; ?></td>
                                        <td><?php echo $item['codeProduct']; ?></td>
                                        <td><?php echo $item['quantityProduct']; ?></td>
                                        <td><?php echo number_format($item['priceProduct'], 0, '', ',') . "đ"; ?></td>
                                        <td><img src="../assets/imageProduct/<?php echo $item['imageProduct']; ?>" style="width: 100px; height: 100px;"></td>
                                        <td class="center"><a href="../controller/product/product.controller.php?action=addCart&id=<?php echo $item['idProduct']; ?>">Thêm</a> </td>
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
<script>
    function CapNhat(idProduct, i) {
        let sl = "txtSoLuong" + i;
        var SoLuong = document.getElementById(sl).value;
        var url = "../controller/product/product.controller.php?action=updateCart&id=" + idProduct + "&sl=" + SoLuong;
        return window.location.replace(url);
    }
</script>
<?php require_once("../footer.php"); ?>