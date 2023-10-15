<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    $activePage = 'accounts';
    $queryNhanVien = "SELECT * FROM nhanvien";
    $allNhanVien = mysqli_query($conn, $queryNhanVien);

    if (isset($_GET['id'])) {
        $type = "EDIT";
        $id = $_GET['id'];
        $sql = "SELECT * FROM accounts WHERE account_id = $id";
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
                        <form action="taikhoan-save.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $type=="EDIT" ? $id: null; ?>">
                            <div class="form-group">
                                <label for="studentCode">Tên người dùng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="username" value="<?php echo $type=="EDIT" ?  $row['username'] : ""; ?>" required>
                            </div>
                            <?php if($type=="NEW") {?>
                            <div class="form-group">
                                <label for="studentCode">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="" required>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="lastName">Quyền <span class="text-danger">*</span></label>
                                <select class="form-control" name="role">
                                    <option value="ADMIN" <?php echo $row['role'] == "ADMIN"? "selected": ""; ?>>Admin</option>
                                    <option value="STAFF" <?php echo $type=="NEW" ? "selected" : ($row['role'] == "STAFF"? "selected": ""); ?>>Nhân viên</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Nhân viên</label>
                                <select class="form-control" name="nhan_vien_id" value="<?php echo $type=="EDIT" ?  $row['nhan_vien_id'] : null; ?>">
                                    <?php
                                        while ($nv = mysqli_fetch_assoc($allNhanVien)) {
                                    ?> 
                                        <option value="<?php echo $nv["id"];?>" <?php echo $type=="EDIT" &&  $row['nhan_vien_id'] == $nv["id"]? "selected": ""; ?>><?php echo $nv["ma_nhan_vien"]."-".$nv["ten_nhan_vien"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
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