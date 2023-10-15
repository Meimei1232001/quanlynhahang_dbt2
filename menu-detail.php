<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    $activePage = 'menu';
    // Truy vấn để lấy tổng số các lớp học
    if (isset($_GET['id'])) {
        $type = "EDIT";
        $id = $_GET['id'];
        $sql = "SELECT * FROM thucdon WHERE id = $id";
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
                        <h1><?php echo $type=="EDIT" ? "Chỉnh sửa món ăn":"Thêm mới món ăn"; ?></h1>
                        <form action="menu-save.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $type=="EDIT" ? $id: null; ?>">
                            <!-- Trường nhập Mã Sinh Viên (readOnly) -->
                            <div class="form-group">
                                <label for="studentCode">Tên món ăn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ten_mon" value="<?php echo $type=="EDIT" ?  $row['ten_mon'] : ""; ?>" required>
                            </div>
                            <!-- Trường nhập Họ và Tên -->
                            <div class="form-group">
                                <label for="lastName">Đơn giá <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="don_gia" value="<?php echo $type=="EDIT" ?  $row['don_gia']: 0; ?>" required>
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