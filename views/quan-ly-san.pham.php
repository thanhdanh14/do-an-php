<?php
require("../controller/user/user.controller.php");
?>
<?php
if (checkRole() != 2) {
    header("Location: ../index.php");
}
require_once("../header.php");
?>

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            QUẢN LÝ SẢN PHẨM
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Cửa hàng</a></li>
            <li class="active">Quản Lý Sản phẩm</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Advanced Tables
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính</th>
                                        <th>Chức vụ</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                foreach (listInfo() as $item) {
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item["Username"]; ?></td>
                                        <td><?php echo $item['Email']; ?></td>
                                        <td><?php echo $item['PhoneNumber']; ?></td>
                                        <td class="center"><?php echo $item['Gender'] == 1 ? "Nam" : "Nữ"; ?></td>
                                        <td class="center"><?php echo $item['nameRole']; ?></td>
                                        <td class="center"><a href="./chinh-sua-thong-tin.php?Email=<?php echo $item['Email']; ?>">Chỉnh sửa</a> | <a onclick="return confirm('are you sure?')" href="../controller/user/user.controller.php?action=deleteInfoByEmail&Email=<?php echo $item['Email']; ?>">Xóa</a></td>
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
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="../assets/js/custom-scripts.js"></script>