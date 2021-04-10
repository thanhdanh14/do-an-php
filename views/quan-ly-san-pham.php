﻿<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
?>

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Danh sách sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách sản phẩm
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
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
                                        <td><?php echo number_format($item['priceProduct'], 0, '', ',')."đ"; ?></td>
                                        <td><img src="../assets/imageProduct/<?php echo $item['imageProduct']; ?>" style="width: 100px; height: 100px;"></td>
                                        <td class="center"><a href="./chinh-sua-san-pham.php?id=<?php echo $item['idProduct']; ?>">Chỉnh sửa</a> | <a onclick="return confirm('Are you sure?')" href="../controller/product/product.controller.php?action=remove&id=<?php echo $item['idProduct']; ?>">Xóa</a></td>
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

<?php require_once("../footer.php"); ?>