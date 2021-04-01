<?php
session_start();
require_once("./header.php");
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
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3>44,023</h3>
                                <small>Daily Visits</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-eye fa-5x red"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3>32,850</h3>
                                <small>Sales</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart fa-5x blue"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3>56,150</h3>
                                <small>Comments</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-comments fa-5x green"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="board">
                    <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3>89,645</h3>
                                <small>Daily Profits</small>
                            </h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user fa-5x yellow"></i>
                        </div>

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