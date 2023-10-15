<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    $activePage = 'employee';
    // Truy vấn để lấy tổng số các lớp học
    if (isset($_GET['id'])) {
        $type = "EDIT";
        $id = $_GET['id'];
        $sql = "SELECT * FROM nhanvien WHERE id = $id";
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
                        <h1><?php echo $type=="EDIT" ? "Chỉnh sửa nhân viên":"Thêm mới nhân viên"; ?></h1>
                        <form action="nhanvien-save.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $type=="EDIT" ? $id: null; ?>">
                            <div class="form-group">
                                <label for="studentCode">Mã nhân viên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ma_nhan_vien" value="<?php echo $type=="EDIT" ?  $row['ma_nhan_vien'] : ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Tên nhân viên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ten_nhan_vien" value="<?php echo $type=="EDIT" ?  $row['ten_nhan_vien']: ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Số điện thoại</label>
                                <input type="text" class="form-control" name="so_dien_thoai" value="<?php echo $type=="EDIT" ?  $row['so_dien_thoai']:""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Chức vụ</label>
                                <input type="text" class="form-control" name="chuc_vu" value="<?php echo $type=="EDIT" ?  $row['chuc_vu']: ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Ca làm việc</label>
                                <input type="text" class="form-control" name="ca_lam_viec" value="<?php echo $type=="EDIT" ?  $row['ca_lam_viec']: ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Lương</label>
                                <input type="number" class="form-control" name="luong" value="<?php echo $type=="EDIT" ?  $row['luong']: 0; ?>" required>
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