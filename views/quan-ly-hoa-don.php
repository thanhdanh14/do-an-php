<?php
require_once("../header.php");
require_once(__DIR__ . "\..\controller\product\product.controller.php");
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
                                        <th>Người bán hàng</th>
                                        <th>Thời gian thanh toán</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;

                                foreach (getBill() as $item) {
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item["Username"]; ?></td>
                                        <td><?php echo $item['dateCreate']; ?></td>
                                        <td><a href="./chi-tiet-hoa-don.php?id=<?php echo $item["idBill"]; ?>">Chi tiết</a></td>
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