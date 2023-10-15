<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    $activePage = 'orders';

    $queryBan = "SELECT * FROM ban order by code";
    $tatcaBan = mysqli_query($conn, $queryBan);

    $sql = "SELECT * FROM khachhang";
    
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
                    <?php
                        if (mysqli_num_rows($tatcaBan) > 0) {
                            // Mã HTML cho từng bàn
                            $index = 0;
                            while ($row = mysqli_fetch_assoc($tatcaBan)) {
                                $tableCode = $row['code'];
                                $tableStatus = $row['trang_thai'];
                                $ma_hoa_don = $row['ma_hoa_don'];
                                
                                // Kiểm tra trạng thái và áp dụng CSS màu đỏ nếu trạng thái là "BUSY"
                                $tableClass = ($tableStatus === "BUSY") ? "ban-busy" : "";
                                if($index % 4 === 0){
                                    echo '<div class="ban-container">';
                                }
                                // Tạo mã HTML cho bàn
                                $url = "datban-detail.php?ban=$tableCode&type=$tableStatus";
                                if($tableStatus === "BUSY"){
                                    $url=$url."&hoadon=$ma_hoa_don";
                                }
                                echo "<a href='$url' class='ban-info $tableClass'>Bàn $tableCode</a>";
                                if($index % 4 === 3){
                                    echo '</div>';
                                }
                                $index = $index + 1;
                            }
                        } else {
                            echo "Không có dữ liệu về bàn.";
                        }
                    ?>
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