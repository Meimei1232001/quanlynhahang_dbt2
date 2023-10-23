<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    $activePage = 'accounts';
    $sql = "SELECT account_id, username, role, nhanvien.id as nvid, nhanvien.ten_nhan_vien as nvten FROM accounts inner join nhanvien on accounts.nhan_vien_id = nhanvien.id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 header-container">
                            <h6 class="m-0 font-weight-bold text-primary flex1">Tài khoản</h6>
                            <?php 
                                if (isset($_SESSION['role']) && $_SESSION['role'] === "ADMIN") {?>
                            <a class="button-create" href='./taikhoan-detail.php'>
                                <div><i class="fas fa-plus text-light"></i></div>
                                <div>Tạo tài khoản</div>
                            <a>
                                <?php }
                                ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên đăng nhập</th>
                                            <th>Quyền</th>
                                            <th>Nhân viên</th>
                                            <th style="min-width: 200px; width: 200px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["username"]?></td>
                                                <td><?php echo $row["role"]?></td>
                                                <td><?php echo $row["nvten"]?></td>
                                                <td>
                                                <?php 
                                if (isset($_SESSION['role']) && $_SESSION['role'] === "ADMIN") {?>
                                                    <a href='./taikhoan-detail.php?id=<?php echo $row["account_id"] ?>' class='button-edit text-secondary font-weight-bold' >
                                                        Chỉnh sửa
                                                    </a>
                                                    <a href='./taikhoan-delete.php?id=<?php echo $row["account_id"] ?>' class='button-delete text-secondary font-weight-bold' onclick='return confirm("Bạn có chắc muốn xóa tài khoản này?")'>
                                                        Xóa
                                                    </a>
                                                    <?php }
                                ?>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
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