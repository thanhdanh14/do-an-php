<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
$id = $_GET["id"];
?>

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Quản lý hóa đơn
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Quản lý hóa đơn</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Quản lý hóa đơn
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng sản phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                $total_money = 0;
                                foreach (BillDetail($id) as $item) {
                                    $i++;
                                    $total_money += $item["quantityProduct"] * $item["priceProduct"];
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item["nameProduct"]; ?></td>
                                        <td><?php echo number_format($item["priceProduct"], 0, '', ',') . "đ"; ?></td>
                                        <td><?php echo $item["quantityProduct"]; ?></td>
                                        <td><?php echo number_format($item["quantityProduct"] * $item["priceProduct"], 0, '', ',') . "đ"; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <p>
                                <span class="btn btn-primary">Tổng số tiền: <?php echo number_format($total_money, 0, '', ',') . "đ"; ?></span>
                            </p>
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