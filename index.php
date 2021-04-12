<?php
require_once("./header.php");
require_once(__DIR__ . "\controller\product\product.controller.php");
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Thống kê cửa hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Thống kê cửa hàng</li>
        </ol>
    </div>
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3><?php echo countBill(); ?></h3>
                                <small>Tổng số hóa đơn</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart red"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3><?php echo countProduct(); ?></h3>
                                <small>Tổng số hàng hóa</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-truck blue"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="panel panel-default chartJs">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Line Chart</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="line-chart" class="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<?php require_once("./footer.php"); ?>