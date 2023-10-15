<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    if (isset($_GET['id'])) {
        $type = "EDIT";
        $id = $_GET['id'];
        $sql = "SELECT * FROM khachhang WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
    } else {
        $type = "NEW";
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include("./common/header.php");
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("./common/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("./common/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                        <h1><?php echo $type=="EDIT" ? "Chỉnh sửa thông tin khách hàng":"Thêm mới thông tin khách hàng"; ?></h1>
                        <form action="khachhang-save.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $type=="EDIT" ? $id: null; ?>">
                            <div class="form-group">
                                <label for="studentCode">Tên khách hàng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ten_khach_hang" value="<?php echo $type=="EDIT" ?  $row['ten_khach_hang'] : ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="studentCode">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="so_dien_thoai" value="<?php echo $type=="EDIT" ?  $row['so_dien_thoai'] : ""; ?>" required>
                            </div>
                            <!-- Nút Lưu Chỉnh Sửa -->
                            <button type="submit" class="btn btn-primary">
                                <?php echo $type=="EDIT"? "Lưu" : "Tạo mới"; ?>
                            </button>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("./common/footer.php") ?>

</body>

</html>