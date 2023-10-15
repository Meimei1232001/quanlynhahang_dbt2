<?php
    include("./common/checksession.php");
    include("./common/connection.php");
    if (isset($_GET['ban'])) {
        $codeBan = $_GET['ban'];
    } 
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    if ($type==="FREE"){
        //tạo hóa đơn 
        //kiểm tra trạng thái bàn hiện tại
        $queryCurrentBan = "SELECT * FROM ban where code='$codeBan'";
        $resultCurrentBan =  mysqli_query($conn, $queryCurrentBan);
        $currentBan = mysqli_fetch_assoc($resultCurrentBan); // Lấy dòng đầu tiên từ kết quả
        if($currentBan["trang_thai"]==="FREE"){
            $userId = $_SESSION['userid'];
            $currentDateTime = date("Y-m-d H:i:s");
            $sql = "INSERT INTO hoadon (thoi_gian, nhan_vien_id, ban_so, trang_thai)
                VALUES ('$currentDateTime', $userId, '$codeBan','Chờ thanh toán')";
            $insertResult = mysqli_query($conn, $sql);
            $hoaDonId = mysqli_insert_id($conn);
            //chỉnh sửa thông tin bàn thành đã đặt
            $sqlUpdateBan = "UPDATE ban set trang_thai = 'BUSY',ma_hoa_don=$hoaDonId where code = '$codeBan'";
            mysqli_query($conn, $sqlUpdateBan);
        }else{
            $hoaDonId = $currentBan["ma_hoa_don"];
        }
    }else{
        $hoaDonId = $_GET['hoadon'];
    }
    $queryChiTietHoaDon = "SELECT * FROM chitiethoadon where ma_hoa_don = $hoaDonId";
    $allChiTietHoaDon = mysqli_query($conn, $queryChiTietHoaDon);
    $queryMonAn = "SELECT * FROM thucdon";
    $allMonAn = mysqli_query($conn, $queryMonAn);
    $hashMonAn = array();
    $hashDonGia = array();
    while($obj = mysqli_fetch_assoc($allMonAn)){
        $hashMonAn[$obj["id"]] = $obj["ten_mon"];
        $hashDonGia[$obj["id"]] = $obj["don_gia"];
    }
    $tongSoTien = 0;
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
                    
                    <div class="container">
                        <h2>Bàn <?php echo $codeBan ?> đặt món ăn</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên món ăn</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_assoc($allChiTietHoaDon)) {
                                        $tongSoTien = $tongSoTien + $row["so_luong"]*$hashDonGia[$row["mon_an_id"]];
                                ?>
                                    <tr>
                                        <td><?php echo $hashMonAn[$row["mon_an_id"]]?></td>
                                        <td><?php echo $row["so_luong"]?></td>
                                        <td><?php echo $row["so_luong"]*$hashDonGia[$row["mon_an_id"]]?></td>
                                        <td>
                                            <a href='./chitiethoadon-delete.php?id=<?php echo $row["id"] ?>' class='button-delete text-secondary font-weight-bold' onclick='return confirm("Bạn có chắc muốn xóa món ăn này?")'>
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>   
                                <tr>
                                    <form action="chitiethoadon-save.php" method="POST">
                                        <input type="hidden" name="ma_hoa_don" value="<?php echo $hoaDonId ?>">
                                        <input type="hidden" name="redirect_url" value="<?php echo "./datban-detail.php?ban=$codeBan&type=BUSY&hoadon=$hoaDonId" ?>">
                                        <td>
                                            <select class="form-control" name="mon_an_id">
                                                <?php
                                                     foreach ($hashMonAn as $id => $tenMonAn) {
                                                ?> 
                                                    <option value="<?php echo $id;?>"><?php echo $tenMonAn?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="so_luong" required>
                                        </td>
                                        <td>
                                            <button type="submit" class='button-edit text-secondary font-weight-bold' >
                                                Thêm món
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                        <div style="display:flex">
                            <a href="./datban.php" class="button-quaylai">Quay lại</a>
                            <?php if($type==="BUSY") echo "<a href='thanhtoan.php?hoadonid=$hoaDonId&total=$tongSoTien&ban=$codeBan' class='button-thanhtoan'>Thanh toán</a>"?>
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